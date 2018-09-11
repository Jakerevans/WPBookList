<?php
/**
 * WPBackupList Backup Class
 *
 * @author   Jake Evans
 * @category Root Product
 * @package  Includes/Classes
 * @version  6.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPBookList_Backup', false ) ) :
	/**
	 * WPBackupList_Backup Class.
	 */
	class WPBookList_Backup {

		/** Common member variable
		 *
		 *  @var string $library
		 */
		public $library = null;

		/** Common member variable
		 *
		 *  @var int $create_backup_result
		 */
		public $create_backup_result = 0;

		/** Common member variable
		 *
		 *  @var int $create_csv_result
		 */
		public $create_csv_result = 0;

		/** Common member variable
		 *
		 *  @var int $restore_backup_result
		 */
		public $restore_backup_result = 0;

		/** Common member variable
		 *
		 *  @var string $backup_file
		 */
		public $backup_file = null;

		/** Class Constructor
		 *
		 *  @param string $action - The action to take concerning the backup.
		 *  @param string $library - The library in question concerning the backup.
		 *  @param string $backup_file - The name of the backup file.
		 */
		public function __construct( $action = null, $library = null, $backup_file = null ) {

			$this->library = $library;
			$this->backup_file = $backup_file;

			if($action == 'library_database_backup'){
				$this->create_library_db_backup();
			}

			if($action == 'library_database_restore'){
				$this->library_db_restore();
			}

			if($action == 'create_csv_file'){
				$this->create_csv_file();
			}
			
		}

		private function create_csv_file(){
			global $wpdb;
			$result = $wpdb->get_results('SELECT * FROM '.$this->library);

			$isbn_string = '';
			foreach ($result as $key => $value) {
				$isbn_string = $isbn_string.','.$value->isbn;
			}

			$isbn_string = ltrim($isbn_string);
			$isbn_string = ltrim($isbn_string, ',');
			$result = file_put_contents(LIBRARY_DB_BACKUPS_UPLOAD_DIR.'isbn_asin_'.$this->library.'.txt', $isbn_string);

			if($result){

				$zip = new ZipArchive;
				if ($zip->open(LIBRARY_DB_BACKUPS_UPLOAD_DIR.'isbn_asin_'.$this->library.'.txt.zip', ZipArchive::CREATE) === TRUE)
				{
					// Add files to the zip file
					$zip->addFile(LIBRARY_DB_BACKUPS_UPLOAD_DIR.'isbn_asin_'.$this->library.'.txt', 'isbn_asin_'.$this->library.'.txt');			 
					// All files are added, so close the zip file.
					$zip->close();
				}

				$this->create_csv_result = '1,'.'isbn_asin_'.$this->library.'.txt';
			}
		}

		private function create_library_db_backup(){
			global $wpdb;
			$result = $wpdb->get_results('SELECT * FROM '.$this->library);
			$num_rows = $wpdb->num_rows;

		
			$return = 'DROP TABLE '.$this->library.';';
			$row2 = $wpdb->get_results('SHOW CREATE TABLE '.$this->library);
			$return.= "\n\n".$row2[0]->{'Create Table'}.";\n\n";
			
			foreach($result as $r){
				$return.= 'INSERT INTO '.$this->library.' VALUES(';
				foreach($r as $key=>$data){
					$data = addslashes($data);
					$data = preg_replace("/[\n]/","\\n",$data);

					if (isset($data)){
						$return.= '"'.$data.'"' ; 
					} else { 
						$return.= '""'; 
					}

					$return.= ','; 
				}
				$return.= ");\n";
			}

			$return = str_replace('",);', '");', $return);
			$return.="\n\n\n";

			// Make the backup directory if needed 
			$mkdir1 = null;
			if (!file_exists(LIBRARY_DB_BACKUPS_UPLOAD_DIR)) {
				// TODO: create log file entry 
				$mkdir1 = mkdir(LIBRARY_DB_BACKUPS_UPLOAD_DIR, 0777, true);
			}
		
			//save file
			$handle = fopen(LIBRARY_DB_BACKUPS_UPLOAD_DIR.$this->library.'_-_'.date('m-d-y').'_-_'.time().'.sql','w+');
			$results = fwrite($handle,$return);

			if($results != false){
				// Create zip of backup
				$zip = new ZipArchive;
				if ($zip->open(LIBRARY_DB_BACKUPS_UPLOAD_DIR.$this->library.'_-_'.date('m-d-y').'_-_'.time().'.sql.zip', ZipArchive::CREATE) === TRUE)
				{
					// Add files to the zip file
					$zip->addFile(LIBRARY_DB_BACKUPS_UPLOAD_DIR.$this->library.'_-_'.date('m-d-y').'_-_'.time().'.sql', $this->library.'_-_'.date('m-d-y').'_-_'.time().'.sql');			 
					// All files are added, so close the zip file.
					$zip->close();
				}

				$this->create_backup_result = '1,'.$this->library.'_-_'.date('m-d-y').'_-_'.time().'.sql';
			}
			fclose($handle);
		}

		private function library_db_restore(){
			// TODO: introduce checks to see if we have access to db, then if we can write to the db, drop tables/create tables. If any of those fail, then abort restore and inform user on UI
			global $wpdb;
			// Temporary variable, used to store current query
			$templine = '';
			$set_error = 0;
			$lines = fopen(LIBRARY_DB_BACKUPS_UPLOAD_DIR.$this->backup_file, "r");
			if(true === is_resource($lines)){
				// Loop through each line
				while(false === feof($lines)){
					$line = fgets($lines);

					// Skip it if it's a comment
					if (substr($line, 0, 2) == '--' || $line == ''){
						continue;
					}

					// Add this line to the current segment
					$templine .= $line;
					// If it has a semicolon at the end, it's the end of the query
					if (substr(trim($line), -1, 1) == ';'){
						// Perform the query
						$result = $wpdb->query($templine);

						// Reset temp variable to empty
						$templine = '';
					}

				}
			}

		}

		


	}

endif;
