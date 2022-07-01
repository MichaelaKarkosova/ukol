<?php

namespace MichaelaKarkosova\Calculator\Tests\Cases;

use MichaelaKarkosova\Calculator\Math;
use MichaelaKarkosova\Calculator\NumberFactory;
use MichaelaKarkosova\Calculator\Operation;
use Tester\Assert;
use Tester\TestCase;

require __DIR__ . "/../bootstrap.php";

final class MathTest extends TestCase {
    private Math $math;
	
	private array $fractions = [];

    protected function setUp(): void {
        parent::setUp();

        $this->math = new Math(new Operation(), new NumberFactory());
		$this->fractions = [
			["5/10", "5 10/20"],
			["15/2", "10 6/2"],
			["-50/-30", "-20/-5"],
			["-4 20/4", "10 6/2"],
			["-15/2", "6 12/2"],
			[5, "-6 12/2"],
			["-15/2", -50],
			[5, -50],
			[-15, -45],
			[-59, -95],
		];
    }

    public function testOperationAdd() : void {
		$results = [
			"6/1",
			"41/2",
			"17/3",
			"4/1",
			"9/2",
			"-7/1",
			"-115/2",
			"-45/1",
			"-60/1",
			"-154/1",
		];
	    foreach ($this->fractions as $index => [$fraction1, $fraction2]) {
		    Assert::same($results[$index], $this->math->add($fraction1, $fraction2)->getResult());
		}
    }

    public function testOperationSubtract() : void {
	    $results = [
		    "-5/1",
		    "-11/2",
		    "-7/3",
		    "-22/1",
		    "-39/2",
		    "17/1",
		    "85/2",
		    "55/1",
		    "30/1",
		    "36/1",
	    ];
	    foreach ($this->fractions as $index => [$fraction1, $fraction2]) {
		    Assert::same($results[$index], $this->math->subtract($fraction1, $fraction2)->getResult());
	    }
    }

    public function testOperationMultiply() : void {
	    $results = [
		    "11/4",
		    "195/2",
		    "20/3",
		    "-117/1",
		    "-90/1",
		    "-60/1",
		    "375/1",
		    "-250/1",
		    "675/1",
		    "5605/1",
	    ];
	    foreach ($this->fractions as $index => [$fraction1, $fraction2]) {
		    Assert::same($results[$index], $this->math->multiply($fraction1, $fraction2)->getResult());
	    }
    }

    public function testOperationDivide() : void {
	    $results = [
		    "1/11",
		    "15/26",
		    "5/12",
		    "-9/13",
		    "-5/8",
		    "-5/12",
		    "3/20",
		    "-1/10",
		    "1/3",
		    "59/95",
	    ];
	    foreach ($this->fractions as $index => [$fraction1, $fraction2]) {
		    Assert::same($results[$index], $this->math->divide($fraction1, $fraction2)->getResult());
	    }
    }
}

(new MathTest())->run();
