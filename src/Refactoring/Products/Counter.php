<?php
/**
 * Created by PhpStorm.
 * User: adam
 * Date: 07/02/2021
 * Time: 21:51
 */

namespace Refactoring\Products;

class Counter
{
    private $state;

    /**
     * Counter constructor.
     * @param int|null $state
     */
    public function __construct(int $state = null)
    {
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->state;
    }

    /**
     * @param $amount
     */
    public function setValue($amount)
    {
        $this->state = $amount;
    }

    /**
     * @throws \Exception
     */
    public function decrement()
    {
        $value = $this->getValue();
        if (is_null($value)) {
            throw new \Exception("null counter");
        }

        if ($value < 0) {
            throw new \Exception("Negative counter");
        } else {
            $this->state -= 1;
        }
    }

    /**
     * @throws \Exception
     */
    public function increment()
    {
        $value = $this->getValue();
        if (is_null($value)) {
            throw new \Exception("null counter");
        }

        if (++$value < 0) {
            throw new \Exception("Negative counter");
        } else {
            $this->state += 1;
        }
    }
}