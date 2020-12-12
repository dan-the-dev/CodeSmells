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
    public function play(Coordinates $coordinates, Symbol $symbol = null): void
    {
        if ($this->_lastSymbol == ' ' && $symbol->equals(new Symbol('O'))) {
           throw new Exception("Invalid first player");
        }
        if ($symbol->equals(new Symbol($this->_lastSymbol))) {
            throw new Exception("Invalid next player");
        }
        if ($this->_board->tileAt($coordinates)->symbol != ' ') {
            throw new Exception("Invalid position");
        }

        $this->_lastSymbol = $symbol->value();
        $this->_board->addTileAt($symbol->value(), $coordinates);
    }

    public function winner(): string
    {
        //if the positions in first row are taken
        if ($this->_board->tileAt(new Coordinates(0, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(0, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(0, 2))->symbol != ' ') {
            //if first row is full with same symbol
            if ($this->_board->tileAt(new Coordinates(0, 0))->symbol ==
                $this->_board->tileAt(new Coordinates(0, 1))->symbol &&
                $this->_board->tileAt(new Coordinates(0, 2))->symbol == $this->_board->tileAt(new Coordinates(0, 1))->symbol) {
                return $this->_board->tileAt(new Coordinates(0, 0))->symbol;
            }
        }

        //if the positions in first row are taken
        if ($this->_board->tileAt(new Coordinates(1, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(1, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(1, 2))->symbol != ' ') {
            //if middle row is full with same symbol
            if ($this->_board->tileAt(new Coordinates(1, 0))->symbol ==
                $this->_board->tileAt(new Coordinates(1, 1))->symbol &&
                $this->_board->tileAt(new Coordinates(1, 2))->symbol ==
                $this->_board->tileAt(new Coordinates(1, 1))->symbol) {
                return $this->_board->tileAt(new Coordinates(1, 0))->symbol;
            }
        }

        //if the positions in first row are taken
        if ($this->_board->tileAt(new Coordinates(2, 0))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(2, 1))->symbol != ' ' &&
            $this->_board->tileAt(new Coordinates(2, 2))->symbol != ' ') {
            //if middle row is full with same symbol
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
