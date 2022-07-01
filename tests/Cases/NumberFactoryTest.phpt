<?php

namespace MichaelaKarkosova\Calculator\Tests\Cases;

use Tester\Assert;
use Tester\TestCase;
use MichaelaKarkosova\Calculator\Number;
use MichaelaKarkosova\Calculator\Fraction;
use MichaelaKarkosova\Calculator\NumberFactory;
use MichaelaKarkosova\Calculator\MixedFraction;
use InvalidArgumentException;

require __DIR__ . "/../bootstrap.php";

final class NumberFactoryTest extends TestCase {
	private NumberFactory $numberFactory;

	protected function setUp(): void {
		parent::setUp();

		$this->numberFactory = new NumberFactory();
	}

	public function testInvalidNArgumentExceptionThrown(): void {
		Assert::exception(function () {
			$this->numberFactory->create("not a number");
		}, InvalidArgumentException::class, "Value \"not a number\" is not valid number or fraction.");

		Assert::exception(function () {
			$this->numberFactory->create("10 4/5n");
		}, InvalidArgumentException::class, "Value \"10 4/5n\" is not valid number or fraction.");
	}

	public function testCreateNumber(): void {
		$result1 = $this->numberFactory->create(10);
		$result2 = $this->numberFactory->create(30.033);
		$result3 = $this->numberFactory->create("40.55");

		Assert::type(Number::class, $result1);
		Assert::type(Number::class, $result2);
		Assert::type(Number::class, $result3);

		Assert::same("10/1", $result1->toSimpleFraction()->getResult());
		Assert::same("30033/1000", $result2->toSimpleFraction()->getResult());
		Assert::same("811/20", $result3->toSimpleFraction()->getResult());
	}

	public function testCreateFraction(): void {
		$result1 = $this->numberFactory->create("10/1");
		$result2 = $this->numberFactory->create("4/8");
		$result3 = $this->numberFactory->create("-24/6");

		Assert::type(Fraction::class, $result1);
		Assert::type(Fraction::class, $result2);
		Assert::type(Fraction::class, $result3);

		Assert::same("10/1", $result1->toSimpleFraction()->getResult());
		Assert::same("1/2", $result2->toSimpleFraction()->getResult());
		Assert::same("-4/1", $result3->toSimpleFraction()->getResult());
	}

	public function testCreateMixedFraction(): void {
		$result1 = $this->numberFactory->create("1 4/7");
		$result2 = $this->numberFactory->create("-8 55/6");
		$result3 = $this->numberFactory->create("3 88/21");

		Assert::type(MixedFraction::class, $result1);
		Assert::type(MixedFraction::class, $result2);
		Assert::type(MixedFraction::class, $result3);

		Assert::same("11/7", $result1->toSimpleFraction()->getResult());
		Assert::same("-103/6", $result2->toSimpleFraction()->getResult());
		Assert::same("151/21", $result3->toSimpleFraction()->getResult());
	}
}

(new NumberFactoryTest())->run();
