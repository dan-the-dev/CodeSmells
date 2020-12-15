<?php

namespace TicTacToe;

use Exception;

class Game
{
    /** @var Symbol */
    private $_lastSymbol = null;
    private $_firstPlayer = null;
    
    /** @var Board */
    private $_board;

    public function __construct()
    {
        $this->_board = new Board();
        $this->_lastSymbol = Symbol::empty();
        $this->_firstPlayer = Symbol::XSymbol();
    }

    /**
     * @throws Exception
     */
    /** @SMELL - Primitive Obsession - should use classes instead of primitives */
    public function play(string $symbol, int $x, int $y): void
    {
        $symbol = new Symbol($symbol);
        if ($this->_lastSymbol->isEmpty()) {
            $this->checkFirstPlayer($symbol);
        }
        $this->checkSamePlayerAsLastPlay($symbol);
        if ($this->_board->tileAtCoordinatesIsNotEmpty(new Coordinates($x, $y))) {
            throw new Exception("Invalid position");
        }

        $this->_board->addTileAt(new Coordinates($x, $y), $symbol);
        $this->_lastSymbol = $symbol;
    }

    public function winner(): string
    {
        if ($this->_board->rowTilesHasSameSymbolsNotEmpty(new Coordinates(0, 0))) {
            return $this->_board->symbolAt(new Coordinates(0, 0))->value();
        }
        if ($this->_board->rowTilesHasSameSymbolsNotEmpty(new Coordinates(1, 0))) {
            return $this->_board->symbolAt(new Coordinates(1, 0))->value();
        }
        if ($this->_board->rowTilesHasSameSymbolsNotEmpty(new Coordinates(2, 0))) {
            return $this->_board->symbolAt(new Coordinates(2, 0))->value();
        }

        return Symbol::EMPTY_VALUE;
    }

    private function checkFirstPlayer(Symbol $symbol): void
    {
        if ($symbol->notEqualsTo($this->_firstPlayer)) {
            throw new Exception("Invalid first player");
        }
    }

    private function checkSamePlayerAsLastPlay(Symbol $symbol): void
    {
        if ($this->_lastSymbol->equalsTo($symbol)) {
            throw new Exception("Invalid next player");
        }
    }

}
