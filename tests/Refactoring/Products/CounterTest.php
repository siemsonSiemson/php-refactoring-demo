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
use Refactoring\Products\Counter;

class CounterTest
{
    private $state;

    /**
     * @test
     */
    private function setUp():void
    {
        $this->state = new BigDecimal();
    }

    /**
     * @test
     */
    private function typeOfStateTest():void
    {
        $this->assertInstanceOf('int', $this->state);
    }

    /**
     * @test
     */
    private function checkDecrementTest():void
    {
        $this->asserNull($this->value);

        $this->asserTrue($this->value + 1 < 0);
    }

    /**
     * @param int $value
     * @return Counter
     */
    private function getCounter(int $value): Counter
    {
        return new Counter($value);
    }

    /**
     * @test
     */
    private function canDecrementIfNotPositive():void
    {
        //given
        $counter = $this->getCounter(intval(-1));

        //when
        $counter->decrement();

        //then
        $this->assertEquals(-1, $counter->getValue());
    }

    /**
     * @test
     */
    private function canIncrementWhenPositive():void
    {
        //given
        $counter = $this->getCounter(intval(1));

        //when
        $counter->increment();

        //then
        $this->assertEquals(2, $counter->getValue());
    }

    /**
     * @test
     */
    private function canIncrementWhenMinusOne():void
    {
        //given
        $counter = $this->getCounter(intval(-1));

        //when
        $counter->increment();

        //then
        $this->assertEquals(0, $counter->getValue());
    }

    /**
     * @test
     */
    private function canIncrementWhenNotPositive():void
    {
        //given
        $counter = $this->getCounter(intval(-3));

        //when
        $counter->increment();

        //then
        $this->assertEquals(-3, $counter->getValue());
    }
}