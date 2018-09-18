# iis-start

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