<?php

namespace App\Offers;

use App\Product;

class BuyOneGetOneHalfPrice implements OfferInterface
{
    private string $productCode;

    public function __construct(string $productCode)
    {
        $this->productCode = $productCode;
    }

    public function applies(array $basket): bool
    {
        $count = 0;
        foreach ($basket as $product) {
            if ($product->getCode() === $this->productCode) {
                $count++;
            }
        }
        return $count >= 2;
    }

    public function apply(array $basket): array
    {
        $count = 0;
        foreach ($basket as $product) {
            if ($product->getCode() === $this->productCode) {
                $count++;
                if ($count % 2 == 0) {
                    $product->applyDiscount(0.5);
                }
            }
        }
        return $basket;
    }
}
