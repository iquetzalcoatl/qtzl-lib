# qtzl-lib

**qtzl-lib** is an **PHP** library to use **BULMA** framework as OOP programming


![qtzl-lib](https://img.shields.io/badge/Qtzl--lib-100%25%20Mexican-success?logo=data%3Aimage%2Fpng%3Bbase64%2CiVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8%2F9hAAABg2lDQ1BJQ0MgcHJvZmlsZQAAKJF9kT1Iw0AcxV9TpUUqDs0g4pChOlkQFXGUKhbBQmkrtOpgcukXNDEkKS6OgmvBwY%2FFqoOLs64OroIg%2BAHi5Oik6CIl%2Fi8ptIjx4Lgf7%2B497t4BQrPGNKtnHNB028wkE1K%2BsCKFXhFGFCKCEGVmGansQg6%2B4%2BseAb7exXmW%2F7k%2FR79atBgQkIhnmWHaxOvE05u2wXmfWGQVWSU%2BJx4z6YLEj1xXPH7jXHZZ4JmimcvMEYvEUrmLlS5mFVMjniKOqZpO%2BULeY5XzFmetVmfte%2FIXRor6cpbrNIeRxCJSSEOCgjqqqMFGnFadFAsZ2k%2F4%2BIdcf5pcCrmqYOSYxwY0yK4f%2FA9%2Bd2uVJie8pEgC6H1xnI8RILQLtBqO833sOK0TIPgMXOkd%2F0YTmPkkvdHRYkfAwDZwcd3RlD3gcgcYfDJkU3alIE2hVALez%2BibCkD0Fuhb9Xpr7%2BP0AchRV0s3wMEhMFqm7DWfd4e7e%2Fv3TLu%2FHzlmcpDbO2wuAAAABmJLR0QA%2FwD%2FAP%2BgvaeTAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAB3RJTUUH5AgTFAgpoplZTAAAAoRJREFUOMtlkjtoFFEUhr9zZ3Yms5vNw0jWiBvEQkkQY62VCFZio4VIBK0UBOsVRCOKKDZ2q2IjglooFipCYiGGBHysD1xNoesrJgrrJoE89jH3zrUQdZL85c%2F5Dz%2FnfEJM%2FbmeDuA%2B0A2ICGSyAYmEwnEVjut8Uo7sOrlvdOpvxomFFXAM2Au0AGlRkl6ZCdJ%2BkEg7rkqLkjVAbdvu7PDjO%2BMWQMUK9AFH4p4AoiReUgFHgY1xg%2F5cbxNwBmhnqewyZwVw%2BtSNLT6A9Od6BNgPXAUS8UkR6OpOkvAdHFehHPlzGGgAB4BbrkAncMIuCf9VFFl0aNChQURQSlCu8lwlA1Z45LZqSfbOOCumfcuXlMGIoBKtWFMDW8eNwMVDlI%2FoWVxt2VCO6KjS8SpD4Gqx33wtd7e%2F8w6GvpUoGZDJnWbuVYG5ezdpfmtp27mHVG8fyYsDOPNVvAXss63crsOEunRhzBQ7dL7SGVWDWSFV0QR1Q7ObpHlaaJ%2BwtNqAtnlNy3iDVBl%2BrGP%2BeReXjx8pGAUw5do371frQe1Z0JqwXAZrEcC3lsBaVLkMxhCmoLCeh2WP4r83Xjs%2FFn5Im%2Fz3rKkDNCYnwRgUkHEcvChCTUyAwMdN1Itt5M8eLoSLQKoq%2B%2BR1l37aSFrCUglrzB9QRBBjUKUS1XYYWcfIgsPoIpAArp8bq31vivIf1%2BpQl0qY6en%2FPFQqyOdPFDcTfk2SP3eoUF%2B2AEALD1526rF5%2FYva0NA%2F3xkcZDaYYbibYig8XMp2XHNTCXvl%2FVptal6Dn9mI8Y1QbdW82Iz55XEJWFhE61Ly%2BnM9K5siGWzRrJrxoSsbkAmh4jFZU%2Bw4f6gwFZ%2F%2FDaBc%2F0JWXPF7AAAAAElFTkSuQmCC)
![Licence](https://img.shields.io/github/license/iquetzalcoatl/qtzl-lib)
![forks](https://img.shields.io/github/forks/iquetzalcoatl/qtzl-lib)
![forks](https://img.shields.io/github/stars/iquetzalcoatl/qtzl-lib)

<img src="https://raw.githubusercontent.com/iquetzalcoatl/qtzl-lib/bekermeye/core/img/logo.png" alt="Bulma: a Flexbox CSS framework" style="max-width:100%;" width="600">

### What is qtzl-lib?

We know, in this times we really want to be fullstack developers, but sometimes we need deploy an web application in php and... oh no we need a frontend for show a quickly code. so you start to learn some CSS framework and oh no, we need to learn patterns of design and a lot of things.

Yeah, We know it's diffcult to get exactly correctly desing for our application.

Qtzl-lib was developed to get an easy frontend and wich its better in oriented object programming.
Let's save time to desing and keep coding.👨‍💻

### Quick install
<ol>
<li> Download the current files from github by cloning.</li>

<li> put in web folder like "/var/www/html/yourproject"</li>

<li> include this into yourfile.php</li>


```php
<?php
require_once 'main.inc.php';
include_once QTZL_ENGINE;
?>
```
> And yes, That's all

### OS Compatibily

Qtlz-lib was desinged to be compatible with all host operating systems

### PHP Version

Qtlz-lib was coded to be compatible from php version 5.6 to 7.4

### Usage

To start any qtzl-lib usage we need start the engine.

```php
<?php
require_once 'main.inc.php';
include_once QTZL_ENGINE;

// Engine Start
$engine = new engine();
$engine->load();
$engine->render();

//Navbar Start
$navbar = new navbar();
$navbar->addmenu('Menu','submenu','#');
$navbar->manualnavbar();
$navbar->render();
?>
```

### About us

the logo is supposed to be quetzalcoatl head but need some time to finish this.
Javier alias javee
Enrique alias rodriili
>SIC PARVIS MAGNA

