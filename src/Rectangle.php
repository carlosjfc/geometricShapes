<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class Rectangle
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Rectangle
 */
class Rectangle extends Parallelogram
{
    /**
     * Rectangle constructor.
     * @param float $length the side length of the rectangle
     * @param float $width the base length of the rectangle
     * @throws InvalidShapeException
     */
    public function __construct(float $length, float $width)
    {
        if ($length <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $length is not a valid length for a rectangle's side",
                InvalidShapeException::RECTANGLE_SIDE_EXCEPTION_CODE
            );
        }
        if ($width <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $width is not a valid length for a rectangle's base",
                InvalidShapeException::RECTANGLE_SIDE_EXCEPTION_CODE
            );
        }
        parent::__construct($length, $width, Shape::RIGHT_ANGLE);
    }

    /**
     * Compute the area of the rectangle
     * @return float
     */
    public function area(): float
    {
        return $this->length * $this->width;
    }

    final public function isClosed(): bool
    {
        return true; // we are forcing the angle to be 90 degrees
    }

    public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width side length: $this->length and base length $this->width";
    }

    /**
     * We should overwrite the setAngle function because if someone use
     * the parent setAngle on the Rectangle object, then the Rectangle will transform on a Parallelogram
     * we don't want that. So this one is more like to keep the Shape as a Rectangle
     * @param float $angle
     * @return Parallelogram
     */
    final public function setAngle(float $angle): Parallelogram
    {
        return parent::setAngle(Shape::RIGHT_ANGLE);
    }
}
