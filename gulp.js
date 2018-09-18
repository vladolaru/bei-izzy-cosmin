var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    rtlcss        = require('gulp-rtlcss'),
    autoprefixer  = require('gulp-autoprefixer'),
    rename        = require('gulp-rename');

// Sass
gulp.task('sass', function() {
    return gulp.src('./sass/**/*.scss')
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest('./'))

        .pipe(rtlcss())                     // Convert to RTL
        .pipe(rename({ basename: 'rtl' }))  // Rename to rtl.css
        .pipe(gulp.dest('./'));             // Output RTL stylesheets (rtl.css)
});