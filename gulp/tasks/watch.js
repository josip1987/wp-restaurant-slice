var gulp = require('gulp'),
watch = require('gulp-watch'),
browserSync = require('browser-sync').create();

gulp.task('watch', function() {

	browserSync.init({
		// set proxy to theme name, for example:
		// proxy: "http://localhost/best-wp-theme-ever/"
		proxy: "http://localhost/wp-restaurant/"
	});

	watch('./**/*.php', function() {
		browserSync.reload();
	});

	watch('./app/assets/styles/**/*.css', function() {
		gulp.start('cssInject');
	});

	watch('./app/assets/scripts/**/*.js', function() {
		gulp.start('scriptsRefresh');
	});
});

gulp.task('cssInject', ['style'], function() { //make sure 'style' is dependency
	return gulp.src('./').pipe(browserSync.stream());
});

gulp.task('scriptsRefresh', ['scripts'], function() {
	browserSync.reload();
});
