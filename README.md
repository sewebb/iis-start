# IIS Start

IIS Start is a bare-minimum starter theme for WordPress. The goal is to reduce startup time when developing
new themes and to keep the themes consistent in terms of code style, build/bundling tools and testing.

Start by reading this README that contains sections on how to get started, development workflow and coding conventions.

## Dependencies

- Docker or Vagrant (optional)
- Git
- Composer
- Yarn

## How to use

1. Clone the repo
2. Replace all instances of "IIS Start", see replacements below
3. Update style.css
4. Copy `.env-sample` to `.env` and make necessary changes.
4. Run `composer install` to setup WordPress.
5. Install client dependencies `yarn install`
6. Run `yarn run production` to build css and javascript files

Do a "search & replace" (case sensitive) on the following:

1. `'iis-start'` to `'my-theme'`
2. `iis_start_` to `my_theme_` for function names
3. `iis-start-` to `my-theme-` for prefixed handles
4. `IIS Start` to `My Theme` for names
5. `iis-start` (without quotes) to `my-theme` for text-domain and css namespace
6.

## Development environment

We've provided support for both Docker and Vagrant right out of the box. You can of course use your own environment. Make sure it meets the [WordPress requirements](https://wordpress.org/about/requirements/).

### Docker

Install [Docker](https://docs.docker.com/install/) and run `docker-compose up -d`. Environment configuration is made in the `.env` file. If you need to change php configuration or nginx, check out the `php.ini` and `default.template.conf` in the `docker` directory.

## Development Workflow

We use Webpack for bundling with Laravel Mix on top for an simpler API and less configuration.

1. Start developing with `yarn start`.

`yarn start` watches scripts and styles, compiles/transpiles them with Babel (js) and SCSS+Autoprefixer (css).
A mix-manifest.json is generated with the names to each bundle that the theme reads and includes on the page.

## Configuration

It's recommended to configure `.browserslist` and when necessary install babel presets/transformers/plugins and add them to `.babelrc`. You can also activate automatic browser reloads by uncommenting the `browserSync` line in `webpack.mix.js`.

## Code quality

Before pushing any code make sure that the code follows [the IIS Coding Conventions](https://github.com/sewebb/iis-start/wiki/IIS-Coding-Conventions).

* `yarn run eslint`
* `yarn run sasslint`
* `yarn run phplint`
* `yarn run htmllint`

Or all at once with `yarn run lint`.

## Production

When deploying to production you should use `yarn run production` instead of `yarn start` to produce production-ready bundles.
