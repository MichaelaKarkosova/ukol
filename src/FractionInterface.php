<?php

namespace MichaelaKarkosova\Calculator;

interface FractionInterface extends NumberInterface {
	public function getNumerator(): int;

	public function getResult() : string;

	public function getDenominator(): int;

	public function toSimpleFraction() : Fraction;

	public function toMixedFraction() : MixedFraction;
}
