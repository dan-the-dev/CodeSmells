<?php

namespace TicTacToe\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TicTacToe\Game;
use TicTacToe\Symbol;
use TicTacToe\Coordinates;

class GameTest extends TestCase
{
    /** @var Game */
    private $game;

    protected function setUp(): void
    {
        $this->game = new Game();
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerOToPlayFirst(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 0));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerXToPlayTwiceInARow(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));

        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 0));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerToPlayInLastPlayedPosition(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
        
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 0));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerToPlayInAnyPlayedPosition(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 0));

        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInTopRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 2));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInTopRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 2));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 2));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInMiddleRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 2));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInMiddleRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(1, 2));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInBottomRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(0, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(2, 2));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInBottomRow(): void
    {
        $this->game->play(Symbol::XSymbol(), new Coordinates(0, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(2, 0));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 0));
        $this->game->play(Symbol::OSymbol(), new Coordinates(2, 1));
        $this->game->play(Symbol::XSymbol(), new Coordinates(1, 1));
        $this->game->play(Symbol::OSymbol(), new Coordinates(2, 2));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }
}
