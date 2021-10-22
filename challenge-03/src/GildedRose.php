<?php

namespace App;

use App\Items\Item;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        $item = Item::get(
            $this->name,
            $this->quality,
            $this->sellIn
        );
        $item->endDay();
        $this->quality = $item->getQuality();
        $this->sellIn = $item->getSellIn();
    }
}
