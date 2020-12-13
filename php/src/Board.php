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
    public function tileAt(int $x, int $y): Tile
    {
        foreach ($this->plays as $t) {
            if ($t->coordinatesEqualsTo(new Coordinates($x, $y))){
                return $t;
            }
        }
        return null;
    }

        /** @SMELL - Primitive Obsession - Should use objects */
    public function addTileAt(int $x, int $y, Symbol $symbols = null): void
    {
        $newTile = new Tile(new Coordinates($x, $y), $symbols);
        $this->tileAt($x, $y)->putSymbol($symbols);
    }

    public function tileAtCoordinatesIsNotEmpty(Coordinates $c): bool
    {
        return $this->tileAt($c->x(), $c->y())->symbol()->isNotEmpty();
    }
}
