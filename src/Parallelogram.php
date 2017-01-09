<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class Parallelogram
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Parallelogram
 */
class Parallelogram implements Shape
{
    /**
     * @var float $angle the top left corner angle, between 0-180 degrees exclusive
     */
    protected $angle;
    /**
     * @var float $length the side length of the parallelogram
     */
    protected $length;
    /**
     * @var float $width the base length of the parallelogram
     */
    protected $width;

    /**
     * Parallelogram constructor.
     * @param float $length the side length of the parallelogram
     * @param float $width the base length of the parallelogram
     * @param float $angle the top left corner angle, between 0-180 degrees exclusive
     * @throws InvalidShapeException
     */
    public function __construct(float $length, float $width, float $angle)
    {
        if ($length <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $length is not a valid length for a parallelogram's side",
                InvalidShapeException::PARALLELOGRAM_SIDE_EXCEPTION_CODE
            );
        }
        if ($width <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $width is not a valid length for a parallelogram's base",
                InvalidShapeException::PARALLELOGRAM_SIDE_EXCEPTION_CODE
            );
        }
        $this->length = $length;
        $this->width = $width;
        $this->angle = $angle;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::PARALLELOGRAM_CLOSED_EXCEPTION_CODE
            );
        }
    }

    /**
     * Compute the area of the Parallelogram
     * @link https://en.wikipedia.org/wiki/Parallelogram#Area_formula
     * @return float
     */
    public function area(): float
    {
        return $this->length * $this->width * sin(deg2rad($this->angle));
    }

    /**
     * Compute the perimeter of the Parallelogram
     * @link http://www.mathopenref.com/parallelogramperimeter.html
     * @return float
     */
    public function perimeter(): float
    {
        return 2 * ($this->length + $this->width);
    }

    final public function scale(float $factor): bool
    {
        if ($factor <= 0) {
            return false;
        }
        $this->length = $this->length * $factor;
        $this->width = $this->width * $factor;
        return true;
    }

    /**
     * Verifies that with the given properties we can make a Parallelogram
     * @return bool
     */
    public function isClosed(): bool
    {
        if ($this->angle === 0 || $this->angle >= 180) {
            return false;
        }
        return true;
    }


    public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width top left angle: $this->angle," .
            "side length: $this->length and base length: $this->width";
    }

    /**
     * @return float
     */
    final public function getAngle(): float
    {
        return $this->angle;
    }

    /**
     * @param float $angle
     * @return Parallelogram
     * @throws InvalidShapeException
     */
    public function setAngle(float $angle): Parallelogram
    {
        $this->angle = $angle;
        if (!$this->isClosed()) {
            throw new InvalidShapeException(
                __CLASS__,
                $this->__toString(),
                InvalidShapeException::PARALLELOGRAM_CLOSED_EXCEPTION_CODE
            );
        }
        return $this;
    }

    /**
     * @return float
     */
    final public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @return Parallelogram
     * @throws InvalidShapeException
     */
    final public function setLength(float $length): Parallelogram
    {
        if ($length <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $length is not a valid length for a parallelogram's side",
                InvalidShapeException::PARALLELOGRAM_SIDE_EXCEPTION_CODE
            );
        }
        $this->length = $length;
        return $this;
    }

    /**
     * @return float
     */
    final public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return Parallelogram
     * @throws InvalidShapeException
     */
    final public function setWidth(float $width): Parallelogram
    {
        if ($width <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $width is not a valid length for a parallelogram's base",
                InvalidShapeException::PARALLELOGRAM_SIDE_EXCEPTION_CODE
            );
        }
        $this->width = $width;
        return $this;
    }
}
