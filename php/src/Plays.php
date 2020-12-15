<?php

namespace TicTacToe;

use TicTacToe\Tile;
use TicTacToe\Coordinates;

class Plays
{
    /** @var Tile[] */
    public $collection = [];

    /** @return Tile[] */
    public function tiles(): array
    {
        return $this->collection;
    }

    public function addTile(Tile $tile): bool
    {
        return array_push($this->collection, $tile);
    }

    public function tileAt(Coordinates $coordinates): ?Tile
    {
        /** @var Tile $t */
        foreach ($this->collection as $t) {
            if ($t->coordinatesEqualsTo($coordinates)){
                return $t;
            }
        }
        return null;
    }

}
