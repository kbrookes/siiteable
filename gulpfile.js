var gulp = require("gulp"),
	sass = require("gulp-sass"),
	postcss = require("gulp-postcss"),
	autoprefixer = require("autoprefixer"),
	cssnano = require("cssnano"),
	critical = require("critical"),
	sourcemaps = require("gulp-sourcemaps");

var paths = {
	styles: {
		// By using styles/**/*.sass we're telling gulp to check all folders for any sass file
		src: "sass/**/*.scss",
		style: "sass/style.scss",
		// Compiled files will end up in whichever folder it's found in (partials are not compiled)
		dest: "."
	}
 
	// Easily add additional paths
	// ,html: {
	//  src: '...',
	//  dest: '...'
	// }
};

// Generate & Inline Critical-path CSS
gulp.task("critical", function(cb) {
  critical.generate({
	base: "./",
	src: "http://viirtuality.com.au/",
	dest: "home.min.css",
	ignore: ["@font-face"],
	dimensions: [
	  {
		width: 320,
		height: 480
	  },
	  {
		width: 768,
		height: 1024
	  },
	  {
		width: 1280,
		height: 960
	  }
	],
	minify: true
  });
});

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
			.pipe(sourcemaps.write('.'))
			.pipe(gulp.dest(paths.styles.dest))
	);
}
 
// Expose the task by exporting it
// This allows you to run it from the commandline using
// $ gulp style
exports.style = style;