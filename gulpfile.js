"use strict";

const gulp = require("gulp");
const sass = require("gulp-sass");
const babel = require("gulp-babel");
const postcss = require("gulp-postcss");
const imagemin = require("gulp-imagemin");
const concat = require("gulp-concat");
const autoprefixer = require("autoprefixer");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const browserSync = require('browser-sync').create();
const svgmin = require("gulp-svgmin");
const fs = require("fs");
const runSequence = require("run-sequence").use(gulp);

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
    .pipe(browserSync.stream());
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
    .pipe(gulp.dest(path.prod + "/dist/js/"))
    .pipe(browserSync.stream());
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
    .pipe(browserSync.stream());
});

gulp.task("json", function () {
  return gulp.src(path.dev + "/json/**.json")
    .pipe(gulp.dest(path.prod + "/json/"))
})

gulp.task('serve', ['scss', 'js', 'templates', 'imgs'], function () {

  browserSync.init({
    server: "./public"
  });

  gulp.watch("src/**/*.scss", ['scss']).on('change', browserSync.reload);
  gulp.watch("src/**/*.js", ['js']).on('change', browserSync.reload);
  gulp.watch("src/**/*.{png,gif,jpg,xml,svg,ico,json}").on('change', browserSync.reload);
});

gulp.task("default", ["serve"], function () {
  gulp.watch(path.dev + "/scss/**/*.scss", ["scss"]);
  gulp.watch(path.dev + "/templates/**/*.php", ["templates"]);
  gulp.watch(path.dev + "/js/**/*.js", ["js"]);
  gulp.watch(path.dev + "/js/libs/*.js", ["libs"]);
  gulp.watch(path.dev + "/svg/*.svg", ["svg"]);
  gulp.watch(path.dev + "/json/*.json", ["json"]);
  gulp.watch(path.dev + "/images/**", ["imgs"]);
});
