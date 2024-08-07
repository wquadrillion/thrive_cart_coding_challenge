<?php

use PHPUnit\Framework\TestCase;
use App\{Basket, Product, DeliveryRule, Catalogue};
use App\Offers\BuyOneGetOneHalfPrice;

class BasketTest extends TestCase
{
    private $basket;

    protected function setUp(): void
    {
        $catalogue = [
            'R01' => new Product('R01', 32.95),
            'G01' => new Product('G01', 24.95),
            'B01' => new Product('B01', 7.95),
        ];

        $deliveryRules = [
            new DeliveryRule(50, 4.95),
            new DeliveryRule(90, 2.95),
        ];

        $offers = [
            new BuyOneGetOneHalfPrice('R01'),
        ];

        $this->basket = new Basket($catalogue, $deliveryRules, $offers);
    }

    public function testBasketTotal()
    {
        $this->basket->add('B01');
        $this->basket->add('G01');
        $this->assertEquals(37.85, $this->basket->total());

        $this->basket->add('R01');
        $this->basket->add('R01');
        $this->assertEquals(54.37, $this->basket->total());

        $this->basket->add('R01');
        $this->basket->add('G01');
        $this->assertEquals(60.85, $this->basket->total());

        $this->basket->add('B01');
        $this->basket->add('B01');
        $this->basket->add('R01');
        $this->basket->add('R01');
        $this->basket->add('R01');
        $this->assertEquals(98.27, $this->basket->total());
    }
}