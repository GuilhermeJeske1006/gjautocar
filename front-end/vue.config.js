const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
  publicPath: '/sneat/',
})

module.exports = {
  publicPath: process.env.NODE_ENV === 'production' ? '/my-app/' : '/',
}
