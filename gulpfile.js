'use strict';

//var dirName = 'crclguestbook.dev';

var proxy = 'crclMysql.dev';

var gulp = require('gulp'),
    watch = require('gulp-watch'),
    prefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    rigger = require('gulp-rigger'),
    cssmin = require('gulp-clean-css'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    rimraf = require('rimraf'),
    browserSync = require("browser-sync"),
    plumber = require ('gulp-plumber'),
    reload = browserSync.reload,
    gutil = require( 'gulp-util' ),
    flatten = require('gulp-flatten'),
    ftp = require( 'vinyl-ftp' );

var path = {
    build: {
        index: 'build/',
        php: 'build/',
        phpParts: 'build/parts',
        phpModules: 'build/modules/',
        js: 'build/views/js/',
        css: 'build/views/css/',
        img: 'build/views/img/',
        fonts: 'build/views/fonts/',
        video: 'build/video',
        htaccess: 'build/',
        core: 'build/components/',
        controllers: 'build/controllers/',
        views: 'build/views/',
        vendor: 'build/vendor/',
        models: 'build/models/',
        config: 'build/config/',
        json: 'build/'
    },
    src: {
        index: 'src/*.php',
        php: 'src/*.php',
        phpParts: 'src/parts/*.php',
        phpModules: 'src/modules/**/*.*',
        js: 'src/views/js/**/*.*',
        //style: 'src/style/main.scss',
        style: 'src/views/css/*.*',
        img: 'src/views/img/**/*.*',
        fonts: 'src/views/fonts/**/*.*views/',
        video: 'src/video',
        htaccess: 'src/.htaccess',
        core: 'src/components/*.*',
        controllers: 'src/controllers/*.*',
        views: 'src/views/**/*.*',
        vendor: 'src/vendor/**/*.*',
        models: 'src/models/*.*',
        config: 'src/config/**/*.*',
        json: 'src/*.json'
    },
    watch: {
        index: 'src/**/*.php',
        php: 'src/**/*.php',
        phpParts: 'build/parts/*.php',
        phpModules: 'src/modules/**/*.*',
        js: 'src/views/js/**/*.js',
        style: 'src/views/css/**/*.*',
        img: 'src/views/img/**/*.*',
        fonts: 'src/views/fonts/**/*.*',
        video: 'src/video',
        htaccess: 'src/.htaccess',
        components: 'src/components/*.*',
        controllers: 'src/controllers/*.*',
        views: 'src/views/**/*.*',
        models: 'src/models/*.*',
        vendor: 'src/vendor/**/*.*',
        config: 'src/config/**/*.*',
        json: 'src/*.json'
    },
    clean: './build'
};

gulp.task('index:build', function () {
    gulp.src(path.src.index)
        .pipe(gulp.dest(path.build.index))
        .pipe(reload({stream: true}));
});

gulp.task('js:build', function () {
    gulp.src(path.src.js)
        .pipe(plumber())
        .pipe(rigger())
        .pipe(sourcemaps.init())
        //.pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.js))
        .pipe(reload({stream: true}));
});

gulp.task('style:build', function () {
    gulp.src(path.src.style)
        .pipe(plumber())
        //.pipe(sourcemaps.init())
        //.pipe(sass())
        //.pipe(prefixer())
        //.pipe(cssmin())
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest(path.build.css))
        .pipe(reload({stream: true}));
});

gulp.task('image:build', function () {
    gulp.src(path.src.img)
        // .pipe(imagemin({
        //     progressive: true,
        //     svgoPlugins: [{removeViewBox: false}],
        //     use: [pngquant()],
        //     interlaced: true
        // }))
        .pipe(gulp.dest(path.build.img))
        .pipe(reload({stream: true}));
});

gulp.task('fonts:build', function() {
    gulp.src(path.src.fonts)
        .pipe(gulp.dest(path.build.fonts))
});

gulp.task('phpModules:build', function () {
    gulp.src(path.src.phpModules)
        .pipe(rigger())
        .pipe(gulp.dest(path.build.phpModules))
        .pipe(reload({stream: true}));
});

gulp.task('php:build', function () {
    gulp.src(path.src.php)
        .pipe(rigger())
        .pipe(gulp.dest(path.build.php))
        .pipe(reload({stream: true}));
});

gulp.task('phpParts:build', function () {
    gulp.src(path.src.phpParts)
        .pipe(rigger())
        .pipe(gulp.dest(path.build.phpParts))
        .pipe(reload({stream: true}));
});

gulp.task('video:build', function() {
    gulp.src(path.src.video)
        .pipe(gulp.dest(path.build.video))
        .pipe(reload({stream: true}));
});

gulp.task('htaccess:build', function() {
    gulp.src(path.src.htaccess)
        .pipe(gulp.dest(path.build.htaccess))
        .pipe(reload({stream: true}));
});

gulp.task('components:build', function() {
    gulp.src(path.src.core)
        .pipe(gulp.dest(path.build.core))
        .pipe(reload({stream: true}));
});

gulp.task('controllers:build', function() {
    gulp.src(path.src.controllers)
        .pipe(gulp.dest(path.build.controllers))
        .pipe(reload({stream: true}));
});

gulp.task('models:build', function() {
    gulp.src(path.src.models)
        .pipe(gulp.dest(path.build.models))
        .pipe(reload({stream: true}));
});

gulp.task('config:build', function() {
    gulp.src(path.src.config)
        .pipe(gulp.dest(path.build.config))
        .pipe(reload({stream: true}));
});

gulp.task('vendor:build', function() {
    gulp.src(path.src.vendor)
        .pipe(gulp.dest(path.build.vendor))
        .pipe(reload({stream: true}));
});

gulp.task('views:build', function() {
    gulp.src(path.src.views)
        .pipe(gulp.dest(path.build.views))
        .pipe(reload({stream: true}));
});

gulp.task('json:build', function() {
    gulp.src(path.src.json)
        .pipe(gulp.dest(path.build.json))
        .pipe(reload({stream: true}));
});

gulp.task('build', [
    'index:build',
    'js:build',
    'style:build',
    'fonts:build',
    'image:build',
    'video:build',
    'components:build',
    'config:build',
    'vendor:build',
    'views:build',
    'json:build'
]);


gulp.task('watch', function(){
    watch([path.watch.index], function(event, cb) {
        gulp.start('index:build');
    });
    watch(path.watch.phpModules, function(event, cb) {
        gulp.start('phpModules:build');
        //gulp.start('deploy');
    });

    // watch([path.watch.php], function(event, cb) {
    //     gulp.start('php:build');
    //     //gulp.start('deploy');
    // });

    // watch([path.watch.phpParts], function(event, cb) {
    //     gulp.start('phpParts:build');
    //     //gulp.start('deploy');
    // });

    watch([path.watch.style], function(event, cb) {
        gulp.start('style:build');
    });
    watch([path.watch.js], function(event, cb) {
        gulp.start('js:build');
    });
    watch([path.watch.img], function(event, cb) {
        gulp.start('image:build');
    });
    watch([path.watch.fonts], function(event, cb) {
        gulp.start('fonts:build');
    });
    watch([path.watch.htaccess], function(event, cb) {
        gulp.start('htaccess:build');
    });
    watch([path.watch.components], function(event, cb) {
        gulp.start('components:build');
    });
    watch([path.watch.controllers], function(event, cb) {
        gulp.start('controllers:build');
    });
    watch([path.watch.models], function(event, cb) {
        gulp.start('models:build');
    });
    watch([path.watch.views], function(event, cb) {
        gulp.start('views:build');
    });
    watch([path.watch.config], function(event, cb) {
        gulp.start('config:build');
    });
    watch([path.watch.vendor], function(event, cb) {
        gulp.start('vendor:build');
    });
    watch([path.watch.json], function(event, cb) {
        gulp.start('json:build');
        console.log('test')
    });
});

gulp.task('clean', function (cb) {
    rimraf(path.clean, cb);
});

// ////////////////////////////////////////////////
// Browser-Sync
// // /////////////////////////////////////////////
gulp.task('bsPHP', function() {
    browserSync({
        proxy: proxy,
        port:8000
    });
});

gulp.task('browser-sync', function () {
    var files = [
        'build/**/*.html',
        'build/assets/css/**/*.css',
        'build/assets/img/**/*.*',
        'build/assets/js/**/*.js'
    ];

    browserSync.init(files, {
        server: {
            baseDir: './build'
        },
        tunnel: true,
        host: 'localhost',
        port: 8000,
        logPrefix: ""
    });
});

gulp.task('browser-sync-without-tunnel', function () {
    var files = [
        'build/**/*.html',
        'build/assets/css/**/*.css',
        'build/assets/img/**/*.*',
        'build/assets/js/**/*.js'
    ];

    browserSync.init(files, {
        server: {
            baseDir: './build'
        },
        tunnel: false,
        host: 'localhost',
        port: 9000,
        logPrefix: ""
    });
});

gulp.task('default', ['build', 'watch','browser-sync-without-tunnel']);
gulp.task('defaultPHP', ['build', 'watch','bsPHP']);
gulp.task('default-tunnel', ['build', 'watch','browser-sync']);
gulp.task('default-without-tunnel', ['build', 'watch','browser-sync-without-tunnel']);