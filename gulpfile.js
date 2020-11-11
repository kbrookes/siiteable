var gulp = require("gulp"),
	sass = require("gulp-sass"),
	postcss = require("gulp-postcss"),
	autoprefixer = require("autoprefixer"),
	cssnano = require("cssnano"),
	sourcemaps = require("gulp-sourcemaps");

var paths = {
	styles: {
		// By using styles/**/*.sass we're telling gulp to check all folders for any sass file
		src: "sass/**/*.scss",
		style: "sass/style.scss",
		// Compiled files will end up in whichever folder it's found in (partials are not compiled)
		dest: "../siiteable-theme/"
	}
 
	// Easily add additional paths
	// ,html: {
	//  src: '...',
	//  dest: '...'
	// }
};

function watch(){
	style();
	gulp.watch(paths.styles.src, style);
}
	
// Don't forget to expose the task!
exports.watch = watch

// Define tasks after requiring dependencies
function style() {
	return (
		gulp
			.src(paths.styles.style)
			.pipe(sourcemaps.init())
			.pipe(sass())
			.on("error", sass.logError)
			.pipe(postcss([autoprefixer(), cssnano()]))
			.pipe(sourcemaps.write('../siiteable-theme/'))
			.pipe(gulp.dest(paths.styles.dest))
	);
}
 
// Expose the task by exporting it
// This allows you to run it from the commandline using
// $ gulp style
exports.style = style;