var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var minifycss = require('gulp-minify-css');
gulp.task('scripts', function () {
    return gulp.src(['js/**/*.js'])
        .pipe(gulp.dest('dist'));
});


gulp.task('css', function () {
    return gulp.src(['js/swiper/swiper.min.css', 'css/*.css'])
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(concat('all.css'))
        .pipe(minifycss({compatibility: 'ie8'}))
        .pipe(gulp.dest('dist'));
});


gulp.task('default', ['css', 'scripts'], function () {
    console.log('Done');
});