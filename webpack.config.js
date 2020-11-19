const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/client'),
            '@argon': path.resolve(__dirname, 'resources/client/argon'),
            '@src': path.resolve(__dirname, 'resources/client/src'),
            '@shared': path.resolve(__dirname, 'resources/client/shared'),
            '@services': path.resolve(__dirname, 'resources/client/services'),
        }
    },
    module: {
        rules: [
            {
                enforce: 'pre',
                exclude: /node_modules/,
                // loader: 'eslint-loader',
                test: /\.(js|vue)?$/
            },
        ]
    }
};
