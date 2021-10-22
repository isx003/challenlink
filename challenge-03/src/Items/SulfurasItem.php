<?php
namespace App\Items;

use App\Items\Item;
use App\Traits\ItemTrait;

class SulfurasItem
{
    const DESCRIPTION = "Sulfuras";
    const MAX_QUALITY = 80;

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
        if( $this->quality != self::MAX_QUALITY ){
            $this->validateMaxQuality();
        }
    }

    public function getQuality(){
        return $this->quality;
    }
}