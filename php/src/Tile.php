<?php

namespace TicTacToe;

/** @SMELL - Shotgun Surgery, inappropriate intimacy - This class expose public attributes instead of behaviours */
class Tile
{
    /** @var int */
    public $x;

    /** @var int */
    public $y;

    /** @var string */
    public $symbol;
}
