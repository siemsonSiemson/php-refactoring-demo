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
use Refactoring\Products\Price;

class PriceTest
{
    private $value;

    /**
     * @test
     */
    private function setUp():void
    {
        $this->value = new BigDecimal();
    }

    /**
     * @test
     */
    private function testTypeOfValue():void
    {
        $this->assertInstanceOf('BigDecimal', $this->value);
    }

    /**
     * @test
     */
    private function testSign():void
    {
        //given
        $price = new Price(BigDecimal::ten());
        //then
        $this->assertEquals(intval(1), $price->getSign());

        //given
        $price = new Price(BigDecimal::of('-788892.667'));
        //then
        $this->assertEquals(intval(-1), $price->getSign());

        //given
        $price = new Price(BigDecimal::zero());
        //then
        $this->assertEquals(intval(-1), $price->getSign());
    }
}