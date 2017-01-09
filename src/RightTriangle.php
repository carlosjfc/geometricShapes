<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class RightTriangle
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Right_triangle
 */
class RightTriangle extends Triangle
{
    /**
     * RightTriangle constructor.
     * @param float $legA length of the side adjacent to angle B and opposed to angle A
     * @param float $legB length of the side adjacent to angle A and opposed to angle B
     * @throws InvalidShapeException
     */
    public function __construct(float $legA, float $legB)
    {
        if ($legA <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $legA is not a valid length for a right triangle's leg A",
                InvalidShapeException::RIGHT_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        if ($legB <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $legB is not a valid length for a right triangle's leg B",
                InvalidShapeException::RIGHT_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        parent::__construct($legA, $legB, $this->calculateHypotenuse($legA, $legB));
    }

    /**
     * Compute the right triangle hypotenuse because the length of the legs are known
     * @param float $legA length of the side adjacent to angle B and opposed to angle A
     * @param float $legB length of the side adjacent to angle A and opposed to angle B
     * @return float
     * @link https://en.wikipedia.org/wiki/Pythagorean_theorem
     */
    final private function calculateHypotenuse(float $legA, float $legB): float
    {
        return sqrt(pow($legA, 2) + pow($legB, 2));
    }

    /**
     * Compute the area of a right triangle
     * @return float
     * @link https://en.wikipedia.org/wiki/Right_triangle#Area
     */
    final public function area(): float
    {
        return ($this->sideAB * $this->sideBC) / 2;
    }

    final public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width leg A length: $this->sideAB," .
            "leg B length: $this->sideBC and hypotenuse length: " . $this->hypotenuse();
    }

    /**
     * @param float $legA
     * @return RightTriangle
     * @throws InvalidShapeException
     */
    final public function setLegA(float $legA): RightTriangle
    {
        if ($legA <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $legA is not a valid length for a right triangle's leg A",
                InvalidShapeException::RIGHT_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideAB = $legA;
        $this->sideCA = $this->calculateHypotenuse($legA, $this->sideBC);
        return $this;
    }

    /**
     * @param float $legB
     * @return RightTriangle
     * @throws InvalidShapeException
     */
    final public function setLegB(float $legB): RightTriangle
    {
        if ($legB <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $legB is not a valid length for a right triangle's leg B",
                InvalidShapeException::RIGHT_TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideBC = $legB;
        $this->sideCA = $this->calculateHypotenuse($this->sideAB, $legB);
        return $this;
    }

    /**
     * @return float the right triangle hypotenuse length
     */
    final public function hypotenuse(): float
    {
        return $this->sideCA;
    }
}
