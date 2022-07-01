<?php

namespace MichaelaKarkosova\Calculator;

use InvalidArgumentException;

final class Fraction implements FractionInterface {
	private int $numerator;

	private int $denominator;

	public function __construct(int $numerator, int $denominator) {
		if ($denominator === 0) {
			throw new InvalidArgumentException("Dividing by zero!");
		}
		$this->reduce($numerator, $denominator);
	}

	public function getResult() : string {
		return $this->getNumerator() . "/" . $this->getDenominator();
	}

	public function toMixedFraction(): MixedFraction {
		$diff = (int) ($this->numerator < 0 ? ceil($this->numerator / $this->denominator) : floor($this->numerator / $this->denominator));
		$numerator = $diff === 0 ? $this->numerator : abs($this->numerator);
		$numerator %= $this->denominator;
		return new MixedFraction($diff, $numerator, $this->denominator);
	}

	public function toSimpleFraction(): Fraction {
		return new self($this->numerator, $this->denominator);
	}

	public function getNumerator(): int {
		return $this->numerator;
	}

	public function getDenominator(): int {
		return $this->denominator;
	}

	protected function reduce(int $numerator, int $denominator) : void {
		$gdc = gmp_gcd($numerator, $denominator);
		$numerator /= gmp_intval($gdc);
		$denominator /= gmp_intval($gdc);
		$this->numerator = $numerator;
		$this->denominator = $denominator;
	}
}
