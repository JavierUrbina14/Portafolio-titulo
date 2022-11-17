const { src, dest, watch, parallel } = require("gulp");
const terser = require('gulp-terser-js');
const sourcemaps = require('gulp-sourcemaps')
// include mysql module


//CSS
const sass = require('gulp-sass') (require("sass"));
const plumber = require('gulp-plumber');

//IMAGENES
const webp = require('gulp-webp');

function css(done){
    
    src('src/scss/**/*.scss')//identificar el archivo de saas
        .pipe(plumber())
        .pipe( sass() ) //compilar el saas
        .pipe(dest('public/build/css'));//almacenar en el disco duro

    done(); //Callback que avisa a gulp cuando llegamos al final de la función
}

function javascript(done) {
    src('src/js/**/*.js')
      .pipe(terser())
      .pipe(sourcemaps.write('.'))
      .pipe(dest('public/build/js'));

      done();
}

function dev(done){
    watch('src/scss/**/*.scss', css)

    done();
}

function versionWebp(done){

    const opciones = {
        quality: 50
    };

    src('src/img/**/*.{PNG,jpg}')
        .pipe(webp(opciones))
        .pipe(dest('public/build/img'))


    done();
}


exports.css = css;

exports.versionWebp = versionWebp;
exports.dev = parallel(versionWebp, dev);