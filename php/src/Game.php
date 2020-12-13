<?php

namespace TicTacToe;

use Exception;

class Game
{
    /** @var Symbol */
    private $_lastSymbol = null;
    
    /** @var Board */
    private $_board;

    public function __construct()
    {
        $this->_board = new Board();
        $this->_lastSymbol = Symbol::empty();
    }

    /**
     * @throws Exception
     */
    /** @SMELL - Primitive Obsession - should use classes instead of primitives */
    public function play(string $symbol, int $x, int $y): void
    {
        if ($this->_lastSymbol->isEmpty()) {
            if ((new Symbol($symbol))->equalsTo(new Symbol('O'))) {
                throw new Exception("Invalid first player");
            }
        }
        else if ($this->_lastSymbol->equalsTo(new Symbol($symbol))) {
            throw new Exception("Invalid next player");
        }
        else if ($this->_board->tileAtCoordinatesIsNotEmpty(new Coordinates($x, $y))) {
            throw new Exception("Invalid position");
        }

        $this->_board->addTileAt($x, $y, new Symbol($symbol));
        $this->_lastSymbol = new Symbol($symbol);
    }

    public function winner(): string
    {
        /** @SMELL - Message Chain - Board should expose a method symbolAt(Tile $tile) */
        //if the positions in first row are taken
        if ($this->_board->tileAt(0, 0)->symbol != ' ' &&
            $this->_board->tileAt(0, 1)->symbol != ' ' &&
            $this->_board->tileAt(0, 2)->symbol != ' ') {
            //if first row is full with same symbol
            if ($this->_board->tileAt(0, 0)->symbol ==
                $this->_board->tileAt(0, 1)->symbol &&
                $this->_board->tileAt(0, 2)->symbol == $this->_board->tileAt(0, 1)->symbol) {
                return $this->_board->tileAt(0, 0)->symbol;
            }
        }

        /** @SMELL - Message Chain - Board should expose a method symbolAt(Tile $tile) */
        //if the positions in first row are taken
        if ($this->_board->tileAt(1, 0)->symbol != ' ' &&
            $this->_board->tileAt(1, 1)->symbol != ' ' &&
            $this->_board->tileAt(1, 2)->symbol != ' ') {
            //if middle row is full with same symbol
            if ($this->_board->tileAt(1, 0)->symbol ==
                $this->_board->tileAt(1, 1)->symbol &&
                $this->_board->tileAt(1, 2)->symbol ==
                $this->_board->tileAt(1, 1)->symbol) {
                return $this->_board->tileAt(1, 0)->symbol;
            }
        }

        /** @SMELL - Message Chain - Board should expose a method symbolAtIsEquals(Tile $tile, Symbol $s) */
        //if the positions in first row are taken
        if ($this->_board->tileAt(2, 0)->symbol != ' ' &&
            $this->_board->tileAt(2, 1)->symbol != ' ' &&
            $this->_board->tileAt(2, 2)->symbol != ' ') {
            //if middle row is full with same symbol
            if ($this->_board->tileAt(2, 0)->symbol ==
                $this->_board->tileAt(2, 1)->symbol &&
                $this->_board->tileAt(2, 2)->symbol ==
                $this->_board->tileAt(2, 1)->symbol) {
                return $this->_board->tileAt(2, 0)->symbol;
            }
        }

        return ' ';
    }
}
