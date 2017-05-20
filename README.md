[![Codacy Badge](https://api.codacy.com/project/badge/Grade/2992ce3462d24582a4f379034981b515)](https://www.codacy.com/app/seeren/OpCacheBundle?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=seeren/OpCacheBundle&amp;utm_campaign=Badge_Grade) [![Build Status](https://travis-ci.org/seeren/OpCacheBundle.svg?branch=master)](https://travis-ci.org/seeren/OpCacheBundle) [![GitHub license](https://img.shields.io/badge/license-MIT-orange.svg)](https://raw.githubusercontent.com/seeren/view/master/LICENSE)  [![GitHub tag](https://img.shields.io/github/tag/seeren/OpCacheBundle.svg)](https://github.com/seeren/OpCacheBundle/releases)

# OpCacheBundle
Symfony3 Bundle for opcache status monitoring.

## Demo
[https://seeren.github.io/OpCacheBundle/](https://seeren.github.io/OpCacheBundle/).

![opcache](https://seeren.github.io/OpCacheBundle/opcache.jpg) ![memory](https://seeren.github.io/OpCacheBundle/memory.jpg) ![keys](https://seeren.github.io/OpCacheBundle/keys.jpg)

## Features
* Opcache reset
* Opcache status
* Opcache status history

## Installation
Clone this repository
```
git clone https://github.com/seeren/OpCacheBundle.git
```
Update AppKernel
```php
new OpCacheBundle\OpCacheBundle(),
```
Update routing.yml
```php
op_cache:
    resource: "@OpCacheBundle/Controller/"
    type:     annotation
    prefix:   /
```

## Run the tests
Run with phpunit after install dependencies
```
composer update
phpunit
```

## Authors
* **Cyril Ichti** - [www.seeren.fr](http://www.seeren.fr)