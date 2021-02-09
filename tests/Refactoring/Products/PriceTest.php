<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 09/02/2021
 * Time: 21:18
 */

namespace Tests\Refactoring\Products;

use Brick\Math\BigDecimal;
use PHPUnit\Framework\TestCase;

class PriceTest
{
    private $value;

    protected function setUp():void
    {
        $this->value = new BigDecimal();
    }

    public function testTypeOfValue():void
    {
        $this->assertInstanceOf('BigDecimal', $this->value);
    }
}