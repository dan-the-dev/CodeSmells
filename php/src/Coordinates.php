<?php

namespace TicTacToe;

class Coordinates {
    private $x;
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function y(): int
    {
        return $this->y;
    }

    public function equals(Coordinates $anotherCoordinates): bool
    {
        return $this->x === $anotherCoordinates->x && $this->y === $anotherCoordinates->y;
    }
}