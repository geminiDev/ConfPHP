var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');
var path = {
    'ressources': {
        'sass': './resources/assets/sass',
        'js': './resources/assets/js',
        'vendor': './resources/assets/vendor'
    },
    'public': {
        'css': './public/assets/css',
        'js': './public/assets/js'
    },
    'watch': '.resources/assets/sass/**/*.scss'
};
gulp.task('sass', function () {
    return gulp.src('./resources/assets/sass/app.scss')
        .pipe(sass({
            onError: console.error.bind(console, 'SASS ERROR')
        })) // compile le sass=> css
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public/assets/css'));
})
gulp.task('js', function () {
    return gulp.src('./resources/assets/js/**/*.js')
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public/assets/js'))
});
gulp.task('boiler', function () {
    return gulp.src('./resources/assets/vendor/**/*.css')
        .pipe(minify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./public/assets/vendor'))
});
gulp.task('watch', function () {
    gulp.watch('./resources/assets/sass/**/*.scss', ['sass']);
    gulp.watch('./resources/assets/js/*.js', ['js']);
    gulp.watch('./resources/assets/vendor/**/*.css', ['boiler'])
});

gulp.task('default', ['watch', 'sass', 'js', 'boiler']);