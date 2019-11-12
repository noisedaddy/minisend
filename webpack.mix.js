const mix = require('laravel-mix');
const config = require('./webpack.config');

mix.options({
        postCss: [
            require('autoprefixer'),
        ],
    });

mix.webpackConfig(config);
mix.js('resources/client/main.js', 'public/js/app.js');
