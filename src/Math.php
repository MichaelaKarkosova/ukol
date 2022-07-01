<?php

namespace MichaelaKarkosova\Calculator;

class Math {
    private OperationInterface $operation;

    private NumberFactoryInterface $numberFactory;

    public function __construct(OperationInterface $operation, NumberFactoryInterface $numberFactory) {
        $this->operation = $operation;
        $this->numberFactory = $numberFactory;
    }

    public function add($numberA, $numberB): FractionInterface {
        return $this->operation->add(
            $this->numberFactory->create($numberA),
            $this->numberFactory->create($numberB),
        );
    }

    public function subtract($numberA, $numberB): FractionInterface {
        return $this->operation->subtract(
            $this->numberFactory->create($numberA),
            $this->numberFactory->create($numberB),
        );
    }

    public function multiply($numberA, $numberB): FractionInterface {
        return $this->operation->multiply(
            $this->numberFactory->create($numberA),
            $this->numberFactory->create($numberB),
        );
    }

    public function divide($numberA, $numberB): FractionInterface {
        return $this->operation->divide(
            $this->numberFactory->create($numberA),
            $this->numberFactory->create($numberB),
        );
    }
}
