<?php

namespace MichaelaKarkosova\Calculator\Tests\Cases;

use Tester\Assert;
use Tester\TestCase;
use MichaelaKarkosova\Calculator\Number;
use MichaelaKarkosova\Calculator\Fraction;
use MichaelaKarkosova\Calculator\MixedFraction;

require __DIR__ . "/../bootstrap.php";

final class MixedFractionTest extends TestCase {
	private MixedFraction $mixedFraction1;

	private MixedFraction $mixedFraction2;

	private MixedFraction $mixedFraction3;

	private Fraction $fraction1;

	private Fraction $fraction2;

	private Fraction $fraction3;

	protected function setUp(): void {
		parent::setUp();

		$this->mixedFraction1 = new MixedFraction(5, 3, 16); // 83/16
		$this->mixedFraction2 = new MixedFraction(-4, 5, 12); // -53/12
		$this->mixedFraction3 = new MixedFraction(0, 1, 3); // 1/3

		$this->fraction1 = $this->mixedFraction1->toSimpleFraction();
		$this->fraction2 = $this->mixedFraction2->toSimpleFraction();
		$this->fraction3 = $this->mixedFraction3->toSimpleFraction();
	}

	public function testFractionGetNumerator(): void {
		Assert::same(3, $this->mixedFraction1->getNumerator());
		Assert::same(5, $this->mixedFraction2->getNumerator());
		Assert::same(1, $this->mixedFraction3->getNumerator());

		Assert::same(83, $this->fraction1->getNumerator());
		Assert::same(-53, $this->fraction2->getNumerator());
		Assert::same(1, $this->fraction3->getNumerator());
	}

	public function testFractionGetDenominator(): void {
		Assert::same(16, $this->mixedFraction1->getDenominator());
		Assert::same(12, $this->mixedFraction2->getDenominator());
		Assert::same(3, $this->mixedFraction3->getDenominator());

		Assert::same(16, $this->fraction1->getDenominator());
		Assert::same(12, $this->fraction2->getDenominator());
		Assert::same(3, $this->fraction3->getDenominator());
	}

	public function testFractionGetResult(): void {
		Assert::same("5 3/16", $this->mixedFraction1->getResult());
		Assert::same("-4 5/12", $this->mixedFraction2->getResult());
		Assert::same("1/3", $this->mixedFraction3->getResult());

		Assert::same("83/16", $this->fraction1->getResult());
		Assert::same("-53/12", $this->fraction2->getResult());
		Assert::same("1/3", $this->fraction3->getResult());
	}

	public function testMixedFractionGetWholeNumber(): void {
		Assert::same(5, $this->mixedFraction1->getWholeNumber());
		Assert::same(-4, $this->mixedFraction2->getWholeNumber());
		Assert::same(0, $this->mixedFraction3->getWholeNumber());
	}
}

(new MixedFractionTest())->run();
