// import tailwindcss from "tailwindcss"

// export const plugins = [
//   tailwindcss('./tailwind.config.js'),
//   require('postcss-import'),
//   require('autoprefixer')
// ]


let tailwindcss = require("tailwindcss")

module.exports = {
  plugins : [
    tailwindcss('./tailwind.config.js'),
      require('postcss-import'),
      // require('autoprefixer')
  ]
}