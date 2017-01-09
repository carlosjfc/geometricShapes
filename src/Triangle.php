<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class Triangle
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Triangle
 */
class Triangle implements Shape
{
    /**
     * @var float $sideAB length of side AB
     */
    protected $sideAB;
    /**
     * @var float $sideBC length of side BC
     */
    protected $sideBC;
    /**
     * @var float $sideCA length of side CA
     */
    protected $sideCA;

    public function __construct(float $sideAB, float $sideBC, float $sideCA)
    {
        if ($sideAB <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideAB is not a valid length for a triangle's AB side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        if ($sideBC <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideBC is not a valid length for a triangle's BC side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        if ($sideCA <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideCA is not a valid length for a triangle's CA side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideAB = $sideAB;
        $this->sideBC = $sideBC;
        $this->sideCA = $sideCA;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::TRIANGLE_CLOSED_EXCEPTION_CODE
            );
        }
    }

    /**
     * Compute the area of a triangle using the Heron's formula
     * @return float
     * @link https://en.wikipedia.org/wiki/Heron%27s_formula
     */
    public function area(): float
    {
        $semiPerimeter = $this->perimeter() / 2;
        $argument = $semiPerimeter *
            ($semiPerimeter - $this->sideAB) *
            ($semiPerimeter - $this->sideBC) *
            ($semiPerimeter - $this->sideCA);
        return sqrt($argument);
    }

    /**
     * Compute the perimeter of a triangle
     * @return float
     */
    public function perimeter(): float
    {
        return $this->sideAB + $this->sideBC + $this->sideCA;
    }

    final public function scale(float $factor): bool
    {
        if ($factor <= 0) {
            return false;
        }
        $this->sideAB = $this->sideAB * $factor;
        $this->sideBC = $this->sideBC * $factor;
        $this->sideCA = $this->sideCA * $factor;
        return true;
    }

    /**
     * Determining if three side lengths can make a triangle
     * using the Triangle Inequality Theorem
     * @return bool
     * @link https://en.wikipedia.org/wiki/Triangle_inequality
     */
    final public function isClosed(): bool
    {
        if ($this->sideAB + $this->sideBC <= $this->sideCA) {
            return false;
        }
        if ($this->sideBC + $this->sideCA <= $this->sideAB) {
            return false;
        }
        if ($this->sideAB + $this->sideCA <= $this->sideBC) {
            return false;
        }
        return true;
    }

    public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width sideAB length: $this->sideAB," .
            "sideBC length: $this->sideBC and sideCA length: $this->sideCA";
    }

    /**
     * @return float
     */
    final public function getSideAB(): float
    {
        return $this->sideAB;
    }

    /**
     * @param float $sideAB
     * @return Triangle
     * @throws InvalidShapeException
     */
    public function setSideAB(float $sideAB): Triangle
    {
        if ($sideAB <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideAB is not a valid length for a triangle's AB side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideAB = $sideAB;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::TRIANGLE_CLOSED_EXCEPTION_CODE
            );
        }
        return $this;
    }

    /**
     * @return float
     */
    public function getSideBC(): float
    {
        return $this->sideBC;
    }

    /**
     * @param float $sideBC
     * @return Triangle
     * @throws InvalidShapeException
     */
    public function setSideBC(float $sideBC): Triangle
    {
        if ($sideBC <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideBC is not a valid length for a triangle's BC side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideBC = $sideBC;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::TRIANGLE_CLOSED_EXCEPTION_CODE
            );
        }
        return $this;
    }

    /**
     * @return float
     */
    public function getSideCA(): float
    {
        return $this->sideCA;
    }

    /**
     * @param float $sideCA
     * @return Triangle
     * @throws InvalidShapeException
     */
    public function setSideCA(float $sideCA): Triangle
    {
        if ($sideCA <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $sideCA is not a valid length for a triangle's CA side",
                InvalidShapeException::TRIANGLE_SIDE_EXCEPTION_CODE
            );
        }
        $this->sideCA = $sideCA;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::TRIANGLE_CLOSED_EXCEPTION_CODE
            );
        }
        return $this;
    }
}
