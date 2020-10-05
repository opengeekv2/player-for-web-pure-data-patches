const { src, dest } = require('gulp');

function copy(cb) {
    src('node_modules/webpd/dist/webpd-latest.min.js')
        .pipe(dest('dist/js'));
    cb();
}

exports.default = copy;