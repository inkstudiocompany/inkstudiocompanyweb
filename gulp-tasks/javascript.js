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
var dest = 'public/js/';

/**
 * Lista de dependencias
 * @type {string[]}
 */
var thirdParty = [
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/wow.js/dist/wow.min.js',
    'node_modules/glidejs/dist/glide.min.js',
    'node_modules/fullpage.js/dist/jquery.fullpage.js',
];

/**
 * Copia las librerias de terceros.
 */
gulp.task('third-party-javascripts', function () {
    return gulp.src(thirdParty)
        .pipe(gulp.dest(dest + '/vendor'))
        ;
});

/**
 * Compila los archivos de la aplicación.
 */
gulp.task('app-javascripts', ['third-party-javascripts'], function () {
    return gulp.src('assets/js/*.js')
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest(dest))
        ;
});