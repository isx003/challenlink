<?php
namespace App\Items;

use App\Items\Item;
use App\Traits\ItemTrait;

class BackstageItem
{
    const DESCRIPTION = "Backstage passes to a TAFKAL80ETC concert";

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
        $this->calculateQuality();
        $this->normalCalculationSellInEndDay();
    }

    private function calculateQuality()
    {
        if($this->sellIn <= 0){
            $this->quality = 0;
        }elseif( $this->sellIn > 0 && $this->sellIn <= 5 ){
            $this->quality += 3;
        }elseif($this->sellIn > 5 && $this->sellIn <= 10){
            $this->quality += 2;
        }else{
            $this->quality++;
        }
    }
}