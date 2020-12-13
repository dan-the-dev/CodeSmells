<?php

namespace TicTacToe;

use TicTacToe\Coordinates;
use TicTacToe\Symbol;

/** @SMELL - Shotgun Surgery, inappropriate intimacy - This class expose public attributes instead of behaviours */
class Tile
{
    /** @var int */
    public $x;

    /** @var int */
    public $y;

    /** @var string */
    public $symbol;

    /** @var Coordinates */
    private $coordinates;

    /** @var Symbol */
    private $symbols;

    public function __construct(Coordinates $coordinates = null, Symbol $symbol = null)
    {
        $this->x = $coordinates->x();
        $this->y = $coordinates->y();
        $this->symbol = $symbol->value();
        $this->coordinates = $coordinates;
        $this->symbols = $symbol;
    }
}
