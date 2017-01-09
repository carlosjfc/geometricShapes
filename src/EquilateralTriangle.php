<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class EquilateralTriangle
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Equilateral_triangle
 */
class EquilateralTriangle extends Triangle
{
    /**
     * EquilateralTriangle constructor.
     * @param float $side the length of the equilateral triangle
     * @throws InvalidShapeException
     */
    public function __construct(float $side)
    {
        if ($side <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $side is not a valid length for an equilateral triangle's side",
                InvalidShapeException::EQUILATERAL_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        parent::__construct($side, $side, $side);
    }

    final public function area(): float
    {
        return (sqrt(3) / 4) * pow($this->sideAB, 2);
    }

    final public function perimeter(): float
    {
        return 3 * $this->sideAB;
    }

    final public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width side length: $this->sideAB";
    }

    /**
     * @param float $side
     * @return EquilateralTriangle
     * @throws InvalidShapeException
     */
    final public function setSide(float $side): EquilateralTriangle
    {
        if ($side <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $side is not a valid length for an equilateral triangle's side",
                InvalidShapeException::EQUILATERAL_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideAB = $side;
        $this->sideBC = $side;
        $this->sideBC = $side;
        return $this;
    }
}
