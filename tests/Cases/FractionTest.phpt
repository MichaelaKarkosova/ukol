<?php

namespace MichaelaKarkosova\Calculator\Tests\Cases;

use Tester\Assert;
use Tester\TestCase;
use MichaelaKarkosova\Calculator\Number;
use MichaelaKarkosova\Calculator\Fraction;
use MichaelaKarkosova\Calculator\MixedFraction;

require __DIR__ . "/../bootstrap.php";

final class FractionTest extends TestCase {
	private Fraction $fraction1;

	private Fraction $fraction2;

	private Fraction $fraction3;

	private Fraction $fraction4;

	private MixedFraction $mixedFraction1;

	private MixedFraction $mixedFraction2;

	private MixedFraction $mixedFraction3;

	private MixedFraction $mixedFraction4;

	protected function setUp(): void {
		parent::setUp();

		$this->fraction1 = new Fraction(2, 8);
		$this->fraction2 = new Fraction(-8, 32);
		$this->fraction3 = new Fraction(145, 4565);
		$this->fraction4 = new Fraction(23, 16);

		$this->mixedFraction1 = $this->fraction1->toMixedFraction();
		$this->mixedFraction2 = $this->fraction2->toMixedFraction();
		$this->mixedFraction3 = $this->fraction3->toMixedFraction();
		$this->mixedFraction4 = $this->fraction4->toMixedFraction();
	}

	public function testFractionGetNumerator(): void {
		Assert::same(1, $this->fraction1->getNumerator());
		Assert::same(-1, $this->fraction2->getNumerator());
		Assert::same(29, $this->fraction3->getNumerator());
		Assert::same(23, $this->fraction4->getNumerator());

		Assert::same(1, $this->mixedFraction1->getNumerator());
		Assert::same(-1, $this->mixedFraction2->getNumerator());
		Assert::same(29, $this->mixedFraction3->getNumerator());
		Assert::same(7, $this->mixedFraction4->getNumerator());
	}

	public function testFractionGetDenominator(): void {
		Assert::same(4, $this->fraction1->getDenominator());
		Assert::same(4, $this->fraction2->getDenominator());
		Assert::same(913, $this->fraction3->getDenominator());
		Assert::same(16, $this->fraction4->getDenominator());

		Assert::same(4, $this->mixedFraction1->getDenominator());
		Assert::same(4, $this->mixedFraction2->getDenominator());
		Assert::same(913, $this->mixedFraction3->getDenominator());
		Assert::same(16, $this->mixedFraction4->getDenominator());
	}

	public function testFractionGetResult(): void {
		Assert::same("1/4", $this->fraction1->getResult());
		Assert::same("-1/4", $this->fraction2->getResult());
		Assert::same("29/913", $this->fraction3->getResult());
		Assert::same("23/16", $this->fraction4->getResult());

		Assert::same("1/4", $this->mixedFraction1->getResult());
		Assert::same("-1/4", $this->mixedFraction2->getResult());
		Assert::same("29/913", $this->mixedFraction3->getResult());
		Assert::same("1 7/16", $this->mixedFraction4->getResult());
	}

	public function testMixedFractionGetWholeNumber(): void {
		Assert::same(0, $this->mixedFraction1->getWholeNumber());
		Assert::same(0, $this->mixedFraction2->getWholeNumber());
		Assert::same(0, $this->mixedFraction3->getWholeNumber());
		Assert::same(1, $this->mixedFraction4->getWholeNumber());
	}
}

(new FractionTest())->run();
