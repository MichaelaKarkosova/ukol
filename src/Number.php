<?php

namespace MichaelaKarkosova\Calculator;

class Number implements NumberInterface {
	private int $numerator;

	private int $precision;

	public function __construct($number) {
		$stringNumber = (string) (float) $number;
		$decimal = strpos($stringNumber, '.') !== false ? explode(".", $stringNumber)[1] : "";
		$decimalLength = strlen($decimal);
		$this->precision = $decimal !== 0 ? 10 ** $decimalLength : 1;
		$this->numerator = (int) (string) ($number * $this->precision);
	}

	public function toSimpleFraction(): Fraction {
		return new Fraction($this->numerator, $this->precision);
	}
}
