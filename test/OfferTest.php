<?php

use PHPUnit\Framework\TestCase;
use App\Offers\BuyOneGetOneHalfPrice;
use App\Product;

class OfferTest extends TestCase
{
    public function testOfferApplies()
    {
        $offer = new BuyOneGetOneHalfPrice('R01');

        $basket = [
            new Product('R01', 32.95),
            new Product('R01', 32.95),
        ];

        $this->assertTrue($offer->applies($basket));

        $basket = [
            new Product('R01', 32.95),
        ];

        $this->assertFalse($offer->applies($basket));
    }

    public function testOfferApply()
    {
        $offer = new BuyOneGetOneHalfPrice('R01');

        $basket = [
            new Product('R01', 32.95),
            new Product('R01', 32.95),
        ];

        $basket = $offer->apply($basket);

        $this->assertEquals(32.95, $basket[0]->getPrice());
        $this->assertEquals(16.475, $basket[1]->getPrice());
    }
}
