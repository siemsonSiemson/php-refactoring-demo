<?php

namespace Tests\Refactoring\Products;

use Brick\Math\BigDecimal;
use PHPUnit\Framework\TestCase;
use Refactoring\Products\Counter;
use Refactoring\Products\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     */
    public function canIncrementCounterIfPriceIsPositive(): void
    {
        //given
        $p = $this->productWithPriceAndCounter(BigDecimal::ten(), Counter(BigDecimal::ten()));

        //when
        $p->incrementCounter();

        //then
        $this->assertEquals(11, $p->getCounter());
    }

    /**
     * @test
     */
    public function canChangeCharInDescription(): void
    {
        //given
        $p = $this->productWithDesc("short", "long");

        //when
        $p->replaceCharFromDesc('s', 'z');

        //expect
        $this->assertEquals("zhort *** long", $p->formatDesc());
    }

    /**
     * @test
     */
    public function cannotChangePriceIfCounterIsNotPositive(): void
    {
        //given
        $p = $this->productWithPriceAndCounter(BigDecimal::zero(), Counter(BigDecimal::zero()));

        //when
        $p->changePriceTo(BigDecimal::ten());

        //then
        $this->assertEquals(BigDecimal::zero(), $p->getPrice());
    }

    /**
     * @param BigDecimal $price
     * @param int $counter
     * @return Product
     */
    private function productWithPriceAndCounter(BigDecimal $price, Counter $counter): Product
    {
        return new Product($price, "desc", "longDesc", $counter);
    }

    /**
     * @test
     */
    public function canFormatDescription(): void
    {
        //expect
        $this->assertEquals("short *** long", $this->productWithDesc("short", "long")->formatDesc());
        $this->assertEquals("", $this->productWithDesc("short", "")->formatDesc());
        $this->assertEquals("", $this->productWithDesc("", "long2")->formatDesc());
    }

    /**
     * @param string $desc
     * @param string $longDesc
     * @return Product
     */
    private function productWithDesc(string $desc, string $longDesc):Product
    {
        return new Product(BigDecimal::ten(),  $desc, $longDesc, Counter(intval(10)));
    }

    /**
     * @test
     */
    private function testDesc()
    {
        $p = $this->productWithDesc("This is test", "This is long test");
        $this->assertEquals("This is test", $p->getDesc());
    }

    /**
     * @test
     */
    private function testLongDesc()
    {
        $p = $this->productWithDesc("This is test", "This is long test");
        $this->assertEquals("This is test", $p->getLongDesc());
    }

    /**
     * @test
     */
    private function testCounter()
    {
        $p = $this->productWithDesc("This is test", "This is long test");
        $this->$this->assertInstanceOf('Refactoring\Products\Counter', $p->getCounter());
    }

    /**
     * @test
     */
    private function testPrice()
    {
        $p = $this->productWithDesc("This is test", "This is long test");
        $this->$this->assertInstanceOf('BigDecimal', $p->getPrice());
    }
}