<?php

namespace MichaelaKarkosova\Calculator;

final class Operation implements OperationInterface {
	public function add(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface {
		$fraction = $fraction->toSimpleFraction();
		$fraction2 = $fraction2->toSimpleFraction();
		$numerator = ($fraction->getNumerator() * $fraction2->getDenominator()) + ($fraction2->getNumerator() * $fraction->getDenominator());
		$denominator = $fraction->getDenominator() * $fraction2->getDenominator();
		return new Fraction($numerator, $denominator);
	}

	public function subtract(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface {
		$fraction = $fraction->toSimpleFraction();
		$fraction2 = $fraction2->toSimpleFraction();
		$numerator = ($fraction->getNumerator() * $fraction2->getDenominator()) - ($fraction2->getNumerator() * $fraction->getDenominator());
		$denominator = $fraction->getDenominator() * $fraction2->getDenominator();
		return new Fraction($numerator, $denominator);
	}

	public function multiply(NumberInterface $fraction, NumberInterface $fraction2) :  FractionInterface {
		$fraction = $fraction->toSimpleFraction();
		$fraction2 = $fraction2->toSimpleFraction();
		$fractionNumeratorResult = $fraction->getNumerator() * $fraction2->getNumerator();
		$fractionDenominatorResult = $fraction->getDenominator() *  $fraction2->getDenominator();
		return new Fraction($fractionNumeratorResult,  $fractionDenominatorResult);
	}

	public function divide(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface {
		$fraction = $fraction->toSimpleFraction();
		$fraction2 = $fraction2->toSimpleFraction();
		$numerator = $fraction->getNumerator() * $fraction2->getDenominator();
		$denominator = $fraction->getDenominator() * $fraction2->getNumerator();
		if ($denominator < 0) {
			$numerator *= -1;
		}
		return new Fraction($numerator, abs($denominator));
	}
}
