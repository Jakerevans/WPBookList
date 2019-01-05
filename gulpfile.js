/**
Mostly derived from https://bitsofco.de/a-simple-gulp-workflow
npm install gulp
npm install --save-dev gulp-sass
npm install --save-dev gulp-concat
npm install --save-dev gulp-uglify
npm install --save-dev gulp-util
npm install --save-dev gulp-rename
npm install --save-dev gulp-babel
npm install --save-dev gulp-zip
npm install --save-dev del
 */

// First require gulp.
var gulp   = require( 'gulp' ),
	sass   = require( 'gulp-sass' ),
	concat = require( 'gulp-concat' ),
	uglify = require( 'gulp-uglify' ),
	gutil  = require( 'gulp-util' ),
	rename = require( 'gulp-rename' ),
	zip    = require( 'gulp-zip' ),
	del    = require( 'del' );

// Define default task.
gulp.task( 'default', function(done) {
	return done();
});

gulp.task( 'copyassets', function () {
	return gulp.src([ './assets/**/*' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copyincludes', function () {
	return gulp.src([ './includes/**/*' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copyquotes', function () {
	return gulp.src([ './quotes/**/*' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copyconfig', function () {
	return gulp.src([ './wpbooklistconfig.ini' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copyreadme', function () {
	return gulp.src([ './readme.txt' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copylang', function () {
	return gulp.src([ './languages/**/*' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'copymainfile', function () {
	return gulp.src([ './wpbooklist.php' ], {base: './'}).pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'zip', function () {
	return gulp.src( '../wpbooklist_dist/WPBookList-Distribution/**' )
		.pipe(zip( 'wpbooklist.zip' ) )
		.pipe(gulp.dest( '../wpbooklist_dist/WPBookList-Distribution' ) );
});

gulp.task( 'cleanzip', function(cb) {
	return del([ '../wpbooklist_dist/WPBookList-Distribution/**/*' ], {force: true}, cb);
});

gulp.task( 'clean', function(cb) {
	return del([ '../wpbooklist_dist/WPBookList-Distribution/**/*', '!../wpbooklist_dist/WPBookList-Distribution/wpbooklist.zip' ], {force: true}, cb);
});

// Cleanup/Zip/Deploy task
gulp.task('default',gulp.series( 'cleanzip', gulp.parallel('copyassets','copyincludes','copyquotes','copyconfig','copyreadme','copylang','copymainfile'),'zip','clean',function(done) {done();}));

/*
 *	WATCH TASKS FOR SCSS/CSS
 *
*/
var sassFrontendSource        = [ 'dev/scss/wpbooklist-main-frontend.scss' ];
var sassBackendSource         = [ 'dev/scss/wpbooklist-main-admin.scss' ];
var jsBackendSource           = [ 'dev/js/backend/*.js' ];
var jsFrontendSource          = [ 'dev/js/frontend/*.js' ];
var watcherMainFrontEndScss = gulp.watch( sassFrontendSource );
watcherMainFrontEndScss.on('all', function(event, path, stats) {

	gulp.src( sassFrontendSource )
		.pipe(sass({
			outputStyle: 'compressed'
		})
			.on( 'error', gutil.log ) )
		.pipe(gulp.dest( 'assets/css' ) )
		.on('end', function(){ console.log('Finished!!!') });

  console.log('File ' + path + ' was ' + event + 'ed, running tasks...');
});
var watcherMainBackEndScss = gulp.watch( sassBackendSource );
watcherMainBackEndScss.on('all', function(event, path, stats) {

	gulp.src( sassBackendSource )
		.pipe(sass({
			outputStyle: 'compressed'
		})
			.on( 'error', gutil.log) )
		.pipe(gulp.dest( 'assets/css' ) )
		.on('end', function(){ console.log('Finished!!!') });

  console.log('File ' + path + ' was ' + event + 'ed, running tasks...');
});
var watcherJsBackendSource = gulp.watch( jsBackendSource );
watcherJsBackendSource.on('all', function(event, path, stats) {

	gulp.src( jsBackendSource ) // use jsSources
		.pipe(concat( 'wpbooklist_admin.min.js' ) ) // Concat to a file named 'script.js'
		.pipe(uglify() ) // Uglify concatenated file
		.pipe(gulp.dest( 'assets/js' ) )
		.on('end', function(){ console.log('Finished!!!') });


  console.log('File ' + path + ' was ' + event + 'ed, running tasks...');
});
var watcherJsFrontendSource = gulp.watch( jsFrontendSource );
watcherJsFrontendSource.on('all', function(event, path, stats) {

	gulp.src(jsFrontendSource ) // use jsSources
		.pipe(concat( 'wpbooklist_frontend.min.js' ) ) // Concat to a file named 'script.js'
		.pipe(uglify() ) // Uglify concatenated file
		.pipe(gulp.dest( 'assets/js' ) ) // The destination for the concatenated and uglified file
		.on('end', function(){ console.log('Finished!!!') });

  console.log('File ' + path + ' was ' + event + 'ed, running tasks...');
});
