module.exports = {
  outputDir: '../../public',
  indexPath: process.env.NODE_ENV === 'production'
    ? '../resources/views/app.blade.php'
    : 'index.html',
  chainWebpack: config => {
    config
      .plugin('html')
      .tap(args => {
        args[0].title = '报价'
        return args
      })
  }
};