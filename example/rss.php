<?php
require_once "../vendor/autoload.php";

use ToukaCode\RssReader;

$url = "https://rss.app/feeds/SNiuVTXdiaiOcChu.xml";
$rss = RssReader::load($url);
var_dump($rss);

$url = "https://rss.app/feeds/YaRA7Wase9ki5Rfm.xml";
$rss = RssReader::load($url);
var_dump($rss);
