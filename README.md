# IIS Start

IIS Start is a bare-minimum starter theme for WordPress. The goal is to reduce startup time when developing
new themes and to keep the themes consistent in terms of code style, build/bundling tools and testing.

Start by reading this README that contains sections on how to get started, development workflow and coding conventions.

## How to use

1. Clone the theme
2. Replace all instances of "IIS Start", see replacements below
3. Update style.css
4. Activate the theme

Do a "search & replace" (case sensitive) on the following:

1. `'iis-start'` to `'my-theme'`
2. `iis_start_` to `my_theme_` for function names
3. `iis-start-` to `my-theme-` for prefixed handles
4. `IIS Start` to `My Theme` for names
5. `iis-start` (without quotes) to `my-theme` for text-domain and css namespace

## Development Workflow

We use Webpack for bundling with Laravel Mix on top for an simpler API and less configuration.

1. Install dependencies `yarn install`
2. Start developing with `yarn start`.

`yarn start` watches scripts and styles, compiles/transpiles them with Babel (js) and SCSS+Autoprefixer (css).
A mix-manifest.json is generated with the names to each bundle that the theme reads and includes on the page.

## Configuration

It's recommended to configure `.browserslist` and when necessary install babel presets/transformers/plugins and add them to `.babelrc`. You can also activate automatic browser reloads by uncommenting the `browserSync` line in `webpack.mix.js`.

## Code quality

Before pushing any code make sure that the code follows [the IIS Coding Conventions](https://github.com/sewebb/iis-start/wiki/IIS-Coding-Conventions).

* `yarn run eslint`
* `yarn run sasslint`

To lint PHP you need to install [phpcs](https://github.com/squizlabs/PHP_CodeSniffer) and [WordPress coding standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards). When that is set, run: `yarn run phplint`. 

## Production

When deploying to production you should use `yarn run production` instead of `yarn start` to produce production-ready bundles.
