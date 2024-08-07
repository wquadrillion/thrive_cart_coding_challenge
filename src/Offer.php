<?php

namespace App;

class Offer
{
    private string $productCode;
    private int $quantity;
    private float $discount;

    public function __construct(string $productCode, int $quantity, float $discount)
    {
        $this->productCode = $productCode;
        $this->quantity = $quantity;
        $this->discount = $discount;
    }

    public function applies(array $basket): bool
    {
        $count = 0;
        foreach ($basket as $product) {
            if ($product->getCode() === $this->productCode) {
                $count++;
            }
        }
        return $count >= $this->quantity;
    }

    public function apply(array $basket): array
    {
        $count = 0;
        foreach ($basket as $product) {
            if ($product->getCode() === $this->productCode) {
                $count++;
                if ($count % 2 == 0) {
                    $product->applyDiscount($this->discount);
                }
            }
        }
        return $basket;
    }
}
