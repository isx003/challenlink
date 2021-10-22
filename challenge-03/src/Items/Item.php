<?php
namespace App\Items;

use App\Items\NormalItem;
use App\Items\AgeBriedItem;
use App\Items\ConjuredItem;
use App\Items\SulfurasItem;
use App\Items\BackstageItem;

class Item
{
    const MAX_QUALITY = 50;

    public static function get(string $name, int $quality, int $sellIn)
    {
        switch ($name) {
            case NormalItem::DESCRIPTION:
                $item = new NormalItem($quality, $sellIn);
                break;

            case AgeBriedItem::DESCRIPTION:
                $item = new AgeBriedItem($quality, $sellIn);
                break;

            case SulfurasItem::DESCRIPTION:
                $item = new SulfurasItem($quality, $sellIn);
                break;
            
            case BackstageItem::DESCRIPTION:
                $item = new BackstageItem($quality, $sellIn);
                break;

            case ConjuredItem::DESCRIPTION:
                $item = new ConjuredItem($quality, $sellIn);
                break;

            default:
                throw new Exception("Item named {$name} does not exits");
                break;
        }
        return $item;
    }
}