<?php

namespace App\Offers;

interface OfferInterface
{
    public function applies(array $basket): bool;
    public function apply(array $basket): array;
}
