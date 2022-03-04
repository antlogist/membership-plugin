const mix = require("laravel-mix");

mix.sass("resources/assets/sass/app.scss", "dist/css/all.css");

mix.js([
  "resources/assets/js/baseObject.js",
  "resources/assets/js/membership/membership.js",
  "resources/assets/js/membership/user.js",
  "resources/assets/js/init.js"
], "dist/js/all.js");

mix.minify(['dist/css/all.css']);
mix.minify(['dist/js/all.js']);
