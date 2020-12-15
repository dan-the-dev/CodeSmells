<?php

namespace TicTacToe;

class Symbol
{
    const EMPTY_VALUE = ' ';
    const X_VALUE = 'X';
    const O_VALUE = 'O';

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
        return $this->value() === $anotherSymbol->value();
    }

    public function notEqualsTo(Symbol $anotherSymbol): bool
    {
        return $this->value() !== $anotherSymbol->value();
    }

    public function isEmpty(): bool
    {
        return $this->value == self::EMPTY_VALUE;
    }

    public function isNotEmpty(): bool
    {
        return $this->value == self::X_VALUE || $this->value === self::O_VALUE;
    }

    public static function empty(): Symbol
    {
        return new Symbol(self::EMPTY_VALUE);
    }

    public static function OSymbol(): Symbol
    {
        return new Symbol(self::O_VALUE);
    }

    public static function XSymbol(): Symbol
    {
        return new Symbol(self::X_VALUE);
    }
}
