<?php

namespace TicTacToe;

use TicTacToe\Plays;

class Board
{
    /** @var Plays */
    private $plays;

    public function __construct()
    {
        $this->plays = new Plays();

        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $tile = new Tile(new Coordinates($i, $j), Symbol::empty());
                $this->plays->addTile($tile);
            }
        }
    }

    public function tileAt(Coordinates $coordinates): Tile
    {
        return $this->plays->tileAt($coordinates);
    }

    public function addTileAt(Coordinates $coordinates, Symbol $symbols): void
    {
        $newTile = new Tile($coordinates, $symbols);
        $this->tileAt($coordinates)->putSymbol($symbols);
    }

    public function tileAtCoordinatesIsNotEmpty(Coordinates $coordinates): bool
    {
        return $this->tileAt($coordinates)->symbol()->isNotEmpty();
    }

}
