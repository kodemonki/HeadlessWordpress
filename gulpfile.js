/*eslint-env node*/
/*jslint node: true*/
"use strict";

var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    autoprefixer = require('gulp-autoprefixer'),
    gulpSequence = require('gulp-sequence'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    sassGlob = require('gulp-sass-glob'),
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
        .pipe(sassGlob())
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

gulp.task('copyfiles', function () {
    //copy root index.php
    gulp.src(config.source + '/*.php')
        .pipe(gulp.dest(config.destination + '/'));
    //copy template php
    gulp.src(config.source + '/php/*.php')
        .pipe(gulp.dest(config.destination + '/php/'));
    //copy theme files
    gulp.src(config.source + '/theme/*.*')
        .pipe(gulp.dest(config.destination + '/wp-content/themes/gazprom/'));
});

////////////////////////////////////////////////////
// js tasks
////////////////////////////////////////////////////

gulp.task('compressjs', function () {
    return gulp.src(config.source + '/js/**/*.js')
        .pipe(gulp.dest(config.destination + '/js/'));
});

////////////////////////////////////////////////////
// watch task
////////////////////////////////////////////////////

gulp.task('watch', function () {
    gulp.watch(config.source + "/**/*", ['watchbuild']);
});

////////////////////////////////////////////////////
// run tasks
////////////////////////////////////////////////////

gulp.task('watchbuild', function (callback) {
    gulpSequence('sass', 'copyfiles', 'compressjs')(callback);
});

gulp.task('build', function (callback) {
    gulpSequence('sass', 'copyfiles', 'compressjs', 'imageminpng', 'imageminjpg')(callback);
});

gulp.task('watcher', function (callback) {
    gulpSequence('build', 'watch')(callback);
});

gulp.task('default', function (callback) {
    gulpSequence('build')(callback);
});