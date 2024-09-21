[![Latest Stable Version](https://img.shields.io/packagist/v/nguyenanhung/template-frontend-package.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/template-frontend-package)
[![Total Downloads](https://img.shields.io/packagist/dt/nguyenanhung/template-frontend-package.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/template-frontend-package)
[![Daily Downloads](https://img.shields.io/packagist/dd/nguyenanhung/template-frontend-package.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/template-frontend-package)
[![Monthly Downloads](https://img.shields.io/packagist/dm/nguyenanhung/template-frontend-package.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/template-frontend-package)
[![License](https://img.shields.io/packagist/l/nguyenanhung/template-frontend-package.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/template-frontend-package)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/nguyenanhung/template-frontend-package/php)](https://packagist.org/packages/nguyenanhung/template-frontend-package)

# Template start Frontend Module Package

Template for repository Frontend Module - Basic, Simple and Lightweight

## Use this Template

First, you can `Use this template` for new project: [Use this template](https://github.com/nguyenanhung/template-frontend-package/generate)

Second, clone your project to your to path in your machine

Finally, your edit file `composer.json` in root folder of project

```json
{
    "type": "library",
    "name": "nguyenanhung/template-frontend-package",
    "description": "Structure Repository Template for Frontend Module Service Package",
    "keywords": [
        "frontend",
        "helper",
        "library",
        "php"
    ],
    "homepage": "https://github.com/nguyenanhung/template-frontend-package",
    "license": "MIT",
    "minimum-stability": "stable",
    "authors": [
        {
            "name": "Nguyen An Hung",
            "email": "dev@nguyenanhung.com",
            "homepage": "https://nguyenanhung.com",
            "role": "Developer"
        }
    ],
    "require": {
        "php": ">=7.1.3",
        "ext-curl": "*",
        "ext-json": "*",
        "ext-mbstring": "*",
        "symfony/polyfill": "^1.26",
        "nguyenanhung/my-debug": "^3.0 || ^2.0",
        "nguyenanhung/my-cache": "^3.0 || ^2.0",
        "nguyenanhung/database": "^3.0 || ^2.0",
        "nguyenanhung/security": "^3.0 || ^2.0",
        "nguyenanhung/requests": "^3.0 || ^2.0",
        "nguyenanhung/monitor": "^3.0 || ^2.0",
        "nguyenanhung/image": "^3.0 || ^2.0",
        "nguyenanhung/helpers": "^3.0 || ^2.0",
        "nguyenanhung/seo": "^3.0 || ^2.0",
        "nguyenanhung/web-builder-helper": "^1.0",
        "nguyenanhung/web-builder-templates": "^1.0"
    },
    "require-dev": {
        "tramtro/make-some-noise": "^1.0"
    },
    "autoload": {
        "psr-4": {
            "nguyenanhung\\Frontend\\Your_Project\\": "src/"
        },
        "files": [
            "helpers/helpers.php"
        ]
    }
}
```

Replace name space `Your_Project` to Project Backend space, example: `Google`. After change namespace, project namespace same `"nguyenanhung\\Frontend\\Google\\": "src/"`

Finished, your can writing new awesome helper and library now time.

## Contact & Support

If any question & request, please contact following information

| Name        | Email                | Skype            | Facebook      |
|-------------|----------------------|------------------|---------------|
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Vietnam with Love <3
