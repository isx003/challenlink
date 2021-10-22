<?php
namespace App\Items;

use App\Items\Item;
use App\Traits\ItemTrait;
use App\Interfaces\ItemInterface;

class AgeBriedItem
{
    const DESCRIPTION = "Aged Brie";

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
        $this->quality += ( $this->sellIn > 0 ) ? 1 : 2;
    }
}