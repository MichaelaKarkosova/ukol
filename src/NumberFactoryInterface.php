<?php

namespace MichaelaKarkosova\Calculator;

interface NumberFactoryInterface {
    public function create($number): NumberInterface;
}
