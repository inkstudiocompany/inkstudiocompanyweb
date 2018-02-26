'use strict';

/**
 * Gulp File
 * Version 1.0
 */

/*
 * Dependencies
 */
var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    uglifycss   = require('gulp-uglifycss'),
    sass        = require('gulp-sass')
;

/**
 * Destino de los archivos.
 * @type {string}
 */
var dest = 'public/css/';

/**
 * Lista de dependencias
 * @type {string[]}
 */
var thirdParty = [
    'node_modules/animate.css/animate.min.css',
];

/**
 * Copia las librerias de terceros.
 */
gulp.task('third-party-styles', function () {
    return gulp.src(thirdParty)
        .pipe(gulp.dest(dest + '/vendor'))
    ;
});

/**
 * Compila los archivos de backend.
 */
gulp.task('grid-styles', ['third-party-styles'], function () {
    return gulp.src('assets/scss/grid-inkstudio/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('grid.min.css'))
        .pipe(uglifycss())
        .pipe(gulp.dest(dest))
    ;
});

/**
 * Compila los archivos de backend.
 */
gulp.task('app-styles', ['grid-styles'], function () {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('styles.min.css'))

        .pipe(gulp.dest(dest))
    ;
});