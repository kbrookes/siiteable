var gulp = require('gulp'),
plumber = require('gulp-plumber'),
rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');


gulp.task('styles', function(){
gulp.src(['scss/style.scss/**/*.scss'])
.pipe(plumber({
  errorHandler: function (error) {
	console.log(error.message);
	this.emit('end');
}}))
.pipe(sass())
.pipe(autoprefixer('last 2 versions'))
.pipe(gulp.dest('style.scss/'))
.pipe(rename({suffix: '.min'}))
.pipe(minifycss())
.pipe(gulp.dest('style.scss/'))
});

gulp.task('scripts', function(){
return gulp.src('js/dist/**/*.js')
.pipe(plumber({
  errorHandler: function (error) {
	console.log(error.message);
	this.emit('end');
}}))
.pipe(concat('main.js'))
.pipe(gulp.dest('js/src/'))
.pipe(rename({suffix: '.min'}))
.pipe(uglify())
.pipe(gulp.dest('js/src/'))
});

gulp.task('default', function(){
gulp.watch("scss/style.scss/**/*.scss", ['styles']);
gulp.watch("js/dist/**/*.js", ['scripts']);
});