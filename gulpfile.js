"use strict";

let preprocessor = "scss";
let paths = {
    dist: {
        // html: "assets/",
        css: "assets/css/",
        js: "assets/js/",
        img: "assets/img/",
        fonts: "assets/fonts/",
    },
    src: {
        php: '**/*.php',
        // html: "src/*.html",
        scss: "src/scss/**/main.scss",
        js: ["src/js/**/*.js"],
        img: "src/img/**/*",
        fonts: "src/fonts/**/*",
    },
    watch: {
        php: '**/*.php',
        // html: "src/**/*.html",
        scss: "src/**/*.scss",
        js: "src/**/*.js",
        img: "src/img/**/*",
        fonts: "src/fonts/**/*",
    },
};

const {src, dest, parallel, series, watch} = require("gulp");
const browserSync = require("browser-sync").create();
const concat = require("gulp-concat");
const uglify = require("gulp-uglify-es").default;
const scss = require("gulp-sass");
const less = require("gulp-less");
const autoprefix = require("gulp-autoprefixer");
const cleanCss = require("gulp-clean-css");
const images = require("gulp-imagemin");
const newer = require("gulp-newer");
const del = require("del");
const sourcemap = require("gulp-sourcemaps");
const gulpif = require("gulp-if");
const rigger = require("gulp-rigger");
const htmlmin = require("gulp-htmlmin");
const favicon = require("favicons").stream;
const mode = require("gulp-mode")();
const hash = require("gulp-hash");
const {has} = require("browser-sync");
const inject = require("gulp-inject");
const rename = require("gulp-rename");

let options = {
    hashLength: 25,
    template: "<%= name %>.<%= hash %><%= ext %>",
};


const config = {
    proxy: {
        target: "http://massworld.local/",
    },
    port: 8085,
    notify: false
}

function server() {
    browserSync.init(config)
}


function php() {
    return src(paths.src.php)
        .pipe(browserSync.stream());
}


/*
function reload() {
    browserSync.init({
        server: {
            baseDir: "./dist",
            index: "index.html",
        },
        notify: false,
        online: true,
    });
}
*/

/*function html() {
    return src(paths.src.html)
        .pipe(rigger())
        .pipe(inject(src(
            ["dist/css/!**!/!*.css"],
            {read: false},
        ), {ignorePath: 'dist/', addRootSlash: false}))
        .pipe(inject(src(
            ["dist/js/!**!/!*.js"],
            {read: false},
        ), {ignorePath: 'dist/', addRootSlash: false}))
        .pipe(dest(paths.dist.html))
        .pipe(browserSync.stream());
}*/

function css() {
    return (
        src(paths.src.scss)
            .pipe(eval(preprocessor)())
            .pipe(rigger())
            .pipe(mode.production(concat("main.min.css")))
            .pipe(mode.production(hash(options)))
            .pipe(mode.development(sourcemap.init()))
            .pipe(
                mode.production(
                    cleanCss({
                        level: {
                            1: {specialComments: 0},
                        },
                    })
                )
            )
            .pipe(mode.development(sourcemap.write()))
            .pipe(
                autoprefix({
                    overrideBrowserslist: ["last 10 versions"],
                    grid: true,
                })
            )
            .pipe(dest(paths.dist.css))
            .pipe(browserSync.stream())
    );
}

function js() {
    return src(paths.src.js)
        .pipe(mode.production(concat("main.min.js")))
        .pipe(mode.production(hash(options)))
        .pipe(mode.development(sourcemap.init()))
        .pipe(mode.production(uglify()))
        .pipe(mode.development(sourcemap.write()))
        .pipe(dest(paths.dist.js))
        .pipe(browserSync.stream());
}

function img() {
    return src(paths.src.img, {force: true})
        .pipe(newer("dist/img"))
        .pipe(images())
        .pipe(dest(paths.dist.img));
}

function cleanimg() {
    return del("dist/img/**/*");
}

function faviconGenerate() {
    return src("src/img/favicon/*.*")
        .pipe(
            favicon({
                icons: {
                    appleIcon: true,
                    favicons: true,
                    online: false,
                    appleStartup: false,
                    android: false,
                    firefox: false,
                    yandex: false,
                    windows: false,
                    coast: false,
                },
            })
        )
        .pipe(dest("assets/img/favicon/"))
        .pipe(browserSync.stream());
}

function fonts() {
    return src(paths.src.fonts).pipe(dest(paths.dist.fonts));
}

function cleanDist() {
    return del(["assets/css/**", "assets/js/**"], {force: true});
}

function startWatch() {
    watch([paths.watch.js, /*"!src/!**!/!*.js"*/], js);
    watch([paths.watch.scss], css);
    watch([paths.watch.php], php).on("change", browserSync.reload);
    watch([paths.watch.img], img);
}

// exports.reload = reload;
// exports.html = html;
exports.server = server
exports.php = php
exports.css = css;
exports.js = js;
exports.img = img;
exports.fonts = fonts;
exports.faviconGenerate = faviconGenerate;
exports.cleanimg = cleanimg;
exports.cleanDist = cleanDist;

exports.default = parallel(
    cleanDist,
    php,
    css,
    js,
    // html,
    img,
    fonts,
    faviconGenerate,
    // reload,
    server,
    startWatch
);