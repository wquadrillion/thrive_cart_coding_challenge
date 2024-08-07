<?php

use PHPUnit\Framework\TestCase;
use App\Product;

class ProductTest extends TestCase
{
    public function testProductCreation()
    {
        $product = new Product('R01', 32.95);
        $this->assertEquals('R01', $product->getCode());
        $this->assertEquals(32.95, $product->getPrice());
    }

    public function testApplyDiscount()
    {
        $product = new Product('R01', 32.95);
        $product->applyDiscount(0.5);
        $this->assertEquals(16.475, $product->getPrice());
    }
}