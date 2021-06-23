const gulp = 			require('gulp'),
	gutil = 			require('gulp-util' ),
	notify = 			require("gulp-notify"),
	sourcemaps = 		require('gulp-sourcemaps'),
	plumber = 			require('gulp-plumber'),
	sass = 				require('gulp-sass'),
	autoprefixer = 		require('gulp-autoprefixer'),
	minifyCss = 		require('gulp-clean-css'),
	babel = 			require('gulp-babel'),
	uglify = 			require('gulp-uglify'),
	rename = 			require('gulp-rename'),
	concat = 			require('gulp-concat'),
	ftp = 				require('vinyl-ftp' );

const library = './library',
ftpdetails = {
	username: '',
	password: '',
	host: ''
},
paths = {
	scss: {
		src: library+'/scss/*.scss',
		dest: library+'/css',
		watch: library+'/scss/**/*.scss'
	},
	scripts: {
		taskname: 'js',
		src: [
			library+'/js/plugins/**/*.js',
			library+'/js/script.js'
		],
		watch: library+'/js/**/*.js'
	},
	woocommerce: {
		taskname: 'woocommerce',
		src: [library+'/js/woocommerce.js']
	},
	developmentScripts: library+'/scripts',
	productionScripts: library+'/scripts/production',
	ftpLocation : '/public_html/wp-content/themes/sesha-child',
	ftpFiles : [
		'./**/*',
		'./library/css',
		'./library/css/**/*',

		'!./library/.eslintrc',
		'!./gulpfile.js',
		'!./.gitignore',
		'!./package.json',
		'!./package-lock.json',
		'!./forms',
		'!./forms/**/*',
		'!./library/scripts/production',
		'!./library/scripts/production/**/*',
		'!./library/acf',
		'!./library/acf/**/*',

		'!./bootstrap-components',
		'!./bootstrap-components/**/*',
		'!./pattern-library',
		'!./pattern-library/**/*',

		'!./archive-example_post_type.php',
		'!./cheatsheet.php',
		'!./page-template.php',
		'!./page-pattern-library.php',
		'!./page-bootstrap-components.php',
		'!./single-example_post_type.php',

		'!./library/scss',
		'!./library/scss/**/*',
		'!./library/js',
		'!./library/js/**/*',
		'!./library/css/maps',
		'!./library/css/maps/*.*',
	]
};

getPathName = () => {
	let path = __dirname.split('/'),
		[themename] = path.slice(-1) ;
	return themename;
}


gulp.task( 'ftp', function () {
	var conn = ftp.create( {
		host:     ftpdetails.host,
		user:     ftpdetails.username,
		password: ftpdetails.password,
		parallel: 5,
		maxConnections: 5,
		log:      gutil.log
	} );

	return gulp.src( paths.ftpFiles, { base: '.', buffer: false } )
		.pipe( conn.newerOrDifferentSize( paths.ftpLocation ) )
		.pipe( conn.dest( paths.ftpLocation ) );
} );

gulp.task('movescripts', () => {
	return gulp.src([
		'../**/library/scripts/production/*.js'
	])
	.pipe(rename({ dirname: '' }))
	.pipe(gulp.dest(paths.developmentScripts));
});

gulp.task('copytheme', () => {
	return gulp.src(paths.ftpFiles)
	.pipe(gulp.dest('../production/' + getPathName() ));
});


gulp.task('sass', () => {
	return gulp.src(paths.scss.src)
		.pipe(sourcemaps.init())
		.pipe(plumber())
		.pipe(sass({
			errLogToConsole: false
		}))
		.on('error', function (err) {
			notify().write(err);
			this.emit('end');
		})
		.pipe(autoprefixer())
		.pipe(minifyCss())
		.pipe(sourcemaps.write('./maps'))
		.pipe(gulp.dest(paths.scss.dest));
});

function buildJS(taskname, source, filename ) {
	gulp.task(taskname, () => {
		return gulp.src(source)
			.pipe(plumber())
			.pipe(sourcemaps.init())
			.pipe(babel({
				presets: ['@babel/env']
			}))
			.pipe(concat(filename))
			.pipe(rename({ suffix: '.min' }))
			.pipe(gulp.dest(paths.developmentScripts))
			.pipe(uglify())
			.pipe(gulp.dest(paths.productionScripts));
	});
}

// Build Scripts
buildJS(paths.scripts.taskname, paths.scripts.src, 'scripts.js' );
buildJS(paths.woocommerce.taskname, paths.woocommerce.src, 'woocommerce.js' );

gulp.task('watch', () => {
	const watch = [
		paths.scss.watch,
		paths.scripts.watch
	];

	gulp.watch(watch, gulp.series('build'));
});


gulp.task('build', gulp.series('sass', 'js', 'woocommerce'));
gulp.task('default', gulp.series('build', gulp.parallel('watch')));
gulp.task('production', gulp.series('build', 'movescripts', 'copytheme'));
gulp.task('deploy', gulp.series('build', 'movescripts', 'ftp'));