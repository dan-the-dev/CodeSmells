<?php

namespace TicTacToe;

use Exception;

class Game
{
    /** @var string */
    private $_lastSymbol = ' ';
    
    /** @var Board */
    private $_board;

    public function __construct()
    {
        $this->_board = new Board();
    }

    /**
     * @throws Exception
     */
    /** @SMELL - Primitive Obsession - should use classes instead of primitives */
    public function play(string $symbol, int $x, int $y): void
    {
        //if first move
        if ($this->_lastSymbol == ' ') {
            //if player is X
            if ($symbol == 'O') {
                throw new Exception("Invalid first player");
            }
        }
        //if not first move but player repeated
        else if ($symbol == $this->_lastSymbol) {
            throw new Exception("Invalid next player");
        }
        //if not first move but play on an already played tile
        /** @SMELL - Message Chain - Board should expose a method symbolAt(Tile $tile) */
        else if ($this->_board->tileAt($x, $y)->symbol != ' ') {
            throw new Exception("Invalid position");
        }

        // update game state
        $this->_lastSymbol = $symbol;
        $this->_board->addTileAt($x, $y, new Symbol($symbol));
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
