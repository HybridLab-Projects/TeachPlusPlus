module.exports = {
  root: true,

  env: {
    node: true,
  },

  extends: ['plugin:vue/strongly-recommended', '@vue/airbnb'],

  parserOptions: {
    parser: 'babel-eslint',
  },

  rules: {
    'max-len': [
      'error',
      {
        code: 100,
        ignoreComments: true,
        ignoreUrls: true,
      },
    ],
    'no-console': 'off',
    'no-debugger': 'off',
  },
};
