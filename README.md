# IIS Start

IIS Start is a bare-minimum starter theme for WordPress. The goal is to reduce startup time when developing
new themes and to keep the themes consistent in terms of code style, build/bundling tools and testing.

Start by reading this README that contains sections on how to get started, development workflow and coding conventions.

## Dependencies

- Docker or Vagrant (optional)
- Git
- Composer
- Npm/Node

## How to use

1. Clone the repo
2. Replace all instances of "IIS Start", see replacements below
3. Update style.css
4. Copy `.env-sample` to `.env` and make necessary changes.
5. Run `composer install` to setup WordPress.
6. Install client dependencies `npm install`
7. Run `npm run production` to build css and javascript files

Do a "search & replace" (case sensitive) on the following:

1. `'iis-start'` to `'my-theme'`
2. `iis_start_` to `my_theme_` for function names
3. `iis-start-` to `my-theme-` for prefixed handles
4. `IIS Start` to `My Theme` for names
5. `iis-start` (without quotes) to `my-theme` for text-domain and css namespace

## Development environment

We've provided support for both Docker and Vagrant right out of the box. You can of course use your own environment. Make sure it meets the [WordPress requirements](https://wordpress.org/about/requirements/).

## Development Workflow

We use Webpack for bundling with Laravel Mix on top for an simpler API and less configuration.

1. Start developing with `npm start`.

`npm start` watches scripts and styles, compiles/transpiles them with Vite.
A dev server is started on `localhost:5173` (or `VITE_PORT` in your .env file) that serves your js and css with hot reload.

## Code quality

Before pushing any code make sure that the code follows [the IIS Coding Conventions](https://github.com/sewebb/iis-start/wiki/IIS-Coding-Conventions).

* `npm run eslint`
* `npm run stylelint`

Or all at once with `npm run lint`.

PHP can be linted with `composer test`. You can also use `composer php-fix` to auto-fix issues, and `composer php-blame` to see code sniffer summary for all contributors.

## Production

When deploying to production you should use `npm run production` instead of `npm start` to produce production-ready bundles.
