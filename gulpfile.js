//var gulp = require('gulp');
//var gulpLoadPlugins = require('gulp-load-plugins');
//var plugins = gulpLoadPlugins();
var gulp = require('gulp'),
    less = require('gulp-less'),
    concatJs = require('gulp-concat'),
    minifyJs = require('gulp-uglify'),
    clean = require('gulp-clean');

gulp.task('less', function() {
    return gulp.src(['web-src/less/*.less'])
        .pipe(less({compress: true}))
        .pipe(gulp.dest('web/bundles/app/css/'));
});

gulp.task('images', function () {
    return gulp.src([
            'web-src/img/*'
        ])
        .pipe(gulp.dest('web/bundles/app/img/'))
});

gulp.task('lib-js', function() {
    return gulp.src([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/bootstrap/dist/js/bootstrap.js'
        ])
        .pipe(concatJs('app.js'))
        .pipe(minifyJs())
        .pipe(gulp.dest('web/bundles/app/js/'));
});

gulp.task('pages-js', function() {
    return gulp.src([
            'web-src/js/*.js'
        ])
        .pipe(minifyJs())
        .pipe(gulp.dest('web/bundles/app/js/'));
});

gulp.task('clean', function () {
    return gulp.src(['web/bundles/app/css/*', 'web/bundles/app/js/*', 'web/bundles/app/images/*'])
        .pipe(clean());
});

gulp.task('default', ['clean'], function () {
    var tasks = ['less', 'images', 'lib-js', 'pages-js'];
    tasks.forEach(function (val) {
        gulp.start(val);
    });
});

gulp.task('watch', function () {
    var less = gulp.watch('web-src/less/*.less', ['less']),
        js = gulp.watch('web-src/js/*.js', ['pages-js']);
});