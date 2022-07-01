<?php

namespace MichaelaKarkosova\Calculator;

interface OperationInterface{
	public function add(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface;

	public function multiply(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface;

	public function divide(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface;

	public function subtract(NumberInterface $fraction, NumberInterface $fraction2) : FractionInterface;
}
