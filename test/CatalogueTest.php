<?php

use PHPUnit\Framework\TestCase;
use App\Catalogue;
use App\Product;

class CatalogueTest extends TestCase
{
    public function testCatalogueProductRetrieval()
    {
        $products = [
            'R01' => new Product('R01', 32.95),
            'G01' => new Product('G01', 24.95),
            'B01' => new Product('B01', 7.95),
        ];

        $catalogue = new Catalogue($products);

        $product = $catalogue->getProduct('R01');
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('R01', $product->getCode());
        $this->assertEquals(32.95, $product->getPrice());

        $product = $catalogue->getProduct('G01');
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('G01', $product->getCode());
        $this->assertEquals(24.95, $product->getPrice());

        $product = $catalogue->getProduct('B01');
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('B01', $product->getCode());
        $this->assertEquals(7.95, $product->getPrice());

        $this->assertNull($catalogue->getProduct('X01'));
    }
}
