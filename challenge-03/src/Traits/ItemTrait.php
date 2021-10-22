<?php
namespace App\Traits;

use App\Items\Item;

trait ItemTrait
{
    public function validateMaxQuality()
    {
        if( $this->quality > Item::MAX_QUALITY ){
            throw new \Exception("Quality must not be greater than " . Item::MAX_QUALITY);
        }
    }

    public function validateMinQuality()
    {
        if( $this->quality < 0 ){
            throw new \Exception("Quality must not be less than 0");
        }
    }

    public function getQuality()
    {
        if( $this->quality < 0 ){
            return 0;
        }elseif($this->quality > Item::MAX_QUALITY){
            return Item::MAX_QUALITY;
        }else{
            return $this->quality;
        }
    }

    public function getSellIn()
    {
        return $this->sellIn;
    }

    public function normalCalculationSellInEndDay()
    {
        $this->sellIn-=1;
    }

    public function normalCalculationQualityEndDay()
    {
        $this->quality-=( $this->sellIn > 0 ) ? 1 : 2;
    }
}