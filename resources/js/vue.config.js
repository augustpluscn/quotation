module.exports = {
  outputDir: '../../public',
  indexPath: process.env.NODE_ENV === 'production'
    ? '../resources/views/app.blade.php'
    : 'index.html',
};