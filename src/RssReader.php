<?php
namespace ToukaCode;

use Exception;
use GuzzleHttp\Client;
use SimpleXMLElement;

/**
 * Simple Rss Reader
 */
class RssReader {
    /**
     * Guzzle Http Client
     *
     * @var GuzzleHttp\Client
     */
    public static $client;

    /**
     * XML
     *
     * @var SimpleXMLElement
     */
    public static $xml;

    /**
     * Rss items
     *
     * @var array
     */
    public static $items = [];

    /**
     * Load an rss url
     *
     * @param string $url
     * @return array
     */
    public static function load($url) {
        static::$client = new Client();
        static::$items = [];
        $response = static::$client->get($url);
        static::$xml = new SimpleXMLElement($response->getBody()->getContents());
        if(empty(static::$xml->channel->item)) {
            throw new Exception("RSS items not found");
        }
        foreach(static::$xml->channel->item as $item) {
            $title = (string)$item->title;
            $description = (string)$item->description;
            $link = (string)$item->link;
            $guid = (string)$item->guid;
            $pub_date = date("Y-m-d H:i:s", strtotime((string)$item->pubDate));
            static::$items[] = compact("title", "description", "link", "guid", "pub_date");
        }
        return static::$items;
    }
}