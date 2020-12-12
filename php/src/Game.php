<?php

namespace TicTacToe;

use Exception;

class Game
{
    const O_PLAYER = 'O';
    const X_PLAYER = 'X';
    /** @var string */
    private $_lastSymbol = null;
    
    /** @var Board */
    private $_board;

    /** @var Symbol */
    private $_starting_symbol;

    public function __construct()
    {
        $this->_board = new Board();
        $this->_starting_symbol = new Symbol(self::O_PLAYER);
    }

    /**
     * @throws Exception
     */
    public function play(Coordinates $coordinates, Symbol $symbol = null): void
    {
        /** @todo Extract method validate */
        /** @todo Remove if/else */
        if ($this->_lastSymbol == null) {
            /** @todo Extract method checkfirstplayer */
            if ($symbol->equals($this->_starting_symbol)) {
               throw new Exception("Invalid first player");
            }
            /** end checkfirstplayer */
        } else {
            /** @todo Extract method checknextplayer */
            if ($symbol->equals($this->_lastSymbol)) {
                throw new Exception("Invalid next player");
            }
            /** end checknextplayer */
        }
        /** @todo Extract method checkposition */
        /** @todo Remove message chain (maybe validposition should be in board?) */
        if ($this->_board->tileAt($coordinates)->symbol != ' ') {
            throw new Exception("Invalid position");
        }
        /** end checkposition */
        /** end validate */

        $this->_lastSymbol = $symbol;
        /** @todo use Symbol class */
        $this->_board->addTileAt($symbol->value(), $coordinates);
    }

    public function winner(): string
    {
        if ($this->_board->tileAt(new Coordinates(0, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(0, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(0, 2))->symbol != ' ') {
            if ($this->_board->tileAt(new Coordinates(0, 0))->symbol ==
                $this->_board->tileAt(new Coordinates(0, 1))->symbol &&
                $this->_board->tileAt(new Coordinates(0, 2))->symbol == $this->_board->tileAt(new Coordinates(0, 1))->symbol) {
                return $this->_board->tileAt(new Coordinates(0, 0))->symbol;
            }
        }

        if ($this->_board->tileAt(new Coordinates(1, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(1, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(1, 2))->symbol != ' ') {
            if ($this->_board->tileAt(new Coordinates(1, 0))->symbol ==
                $this->_board->tileAt(new Coordinates(1, 1))->symbol &&
                $this->_board->tileAt(new Coordinates(1, 2))->symbol ==
                $this->_board->tileAt(new Coordinates(1, 1))->symbol) {
                return $this->_board->tileAt(new Coordinates(1, 0))->symbol;
            }
        }

        if ($this->_board->tileAt(new Coordinates(2, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(2, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(2, 2))->symbol != ' ') {
            if ($this->_board->tileAt(new Coordinates(2, 0))->symbol ==
                $this->_board->tileAt(new Coordinates(2, 1))->symbol &&
                $this->_board->tileAt(new Coordinates(2, 2))->symbol ==
                $this->_board->tileAt(new Coordinates(2, 1))->symbol) {
                return $this->_board->tileAt(new Coordinates(2, 0))->symbol;
            }
        }

        return ' ';
    }
}
