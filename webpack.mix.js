const mix = require("laravel-mix");

mix.js("resources/js/ProductDetail.js", "public/js")
    .react()
    .js("resources/js/Profile.js", "public/js")
    .react();
