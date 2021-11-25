module.exports = {
  root: true,
  env: {
    node: true
  },
  extends: [
    'plugin:vue/essential',
    '@vue/standard'
  ],
  parserOptions: {
    parser: 'babel-eslint'
  },
  rules: {
    'no-console': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'no-debugger': process.env.NODE_ENV === 'production' ? 'warn' : 'off',
    'vue/no-parsing-error': [2, { 'x-invalid-end-tag': false }],
    'space-before-function-paren': 0,
    quotes: 0,
    semi: 0,
    'comma-dangle': 0,
    indent: ['off', 2],
    camelcase: ['error', { properties: "never" }],
    'spaced-comment': 0,
    'prefer-const': 'off',
    eqeqeq: 'off'
  }
}
