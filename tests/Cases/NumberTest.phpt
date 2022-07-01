<?php

namespace MichaelaKarkosova\Calculator\Tests\Cases;

use Tester\Assert;
use Tester\TestCase;
use MichaelaKarkosova\Calculator\Number;

require __DIR__ . "/../bootstrap.php";

final class NumberTest extends TestCase {
	public function testIntegerNumberToFractionConversion(): void {
		$number = new Number(10);
		$fraction = $number->toSimpleFraction();

		Assert::same(10, $fraction->getNumerator());
		Assert::same(1, $fraction->getDenominator());
		Assert::same("10/1", $fraction->getResult());

		$number = new Number(256);
		$fraction = $number->toSimpleFraction();

		Assert::same(256, $fraction->getNumerator());
		Assert::same(1, $fraction->getDenominator());
		Assert::same("256/1", $fraction->getResult());
	}

	public function testFloatNumberToFractionConversion(): void {
		$number = new Number(0.652);
		$fraction = $number->toSimpleFraction();

		Assert::same(163, $fraction->getNumerator());
		Assert::same(250, $fraction->getDenominator());
		Assert::same("163/250", $fraction->getResult());

		$number = new Number(36.03300);
		$fraction = $number->toSimpleFraction();

		Assert::same(36033, $fraction->getNumerator());
		Assert::same(1000, $fraction->getDenominator());
		Assert::same("36033/1000", $fraction->getResult());
	}
}

(new NumberTest())->run();
