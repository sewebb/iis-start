import config from "@internetstiftelsen/eslint-config-react";

export default [
	{
		"settings": {
			"react": {
				"version": "detect",
			},
		},
	},
	...config,
	{
		languageOptions: {
			globals: {
				'Intl': 'readonly',
				'wpApiSettings': 'readonly',
				'g10calDefs': 'readonly',
			}
		},
	}
];
