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
                $tile = new Tile(new Coordinates($i, $j), new Symbol(' '));
                $this->plays[] = $tile;
            }
        }
    }

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
    public function addTileAt(string $symbol, int $x, int $y): void
    {
        $newTile = new Tile(new Coordinates($x, $y), new Symbol($symbol));
        $this->tileAt($x, $y)->putSymbol(new Symbol($symbol));
    }
}
