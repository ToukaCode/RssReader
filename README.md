# RssReader
A simple rss reader

used for https://rss.app/

## Install

```
composer install
```

## Usage

```php
require_once "../vendor/autoload.php";

use ToukaCode\RssReader;

$url = "https://rss.app/feeds/SNiuVTXdiaiOcChu.xml";
$rss = RssReader::load($url);
var_dump($rss);
```
