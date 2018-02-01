/*eslint-env node*/
/*jslint node: true*/
"use strict";

var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    gulpSequence = require('gulp-sequence'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    config = require("./package.json");

////////////////////////////////////////////////////
// Image Compression
////////////////////////////////////////////////////

gulp.task('imageminpng', function () {
    return gulp.src(config.source + '/images/**/*.png')
        .pipe(imagemin({
            optimisationLevel: 7,
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false
            }],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(config.destination + '/images'));
});

gulp.task('imageminjpg', function () {
    return gulp.src(config.source + '/images/**/*.jpg')
        .pipe(imagemin({
            optimisationLevel: 7,
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false
            }],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(config.destination + '/images'));
});

////////////////////////////////////////////////////
// css tasks
////////////////////////////////////////////////////

gulp.task('sass', function () {
    return gulp.src(config.source + '/sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.destination + '/css'));
});

////////////////////////////////////////////////////
// copy tasks
////////////////////////////////////////////////////

gulp.task('copyphp', function () {
    gulp.src(config.source + '/*.php')
        .pipe(gulp.dest(config.destination + '/'));
    gulp.src(config.source + '/php/*.php')
        .pipe(gulp.dest(config.destination + '/php/'));
});

////////////////////////////////////////////////////
// js tasks
////////////////////////////////////////////////////

gulp.task('compressjs', function () {
    return gulp.src(config.source + '/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest(config.destination + '/js/'));
});

////////////////////////////////////////////////////
// watch task
////////////////////////////////////////////////////

gulp.task('watch', function () {
    gulp.watch(config.source + "/**/*", ['build']);
});


////////////////////////////////////////////////////
// run tasks
////////////////////////////////////////////////////

gulp.task('build', function (callback) {
    gulpSequence('css', 'imageminpng', 'imageminjpg')(callback);
});

gulp.task('deploy', function (callback) {
    gulpSequence('css', 'imageminpng', 'imageminjpg', 'cleanhtml', 'compressjs')(callback);
});
/*
gulp.task('default', function (callback) {
    gulpSequence('build', 'watch')(callback);
});
*/
gulp.task('default', function (callback) {
    gulpSequence('sass', 'copyphp', 'compressjs', 'imageminpng', 'imageminjpg')(callback);
});
