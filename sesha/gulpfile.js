const gulp = require('gulp'),
	notify = require("gulp-notify"),
	sourcemaps = require('gulp-sourcemaps'),
	plumber = require('gulp-plumber'),
	sass = require('gulp-sass');

const library = './library',
paths = {
	ftpFiles : [
		'./**/*',
		'!./gulpfile.js',
		'!./package.json',
		'!./package-lock.json'
	]
};


gulp.task('copytheme', () => {
	return gulp.src(paths.ftpFiles)
	.pipe(gulp.dest('../production/sesha'));
});


gulp.task('build', gulp.series('copytheme'));
gulp.task('default', gulp.series('build'));