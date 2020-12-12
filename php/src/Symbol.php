<?php

namespace TicTacToe;

class Symbol {
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Symbol $anotherSymbol): bool
    {
        return $this->value === $anotherSymbol->value;
    }
}