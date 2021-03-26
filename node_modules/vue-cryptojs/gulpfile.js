const gulp = require('gulp')
const babel = require('gulp-babel')
const uglify = require('gulp-uglify')
const rename = require('gulp-rename')

gulp.task('default', () => {
  return gulp.src('src/index.mjs')
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(rename('vue-cryptojs.es5.js'))
    .pipe(gulp.dest('dist'))
    .pipe(uglify())
    .pipe(rename('vue-cryptojs.min.js'))
    .pipe(gulp.dest('dist'))
})