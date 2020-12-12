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
                $tile = new Tile();
                $tile->x = $i;
                $tile->y = $j;
                $tile->symbol = ' ';
                $this->plays[] = $tile;
            }
        }
    }

    public function tileAt(Coordinates $coordinates): Tile
    {
        foreach ($this->plays as $t) {
            if ($t->x == $coordinates->x() && $t->y == $coordinates->y()){
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

        $this->tileAt($coordinates)->symbol = $symbol;
    }
}
