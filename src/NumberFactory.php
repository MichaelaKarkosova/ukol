<?php

namespace MichaelaKarkosova\Calculator;

use InvalidArgumentException;

class NumberFactory implements NumberFactoryInterface {
    public function create($number) : NumberInterface {
        if (is_numeric($number)) {
            return new Number($number);
        }
		if (preg_match('/^(-?\d+)\/(-?\d+)$/', $number, $matches)) {
			return new Fraction((int) $matches[1], (int) $matches[2]);
		}
		if (preg_match('/^(-?\d+) (\d+)\/(\d+)$/', $number, $matches)) {
			return new MixedFraction((int) $matches[1], (int) $matches[2], (int) $matches[3]);
		}
		throw new InvalidArgumentException("Value \"" . $number . "\" is not valid number or fraction.");
    }
}
