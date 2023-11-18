// webpack.mix.js

let mix = require("laravel-mix");
mix.browserSync("127.0.0.1:8080");

mix
  .js("src/app.js", "public/js")
  .postCss("src/app.css", "public/css", [require("tailwindcss")]);
