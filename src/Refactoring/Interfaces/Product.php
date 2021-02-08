<?php

namespace Refactoring\Interfaces;

interface Product
{
    public function getSerialNumber();

    public function getPrice();

    public function getPriceValue();

    public function getDesc();

    public function getLongDesc();

    public function getCounter();

    public function getCounterValue()

    public function formatDesc();

    public function setSerialNumber();

    public function setPrice();

    public function setDesc();

    public function setLongDesc();

    public function setCounter();

    public function incrementCounter();
}