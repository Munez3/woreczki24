var gulp = require('gulp');
var compass = require('gulp-compass');
var autoprefixer = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var browserSync = require('browser-sync').create();


gulp.task('compass', function() {
  return gulp.src('app/sass/screen.scss')
    .pipe(plumber({
      errorHandler: function (error) {
        console.log(error.message);
        this.emit('end');
    }}))
    .pipe(compass({ 
      config_file: 'app/config.rb',
      css: 'app/stylesheets',
      sass: 'app/sass'
    }))
    .pipe(autoprefixer())
    .pipe(gulp.dest('app/stylesheets'))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('browserSync', function() {
  browserSync.init({
    server: {
      baseDir: 'app'
    },
  })
});



gulp.task('watch', ['browserSync', 'compass'], function(){
  gulp.watch('app/sass/**/*.scss', ['compass']);
  gulp.watch('app/*.html', browserSync.reload);
  gulp.watch('app/js/**/*.js', browserSync.reload);
});
