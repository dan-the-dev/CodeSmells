<?php

namespace TicTacToe;

class Board
{
    /** @var Tile[] */
    private $plays;

    public function __construct()
    {
        for ($i = 0; $i < 3; $i++) {
            /** @todo Extract method createtiles  */
            for ($j = 0; $j < 3; $j++) {
                $tile = new Tile();
                $tile->x = $i;
                $tile->y = $j;
                $tile->symbol = ' ';
                $this->plays[] = $tile;
            }
            /** end createtiles  */
        }
    }

    public function tileAt(Coordinates $coordinates): Tile
    {
        foreach ($this->plays as $t) {
            if ($coordinates->equals(new Coordinates($t->x, $t->y))) {
                return $t;
            }
        }
        return null;
    }

    public function addTileAt(string $symbol, Coordinates $coordinates): void
    {
        $newTile = new Tile();
        $newTile->x = $coordinates->x();
        $newTile->y = $coordinates->y();
        $newTile->symbol = $symbol;

        /** @todo use symbol->equals  */
        $this->tileAt($coordinates)->symbol = $symbol;
    }
}
