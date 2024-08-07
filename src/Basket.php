<?php

namespace App;

use App\Offers\OfferInterface;

class Basket
{
    private array $products;
    private array $catalogue;
    private array $deliveryRules;
    private array $offers;

    public function __construct(array $catalogue, array $deliveryRules, array $offers)
    {
        $this->products = [];
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
    }

    public function add(string $productCode)
    {
        if (isset($this->catalogue[$productCode])) {
            $this->products[] = $this->catalogue[$productCode];
        }
    }

    public function total(): float
    {
        $total = 0.0;
        foreach ($this->products as $product) {
            $total += $product->getPrice();
        }

        foreach ($this->offers as $offer) {
            if ($offer->applies($this->products)) {
                $this->products = $offer->apply($this->products);
            }
        }

        foreach ($this->deliveryRules as $rule) {
            if ($rule->applies($total)) {
                $total += $rule->getCost();
                break;
            }
        }

        return $total;
    }
}
