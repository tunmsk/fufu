var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

// Variables des chemins
var source = './src'; // dossier de travail
var destination = './public'; // dossier à livrer


// Les tâches
gulp.task('less', function () {
  return gulp.src(source + '/less/*.less')
    .pipe(plugins.less())
    .pipe(plugins.csscomb())
    .pipe(plugins.cssbeautify({indent: '  '}))
    .pipe(plugins.autoprefixer())
    .pipe(gulp.dest(source + '/css/'));
});

gulp.task('sass', function () {
  return gulp.src(source + '/sass/*.sass')
    .pipe(plugins.sass())
    .pipe(plugins.csscomb())
    .pipe(plugins.cssbeautify({indent: '  '}))
    .pipe(plugins.autoprefixer())
    .pipe(gulp.dest(source + '/css/'));
});

gulp.task('scss', function () {
  return gulp.src(source + '/scss/*.scss')
    .pipe(plugins.scss())
    .pipe(plugins.csscomb())
    .pipe(plugins.cssbeautify({indent: '  '}))
    .pipe(plugins.autoprefixer())
    .pipe(gulp.dest(source + '/css/'));
});

gulp.task('js', function () {
  return gulp.src(source + '/js/*.js')
    .pipe(plugins.uglify())
    .pipe(gulp.dest(destination + '/js/'));
});

gulp.task('css', function () {
  return gulp.src(source + '/css/*.css')
    .pipe(plugins.csso())
    .pipe(plugins.rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest(destination + '/css/'));
});

gulp.task('img', function () {
  return gulp.src(source + '/img/*.{png,jpg,jpeg,gif,svg}')
    .pipe(plugins.imagemin())
    .pipe(gulp.dest(destination + '/img'));
});


// Tâche "build" qui execute toutes les tâches
gulp.task('build', ['less', 'sass', 'scss', 'css', 'js', 'img']);

// Tâche "min" qui execute la minifications
gulp.task('min', ['css', 'js']);


// Tâche "watch" qui surveille les changements
gulp.task('watch', function () {
  gulp.watch(source + '/less/*.less', ['less']);
  gulp.watch(source + '/sass/*.sass', ['sass']);
  gulp.watch(source + '/scss/*.scss', ['scss']);
});

// Tâche par défaut
gulp.task('default', ['build']);
