'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var browserify = require('browserify');
var gutil = require('gulp-util');
var jshint = require('gulp-jshint');
var browserify = require('gulp-browserify');
var concat = require('gulp-concat');
var clean = require('gulp-clean');

gulp.task('default', function() {
    // place code for your default task here
});

gulp.task('sass', function () {
    return gulp.src('./src/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        //.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('./'));
});

gulp.task('sass:watch', function () {
    gulp.watch('', ['sass']);
});

gulp.task('watch', function() {
    gulp.watch(['./src/js/**/*.js'], [
        'lint',
        'browserify'
    ]);
    gulp.watch('./src/sass/*.scss', ['sass']);
    gulp.watch(['./src/views/**/*.html'], [
        'views'
    ]);
});

gulp.task('lint', function() {
    gulp.src('./src/js/**/*.js')
        .pipe(jshint())
        // You can look into pretty reporters as well, but that's another story
        .pipe(jshint.reporter('default'));
});

gulp.task('browserify', function() {
    // Single point of entry (make sure not to src ALL your files, browserify will figure it out for you)
    gulp.src(['./src/js/main.js'])
        .pipe(browserify({
            insertGlobals: true,
            debug: true
        }))
        // Bundle to a single file
        .pipe(concat('bundle.js'))
        // Output it to our dist folder
        .pipe(gulp.dest('./'));
});

gulp.task('views', function() {
    // Any other view files from app/views
    gulp.src('./src/views/**/*')
        // Will be put in the dist/views folder
        .pipe(gulp.dest('./views/'));
});