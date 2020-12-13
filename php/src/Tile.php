<?php

namespace TicTacToe;

use TicTacToe\Coordinates;
use TicTacToe\Symbol;

/** @SMELL - Shotgun Surgery, inappropriate intimacy - This class expose public attributes instead of behaviours */
class Tile
{
    /** @var string */
    public $symbol;

    /** @var Coordinates */
    private $coordinates;

    /** @var Symbol */
    private $symbols;

    public function __construct(Coordinates $coordinates = null, Symbol $symbol = null)
    {
        $this->symbol = $symbol->value();
        $this->coordinates = $coordinates;
        $this->symbols = $symbol;
    }

    public function coordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function symbol(): Symbol
    {
        return $this->symbols;
    }

    public function coordinatesEqualsTo(Coordinates $coordinates): bool
    {
        return $this->coordinates->equalsTo($coordinates);
    }

    public function putSymbol(Symbol $symbol): void
    {
        $this->symbol = $symbol->value();
        $this->symbols = $symbol;
    }
}
