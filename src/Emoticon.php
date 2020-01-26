<?php

namespace MarufMax\Emoticon;

class Emoticon
{
    private $list;

    public function __construct()
    {
        $this->list = require 'IconList.php';
    }

    /**
     * Get a single emoji.
     *
     * @param string $name
     *
     * @return bool|mixed
     */
    public function get(string $name)
    {
        $itemName = $this->stripColons($name);
        if (array_key_exists($itemName, $this->list)) {
            return $this->list[$itemName];
        }

        return false;
    }

    /**
     * Replace all :emoji: with the actual emoji.
     *
     * @param string $text
     *
     * @return string
     */
    public function emojify(string $text): string
    {
        return preg_replace_callback('/:([a-zA-Z0-9_\-\+]+):/', function ($match) {
            return $this->get($match[1]);
        }, $text);
    }

    /**
     * Returns array of items with matching emoji.
     *
     * @param string $emoji
     *
     * @return array
     */
    public function search(string $emoji): array
    {
        return array_filter($this->list, function ($item) use ($emoji) {
            return strpos($item, $emoji) !== false;
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Generate a random emoji.
     */
    public function random()
    {
        return $this->list[array_rand($this->list)];
    }

    protected function stripColons(string $item): string
    {
        $colonPosition = strpos($item, ':');

        if ($colonPosition > -1) {
            return str_replace(':', '', $item);
        }

        return $item;
    }
}
