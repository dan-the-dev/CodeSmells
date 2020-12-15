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
        $this->checkIsValidFirstPlayer($symbol);
        $this->checkIsDiffefentPlayerFromLastPlay($symbol);
        $this->checkCoordinatesAreNotEmpty($coordinates);
        $this->_board->addTileAt($coordinates, $symbol);
        $this->_lastSymbol = $symbol;
    }

    public function winner(): Symbol
    {
        $firstRowCoordinates = new Coordinates(0, 0);
        $secondRowCoordinates = new Coordinates(1, 0);
        $thirdRowCoordinates = new Coordinates(2, 0);

        return $this->winningRow($firstRowCoordinates) ??
                ($this->winningRow($secondRowCoordinates) ?? 
                    ($this->winningRow($thirdRowCoordinates) ?? 
                        Symbol::empty()
                    )
                );
    }

    private function checkIsValidFirstPlayer(Symbol $symbol): void
    {
        if ($this->isFirstPlay() && $symbol->notEqualsTo($this->_firstPlayer)) {
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

    private function isFirstPlay(): bool
    {
        return $this->_lastSymbol->isEmpty();
    }

    private function winningRow(Coordinates $rowCoordinates): ?Symbol
    {
        if ($this->_board->rowTilesHasSameSymbolsNotEmpty($rowCoordinates)) {
            return $this->_board->symbolAt($rowCoordinates);
        }
        return null;
    }

}
