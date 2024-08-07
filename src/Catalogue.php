<?php

namespace App;

class Catalogue
{
    private array $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function getProduct(string $code): ?Product
    {
        return $this->products[$code] ?? null;
    }
}
