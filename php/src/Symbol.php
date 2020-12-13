<?php

namespace TicTacToe;

class Symbol
{
    const EMPTY_VALUE = ' ';

    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equalsTo(Symbol $anotherSymbol): bool
    {
        return $this->value() == $anotherSymbol->value();
    }

    public static function empty(): Symbol
    {
        return new Symbol(self::EMPTY_VALUE);
    }
}
