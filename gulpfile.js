const gulp = require('gulp');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');

const cssFiles = ['./app/css/bootstrap-grid.min.css', './app/css/fancybox.css',
    './app/css/common.css', './app/css/style_sass.css'];
const jsFiles = ['./app/js/fancybox.js', './app/js/translate.js',
    './app/js/main_template.js', './app/js/easy_load.js', './app/js/menu.js',
    './app/js/animate.js', './app/js/main_slider.js', './app/js/slider_fabric.js',
    './app/js/initial_all_sliders.js', './app/js/mailer.js', './app/js/found_main.js',
    './app/js/header_found.js', './app/js/popup.js', './app/js/price_accordeon.js', './app/js/mobile_menu.js'];
const sassFiles = ['./app/css/header.scss', './app/css/footer.scss', './app/css/main_page.scss',
    './app/css/pagination.scss', './app/css/register.scss', './app/css/login.scss', './app/css/contact.scss',
    './app/css/about.scss', './app/css/reviews.scss', './app/css/vacancy.scss', './app/css/company_slider.scss',
    './app/css/feedback.scss', './app/css/job_category.scss', './app/css/single.scss',
    "./app/css/prevyu_article.scss", "./app/css/shares_single.scss", "./app/css/news_category.scss",
    "./app/css/direction_index.scss", "./app/css/block_found.scss", "./app/css/schares_slider.scss",
    "./app/css/price_direction.scss", "./app/css/services_index.scss", "./app/css/staff_index.scss",
    "./app/css/staff_category.scss", "./app/css/programs_index.scss", "./app/css/programs_category.scss",
    "./app/css/prof_index.scss", "./app/css/three_article.scss", "./app/css/qa_category.scss",
    "./app/css/partners.scss", "./app/css/price.scss", "./app/css/slider_doc.scss", "./app/css/main_form.scss",
    "./app/css/animate.scss", "./app/css/popup.scss", "./app/css/form.scss",
    "./app/css/search.scss", "./app/css/404.scss", "./app/css/breadcrumbs.scss"];

function sass_style() {

   return gulp.src(sassFiles)
      .pipe(concat('style_sass.css'))
      .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer({
         browsers: ['> 0.1%'],
         cascade: false
      }))
      .pipe(cleanCSS({ level: 2 }))
      .pipe(gulp.dest('./app/css/'));
}

function styles() {
   return gulp.src(cssFiles)
      .pipe(concat('style.css'))
      .pipe(autoprefixer({
         browsers: ['> 0.1%'],
         cascade: false
      }))
      .pipe(cleanCSS({ level: 2 }))
      .pipe(gulp.dest('./template/css/'));
}

function script() {
   return gulp.src(jsFiles)
      .pipe(concat('script.js'))
      /* .pipe(uglify(
          {toplevel: true}
       ))*/
      .pipe(gulp.dest('./template/js/'));
}

function watch() {
   gulp.watch('./app/css/*.css', styles);
   gulp.watch('./app/js/*.js', script);
   gulp.watch('./app/css/*.scss', sass_style);
}
gulp.task('styles', styles);
gulp.task('script', script);
gulp.task('sass_style', sass_style);
gulp.task('watch', watch);