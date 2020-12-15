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
    public function play(Symbol $symbol, Coordinates $coordinates): void
    {
        if ($this->_lastSymbol->isEmpty()) {
            $this->checkIsValidFirstPlayer($symbol);
        }
        $this->checkIsDiffefentPlayerFromLastPlay($symbol);
        $this->checkCoordinatesAreNotEmpty($coordinates);
        $this->_board->addTileAt($coordinates, $symbol);
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

    private function checkIsValidFirstPlayer(Symbol $symbol): void
    {
        if ($symbol->notEqualsTo($this->_firstPlayer)) {
            throw new Exception("Invalid first player");
        }
    }

    private function checkIsDiffefentPlayerFromLastPlay(Symbol $symbol): void
    {
        if ($this->_lastSymbol->equalsTo($symbol)) {
            throw new Exception("Invalid next player");
        }
    }

    private function checkCoordinatesAreNotEmpty(Coordinates $coordinates): void
    {
        if ($this->_board->tileAtCoordinatesIsNotEmpty($coordinates)) {
            throw new Exception("Invalid position");
        }
    }

}
