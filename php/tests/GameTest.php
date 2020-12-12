<?php

namespace TicTacToe\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use TicTacToe\Game;
use TicTacToe\Coordinates;
use TicTacToe\Symbol;

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

        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerXToPlayTwiceInARow(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(1, 0), new Symbol('X'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerToPlayInLastPlayedPosition(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function NotAllowPlayerToPlayInAnyPlayedPosition(): void
    {
        $this->expectException(Exception::class);

        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInTopRow(): void
    {
        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(1, 0), new Symbol('O'));
        $this->game->play(new Coordinates(0, 1), new Symbol('X'));
        $this->game->play(new Coordinates(1, 1), new Symbol('O'));
        $this->game->play(new Coordinates(0, 2), new Symbol('X'));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInTopRow(): void
    {
        $this->game->play(new Coordinates(2, 2), new Symbol('X'));
        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
        $this->game->play(new Coordinates(1, 0), new Symbol('X'));
        $this->game->play(new Coordinates(0, 1), new Symbol('O'));
        $this->game->play(new Coordinates(1, 1), new Symbol('X'));
        $this->game->play(new Coordinates(0, 2), new Symbol('O'));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInMiddleRow(): void
    {
        $this->game->play(new Coordinates(1, 0), new Symbol('X'));
        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
        $this->game->play(new Coordinates(1, 1), new Symbol('X'));
        $this->game->play(new Coordinates(0, 1), new Symbol('O'));
        $this->game->play(new Coordinates(1, 2), new Symbol('X'));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInMiddleRow(): void
    {
        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(1, 0), new Symbol('O'));
        $this->game->play(new Coordinates(2, 0), new Symbol('X'));
        $this->game->play(new Coordinates(1, 1), new Symbol('O'));
        $this->game->play(new Coordinates(2, 1), new Symbol('X'));
        $this->game->play(new Coordinates(1, 2), new Symbol('O'));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerXAsAWinnerIfThreeInBottomRow(): void
    {
        $this->game->play(new Coordinates(2, 0), new Symbol('X'));
        $this->game->play(new Coordinates(0, 0), new Symbol('O'));
        $this->game->play(new Coordinates(2, 1), new Symbol('X'));
        $this->game->play(new Coordinates(0, 1), new Symbol('O'));
        $this->game->play(new Coordinates(2, 2), new Symbol('X'));

        $winner = $this->game->winner();

        $this->assertEquals('X', $winner);
    }

    /**
     * @test
     * @throws Exception
     */
    public function DeclarePlayerOAsAWinnerIfThreeInBottomRow(): void
    {
        $this->game->play(new Coordinates(0, 0), new Symbol('X'));
        $this->game->play(new Coordinates(2, 0), new Symbol('O'));
        $this->game->play(new Coordinates(1, 0), new Symbol('X'));
        $this->game->play(new Coordinates(2, 1), new Symbol('O'));
        $this->game->play(new Coordinates(1, 1), new Symbol('X'));
        $this->game->play(new Coordinates(2, 2), new Symbol('O'));

        $winner = $this->game->winner();

        $this->assertEquals('O', $winner);
    }
}
