"use strict";

let gulp = require("gulp");
let sass = require("gulp-sass");
let babel = require("gulp-babel");
let postcss = require("gulp-postcss");
let imagemin = require("gulp-imagemin");
let concat = require("gulp-concat");
let autoprefixer = require("autoprefixer");
let uglify = require("gulp-uglify");
let rename = require("gulp-rename");
let browserSync = require("browser-sync").create();
let clean = require("gulp-clean");
let svgmin = require("gulp-svgmin");
let fs = require("fs");
let runSequence = require("run-sequence").use(gulp);

const path = {
  dev: "./src",
  prod: "./public/wp-content/themes/dr-erico"
};

gulp.task("build", function () {
  return runSequence("clean", "templates", "scss", "js", "libs", "svg", "imgs", "fonts", "json");
});

gulp.task("templates", function () {
  return gulp.src(path.dev + "/templates/**/*.{php,css}")
    .pipe(gulp.dest(path.prod))
});

gulp.task("scss", function () {
  let plugins;

  plugins = [autoprefixer({
    browsers: ["last 2 versions"]
  })];
  return gulp.src(path.dev + "/scss/main.scss")
    .pipe(sass({
      outputStyle: "compressed"
    }).on("error", sass.logError))
    .pipe(postcss(plugins))
    .pipe(rename("main.min.css"))
    .pipe(gulp.dest(path.prod + "/dist/css/"))
    .pipe(browserSync.stream());
});

gulp.task("fonts", function () {
  return gulp.src(path.dev + "/fonts/**.{eot,ttf,woff,woff2}")
    .pipe(gulp.dest(path.prod + "/dist/fonts/"))
});

gulp.task("js", function () {
  return gulp
    .src([path.dev + "/js/*.js"])
    .pipe(babel({
      presets: ["env"]
    }))
    .pipe(concat("main.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(path.prod + "/dist/js/"));
});

gulp.task("libs", function () {
  return gulp.src(path.dev + "/js/libs/*.js")
    .pipe(gulp.dest(path.prod + "/dist/js/libs"))
});

gulp.task("svg", function () {
  return gulp.src(path.dev + "/svg/**/*.svg")
    .pipe(svgmin())
    .pipe(gulp.dest(path.prod + "/dist/svg/"))
});

gulp.task("imgs", function () {
  return gulp.src(path.dev + "/images/**/*.{png,gif,jpg,xml,svg,ico,json}")
    .pipe(
      imagemin([
        imagemin.jpegtran({
          progressive: true
        }),
        imagemin.optipng({
          optimizationLevel: 5
        })
      ])
    )
    .pipe(gulp.dest(path.prod + "/dist/images"))
});

gulp.task("files", function () {
  gulp.src(path.dev + "/**/*.{php,scss,js,svg,png,jpg}")
    .pipe(connect.reload());
});

gulp.task("json", function () {
  return gulp.src(path.dev + "/json/**.json")
    .pipe(gulp.dest(path.prod + "/json/"))
})

gulp.task("clean", function () {
  return gulp.src(path.prod, {
    read: false
  })
    .pipe(clean());
})

gulp.task('serve', ['scss'], function () {
  browserSync.init({
    server: {
      baseDir: '/'
    }
  });
});

gulp.task("watch", function () {
  gulp.watch(path.dev + "/**/*.{php,scss,js,svg,png,jpg}", ["files"]);
});

gulp.task("default", ["watch", "serve"], function () {
  gulp.watch(path.dev + "/scss/**/*.scss", ["scss"]);
  gulp.watch(path.dev + "/templates/**/*.php", ["templates"]);
  gulp.watch(path.dev + "/js/**/*.js", ["js"]);
  gulp.watch(path.dev + "/js/libs/*.js", ["libs"]);
  gulp.watch(path.dev + "/svg/*.svg", ["svg"]);
  gulp.watch(path.dev + "/json/*.json", ["json"]);
  gulp.watch(path.dev + "/images/**", ["imgs"]);
  gulp.watch(path.dev, ["files"]);
});
