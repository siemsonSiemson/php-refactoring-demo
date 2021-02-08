<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 07/02/2021
 * Time: 21:05
 */

namespace Refactoring\Products;

class Price
{
    /**
     * @var
     */
    private $value;

    /**
     * Price constructor.
     * @param BigDecimal|null $value
     */
    public function __construct(BigDecimal $value = null){
        $this->value = $value;
    }

    /**
     * @return BigDecimal
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getSign()
    {
        return gmp_sign($this->value);
    }
}