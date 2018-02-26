'use strict';
/**
 * Gulp File
 * Version 1.0
 */

/*
 * Dependencies
 */
var
    gulp        = require('gulp'),
    requiredir  = require('require-dir')
;

requiredir('./gulp-tasks');

gulp.task('default', ['app-images', 'app-styles', 'app-javascripts']);

