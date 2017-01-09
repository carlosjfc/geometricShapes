<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class Square
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Square
 */
class Square extends Rectangle
{
    /**
     * Square constructor.
     * @param float $side the side of the square
     * @throws InvalidShapeException
     */
    public function __construct(float $side)
    {
        if ($side <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $side is not a valid length for a square's side",
                InvalidShapeException::SQUARE_SIDE_EXCEPTION_CODE
            );
        }
        parent::__construct($side, $side);
    }

    /**
     * Compute the area of the square
     * @return float
     */
    final public function area(): float
    {
        return (float)pow($this->length, 2);
    }

    /**
     * Compute the area of the square
     * @return float
     */
    final public function perimeter(): float
    {
        return 4 * $this->length;
    }

    final public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width side length: $this->length";
    }

    /**
     * @return float
     */
    final public function getSide(): float
    {
        return $this->length;
    }

    final public function setSide(float $side): Square
    {
        if ($side <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $side is not a valid length for a square's side",
                InvalidShapeException::SQUARE_SIDE_EXCEPTION_CODE
            );
        }
        $this->length = $side;
        $this->width = $side;
        return $this;
    }
}
