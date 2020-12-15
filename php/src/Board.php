<?php

namespace TicTacToe;

class Board
{
    /** @var Tile[] */
    private $plays;

    public function __construct()
    {
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $tile = new Tile(new Coordinates($i, $j), Symbol::empty());
                $this->plays[] = $tile;
            }
        }
    }

        /** @SMELL - Primitive Obsession - Should use objects */
    public function tileAt(Coordinates $coordinates): Tile
    {
        foreach ($this->plays as $t) {
            if ($t->coordinatesEqualsTo($coordinates)){
                return $t;
            }
        }
        return null;
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
