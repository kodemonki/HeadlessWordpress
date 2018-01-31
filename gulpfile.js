/*eslint-env node*/
/*jslint node: true*/
"use strict";

var gulp = require('gulp'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    minifyCSS = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanhtml = require('gulp-cleanhtml'),
    gulpSequence = require('gulp-sequence'),
    config = require("./package.json");

////////////////////////////////////////////////////
// Image Compression
////////////////////////////////////////////////////

gulp.task('imageminpng', function () {
    return gulp.src('./' + config.source + '/*.png')
        .pipe(imagemin({
            optimisationLevel: 7,
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false
            }],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./' + config.destination));
});

gulp.task('imageminjpg', function () {
    return gulp.src('./' + config.source + '/*.jpg')
        .pipe(imagemin({
            optimisationLevel: 7,
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false
            }],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./' + config.destination));
});

////////////////////////////////////////////////////
// autoprefixing and minification
////////////////////////////////////////////////////

gulp.task('css', function () {
    return gulp.src(config.source + '/*.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(minifyCSS())
        .pipe(gulp.dest('./' + config.destination));
});

gulp.task('cleanhtml', function () {
    return gulp.src(config.source + '/index.html')
        .pipe(cleanhtml())
        .pipe(gulp.dest('./' + config.destination + '/'));
});

gulp.task('compressjs', function () {
    return gulp.src(config.source + '/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./' + config.destination + '/'));
});

////////////////////////////////////////////////////
// watch task
////////////////////////////////////////////////////

gulp.task('watch', function () {
    gulp.watch("src/**/*", ['build']);
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

gulp.task('default', function (callback) {
    gulpSequence('build', 'watch')(callback);
});
