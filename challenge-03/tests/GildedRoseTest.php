<?php

use App\GildedRose;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    function testUpdatesNormalItemsBeforeSellDate()
    {
        $item = GildedRose::of(NORMAL_ITEM_DESCRIPTION, 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 9);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesNormalItemsBeforeOnTheSellDate()
    {
        $item = GildedRose::of(NORMAL_ITEM_DESCRIPTION, 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesNormalItemsWithQuality0()
    {
        $item = GildedRose::of(NORMAL_ITEM_DESCRIPTION, 0, 5);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesBriedItemsBeforeSellDate()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesBriedItemsBeforeSellDateWithMaximunQuality()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 50, 5);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesBriedItemsOnTheSellDate()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesBriedItemsOnTheSellDateNearMaximunQuality()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 49, 0);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesBriedItemsAfterTheSellDate()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 10, -10);
        $item->tick();
        $this->assertEquals($item->quality, 12);
        $this->assertEquals($item->sellIn, -11);
    }

    function testUpdatesBriedItemsAfterTheSellDateWithMaximunQuality()
    {
        $item = GildedRose::of(AGE_BRIED_ITEM_DESCRIPTION, 50, -10);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, -11);
    }

    function testUpdatesSulfurasItemsBeforeTheSellDate()
    {
        $item = GildedRose::of(SULFURAS_ITEM_DESCRIPTION, 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 5);
    }

    function testUpdatesSulfurasItemsOnTheSellDate()
    {
        $item = GildedRose::of(SULFURAS_ITEM_DESCRIPTION, 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, 5);
    }

    function testUpdatesSulfurasItemsAfterTheSellDate()
    {
        $item = GildedRose::of(SULFURAS_ITEM_DESCRIPTION, 10, -1);
        $item->tick();
        $this->assertEquals($item->quality, 10);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesBackstagePassItemsLongBeforeTheSellDate()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 10, 11);
        $item->tick();
        $this->assertEquals($item->quality, 11);
        $this->assertEquals($item->sellIn, 10);
    }

    function testUpdatesBackstagePassItemsCloseToTheSellDataAtMaxQuality()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 50, 10);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 9);
    }

    function testUpdatesBackstagePassItemsVeryCloseToTheSellDate()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 10, 5);
        $item->tick();
        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesBackstagePassItemsVeryCloseToTheSellDateAtMaxQuality()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 50, 5);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 4);
    }

    function testUpdatesBackstagePassItemsWithOneDayLeftToSell()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 10, 1);
        $item->tick();
        $this->assertEquals($item->quality, 13);
        $this->assertEquals($item->sellIn, 0);
    }

    function testUpdatesBackstagePassItemsWithOneDayLeftToSellAtMaxQuality()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 50, 1);
        $item->tick();
        $this->assertEquals($item->quality, 50);
        $this->assertEquals($item->sellIn, 0);
    }

    function testUpdatesBackstagePassItemsOnToSellDate()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesBackstagePassItemsAfterTheSellDate()
    {
        $item = GildedRose::of(BACKSTAGE_DESCRIPTION, 10, -1);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -2);
    }

    function testUpdatesConjuredItemsBeforeTheSellDate()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 10, 10);
        $item->tick();
        $this->assertEquals($item->quality, 8);
        $this->assertEquals($item->sellIn, 9);
    }

    function testUpdatesConjuredItemsAtZeroQuality()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 0, 10);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, 9);
    }

    function testUpdatesConjuredItemsOnTheSellDate()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 10, 0);
        $item->tick();
        $this->assertEquals($item->quality, 6);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesConjuredItemsOnTheSellDateAt0Quality()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 0, 0);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -1);
    }

    function testUpdatesConjuredItemsAfterTheSellDate()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 10, -10);
        $item->tick();
        $this->assertEquals($item->quality, 6);
        $this->assertEquals($item->sellIn, -11);
    }

    function testUpdatesConjuredItemsAfterTheSellDateAtZeroQuality()
    {
        $item = GildedRose::of(CONJURED_ITEM_DESCRIPTION, 0, -10);
        $item->tick();
        $this->assertEquals($item->quality, 0);
        $this->assertEquals($item->sellIn, -11);
    }
}