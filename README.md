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

Before pushing any code make sure that the code follows the guidelines.

* `yarn run eslint`
* `yarn run sasslint`

To lint PHP you need to install [phpcs](https://github.com/squizlabs/PHP_CodeSniffer) and [WordPress coding standards](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards). When that is set, run: `yarn run phplint`. 

## Production

When deploying to production you should use `yarn run production` instead of `yarn start` to produce production-ready bundles.

---

## Kodkonventioner

### WordPress/PHP

Vi följer WordPress rekommendationer:  
https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/  

### Javascript

- Airbnb
- WP

### CSS

- SCSS
- Atomic
- BEM

### HTML

Generellt gäller att försöka hålla nere mängden HTML-markup, undvika att lägga markup i andra filer än HTML/PHP-filer (t ex .js-filer) och följa rådande (HTML5-)standard. Vi ska försök följa dessa regler men inte så hårt att det skapar problem för oss.

 - Använd alltid dubbla citattecken, aldrig enkla. `<a href="http://example.com/" title="Description Here">Example.com</a>`
 - Indentera efter hur strukturen är uppbyggd och alltid med tabbar, aldrig med mellansteg.
 - Alla element och attribut skrivs alltid med gemener.
 - För element utan stängnings-tagg, t ex <br>, behövs inget snedstreck (slash). För attribut som saknar värde behöver heller inget placeholder-värde anges, enligt HTML5-specifikation är dessa valfria. T ex `<option value="#" selected>`.
 - För `<style>` och `<script>` behöver inte type-attributet anges, HTML5-specen kräver det inte.
 - Försök att eftersträva följande attributs-ordning:
    - class
    - id, name
    - data-*
    - src, for, type, href, value
    - title, alt
    - role, aria-*

#### Övriga regler:  
  - https://make.wordpress.org/core/handbook/best-practices/coding-standards/html/
  - http://codeguide.co/#html

## Övriga konventioner

### URL:er

 - Endast små bokstäver i katalogstrukturer och filnamn, aldrig t ex iis.se/IND15/index.php eller iis.se/camelCase.php.
 - Endast [a-z], [0-9] samt [-_.] i katalogstrukturer och filnamn, aldrig t ex iis.se/webbstjärnan/kurs, 0-9-åringar.html. Men www.webbstjärnan.se går bra.
 - Använd hellre [-] än [_] i URL:er, katalogstrukturer och filnamn.
