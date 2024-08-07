<?php

namespace App;

class DeliveryRule
{
    private float $threshold;
    private float $cost;

    public function __construct(float $threshold, float $cost)
    {
        $this->threshold = $threshold;
        $this->cost = $cost;
    }

    public function applies(float $total): bool
    {
        return $total < $this->threshold;
    }

    public function getCost(): float
    {
        return $this->cost;
    }
}
