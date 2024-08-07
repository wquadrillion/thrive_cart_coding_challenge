<?php

use PHPUnit\Framework\TestCase;
use App\DeliveryRule;

class DeliveryRuleTest extends TestCase
{
    public function testDeliveryRuleApplies()
    {
        $rule = new DeliveryRule(50, 4.95);
        $this->assertTrue($rule->applies(49.99));
        $this->assertFalse($rule->applies(50));
    }

    public function testDeliveryRuleCost()
    {
        $rule = new DeliveryRule(50, 4.95);
        $this->assertEquals(4.95, $rule->getCost());
    }
}
