'use strict';

/**
 * Gulp File
 * Version 1.0
 */

/*
 * Dependencies
 */
var gulp        = require('gulp');

/**
 * Destino de los archivos.
 * @type {string}
 */
var dest = 'public/images/';

/**
 * Copia imagenes de la app.
 */
gulp.task('app-images', function () {
    return gulp.src('assets/images/**/*.*')
        .pipe(gulp.dest(dest))
    ;
});