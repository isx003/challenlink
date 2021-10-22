<?php
namespace App\Items;

use App\Items\Item;
use App\Traits\ItemTrait;

class ConjuredItem
{
    const DESCRIPTION = "Conjured Mana Cake";

    use ItemTrait;

    private $quality;
    private $sellIn;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function endDay()
    {
        $this->validateMinQuality();
        $this->validateMaxQuality();
        $this->normalCalculationSellInEndDay();
        $this->calculateQuality();
    }

    private function calculateQuality()
    {
        $this->quality-=( $this->sellIn > 0 ) ? 2 : 4;
    }
}