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

    public function addTileAt(Coordinates $coordinates, Symbol $symbols): void
    {
        $newTile = new Tile($coordinates, $symbols);
        $this->tileAt($coordinates)->putSymbol($symbols);
    }

    public function tileAtCoordinatesIsNotEmpty(Coordinates $coordinates): bool
    {
        return $this->tileAt($coordinates)->symbolIsNotEmpty();
    }

    public function rowTilesHasSameSymbolsNotEmpty(Coordinates $coordinates): bool
    {
        $firstTile = $this->tileAt(new Coordinates($coordinates->x(), 0));
        $secondTile = $this->tileAt(new Coordinates($coordinates->x(), 1));
        $thirdTile = $this->tileAt(new Coordinates($coordinates->x(), 2));

        if (
            $firstTile->symbolIsNotEmpty($secondTile) &&
            $secondTile->symbolIsNotEmpty($secondTile) &&
            $thirdTile->symbolIsNotEmpty($secondTile) &&
            $firstTile->hasSameSymbol($secondTile) &&
            $firstTile->hasSameSymbol($thirdTile)
            ) {
            return true;
        }
        return false;
    }

    public function symbolAt(Coordinates $coordinates): Symbol
    {
        return $this->plays->tileAt($coordinates)->symbol();
    }

    private function tileAt(Coordinates $coordinates): Tile
    {
        return $this->plays->tileAt($coordinates);
    }

}
