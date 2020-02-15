const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);
mix.js("resources/js/usersList.js", "public/js");
mix.js("resources/js/usersBulletins.js", "public/js");
mix.js("resources/js/editBulletin.js", "public/js");
mix.js("resources/js/createBulletin.js", "public/js");
mix.js("resources/js/countUsers.js", "public/js");
