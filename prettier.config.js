/**
 * @type {import('prettier').Config}
 */
const wpConfig = require('@wordpress/prettier-config');

module.exports = {
	...wpConfig,

	useTabs: true,
	tabWidth: 2,
	printWidth: 200,
	singleQuote: true,
	trailingComma: 'es5',
	bracketSpacing: true,
	bracketSameLine: true,
	semi: true,
	arrowParens: 'avoid',

	overrides: [
		{
			files: '*.md',
			options: {
				proseWrap: 'always',
				printWidth: 80,
			},
		},
		{
			files: '*.json',
			options: {
				printWidth: 200,
			},
		},
	],
};
