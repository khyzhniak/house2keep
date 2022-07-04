const { src, dest, watch, parallel } = require('gulp');

const sass         = require('gulp-dart-sass');
const concat       = require('gulp-concat');
const sourcemaps   = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
//const rename       = require("gulp-rename");
const babel        = require('gulp-babel');
const uglify       = require('gulp-uglify-es').default;
//const browsersync  = require('browser-sync').create();

function styles(){
  return src('src/sass/main.sass')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefixer(['last 15 versions']))
    .pipe(concat('main.min.css'))
    .pipe(sourcemaps.write(''))
    .pipe(dest('css'))
    //.pipe(browsersync.stream()); 
}

function scripts(){
  return src([
    'src/js/main.js'
  ])
  .pipe(concat('main.min.js'))
  .pipe(babel({presets: ['@babel/env']}))
  .pipe(sourcemaps.init())
  .pipe(uglify())
  .pipe(sourcemaps.write(''))
  .pipe(dest('js'))
  //.pipe(browsersync.stream()); 
}

function watching(){
  watch(['src/sass/**/*.sass'], styles);
  watch(['src/js/**/*.js', '!app/js/main.min.js'], scripts);
  //watch(['./**/*.php']).on('change', browsersync.reload);
}

exports.default = parallel(scripts, watching);
