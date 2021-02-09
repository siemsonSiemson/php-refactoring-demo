<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 09/02/2021
 * Time: 21:17
 */

namespace Tests\Refactoring\Products;

use Brick\Math\BigDecimal;
use PHPUnit\Framework\TestCase;

class CounterTest
{
    private $state;

    protected function setUp():void
    {
        $this->state = new BigDecimal();
    }

    public function typeOfStateTest():void
    {
        $this->assertInstanceOf('int', $this->state);
    }

    public function checkDecrementTest():void
    {
        $this->asserNull($this->value);

        $this->asserTrue($this->value + 1 < 0);
    }
}