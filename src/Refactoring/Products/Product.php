<?php

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Refactoring\Products\Price as Price;
use Refactoring\Products\Counter as Counter;

final class Product implements Refactoring\Interfaces\Product
{
    /**
     * @var UuidInterface
     */
    private $serialNumber;

    /**
     * @var BigDecimal
     */
    private $price;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $longDesc;

    /**
     * @var int
     */
    private $counter;

    /**
     * Product constructor.
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     */
    public function __construct(BigDecimal $price, string $desc, string $longDesc, Counter $counter)
    {
        $this->serialNumber = Uuid::uuid4();
        $this->price = new Price($price);
        $this->desc = $desc;
        $this->longDesc = $longDesc;
        $this->counter = $counter;
    }

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->serialNumber;
    }

    /**
     * @param $number
     */
    public function setSerialNumber($number)
    {
        $this->serialNumber = $number;
    }

    /**
     * @return null|\Refactoring\Products\BigDecimal
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return \Refactoring\Products\BigDecimal
     */
    public function getPriceValue()
    {
        return $this->price->getValue();
    }

    /**
     * @param $price
     */
    public function setPrice($price)
    {
        $this->price->setValue($price);
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return string
     */
    public function getLongDesc()
    {
        return $this->longDesc;
    }

    /**
     * @param string $longDesc
     */
    public function setLongDesc(string $longDesc)
    {
        $this->longDesc = $longDesc;
    }

    /**
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @return int
     */
    public function getCounterValue()
    {
       return  $this->counter->getValue();
    }

    /**
     * @throws \Exception
     */
    public function decrementCounter(): void
    {
        $price = $this->getPrice();
        if (!is_null($price->getValue()) && $price->getSign() > 0) {
             $this->getCounter()->decrement();
        } else {
            throw new \Exception("Invalid price");
        }
    }

    /**
     * @throws \Exception
     */
    public function incrementCounter(): void
    {
        $price = $this->getPrice();
        if (!is_null($price->getValue()) && $price->getSign() > 0) {
            $this->getCounter()->increment();
        } else {
            throw new \Exception("Invalid price");
        }
    }

    /**
     * @param BigDecimal|null $newPrice
     * @throws \Exception
     */
    public function changePriceTo(?BigDecimal $newPrice): void
    {
        if ($newPrice === null) {
            throw new \Exception("new price null");
        }

        $counterVal = $this->getCounterValue();
        if ($counterVal === null) {
            throw new \Exception("null counter");
        }

        if ($counterVal > 0) {
            $this->setPrice($newPrice);
        }
    }

    /**
     * @param string|null $charToReplace
     * @param string|null $replaceWith
     * @throws \Exception
     */
    public function replaceCharFromDesc(?string $charToReplace, ?string $replaceWith): void
    {
        $desc = $this->getDesc();
        $longDesc = $this->getLongDesc();

        if ($longDesc === null || $longDesc == "" || $desc === null || $desc == "") {
            throw new \Exception("null or empty desc");
        }

        $this->setDesc(str_replace($charToReplace, $replaceWith, $desc));
        $this->setLongDesc(str_replace($charToReplace, $replaceWith, $longDesc));
    }

    /**
     * @return string
     */
    public function formatDesc(): string {
        $desc = $this->getDesc();
        $longDesc = $this->getLongDesc();

        if ($longDesc === null || $longDesc == "" || $desc === null || $desc == "") {

            return "";
        }

        return sprintf("%s *** %s", $desc, $longDesc);
    }
}





















