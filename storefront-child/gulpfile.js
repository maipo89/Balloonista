const {
  src,
  dest,
  parallel,
  series,
  watch
} = require('gulp');

// Load plugins
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
// Replace 'gulp-sass' with 'gulp-dart-sass'
const sass = require('gulp-dart-sass');
const autoprefixer = require('gulp-autoprefixer');
const cssnano = require('gulp-cssnano');
const concat = require('gulp-concat');
const clean = require('gulp-clean');
const imagemin = require('gulp-imagemin');
const changed = require('gulp-changed');
const browsersync = require('browser-sync').create();
var order = require("gulp-order");
var streamqueue  = require('streamqueue');

// all locations store 
var build = {
scss: {
  src: './build_assets/scss/style.scss',
  dest: './dist/styles/'
},
scripts: {
  src: './build_assets/js/*.js',
  dep: './build_assets/js/dep/**',
  dest:'./dist/scripts/'
},
plugins: {
  css: './build_assets/plugins/css/**',
  js: './build_assets/plugins/js/**'
}
}

// JS function 
function js() {
  return streamqueue({ objectMode: true },
      src(build.scripts.dep),
      src(build.plugins.js),
      src(build.scripts.src),
  )
  .pipe(concat('all.min.js'))
  .pipe(uglify())
  .pipe(rename({
      extname: '.min.js'
  }))
  .pipe(dest(build.scripts.dest));
}

// CSS function 
function css() {
  const source = build.scss.src;

  return src(build.plugins.css)
      .pipe(src(source))
      .pipe(concat('all.min.css'))
      .pipe(sass().on('error', sass.logError)) // Make sure to handle errors properly
      .pipe(autoprefixer({
          overrideBrowserslist: ['last 2 versions'],
          cascade: false
      }))
      .pipe(rename({
          extname: '.min.css'
      }))
      .pipe(cssnano())
      .pipe(dest(build.scss.dest));
}

// Watch files
function watchFiles() {
  watch('./build_assets/scss/**', css);
  watch('./build_assets/js/*', js);
  // watch('./build_assets/img/*', img);
}

// Tasks to define the execution of the functions simultaneously or in series
exports.watch = parallel(watchFiles);
exports.default = series(parallel(js, css));
