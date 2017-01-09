<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class Circle
 * @package Carlosjfc\GeometricShapes
 * @link https://en.wikipedia.org/wiki/Circle
 */
class Circle implements Shape
{
    /**
     * @var float $radius the distance between any of the circle's points and the centre
     */
    private $radius;

    /**
     * Circle constructor.
     * @param float $radius
     * @throws InvalidShapeException
     */
    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidShapeException(
                __CLASS__,
                "The value of $radius is not a valid circle's radius",
                InvalidShapeException::CIRCLE_RADIUS_EXCEPTION_CODE
            );
        }
        $this->radius = $radius;
    }

    /**
     * Compute the area of the circle
     * @return float
     * @link https://en.wikipedia.org/wiki/Circle#Area_enclosed
     */
    final public function area(): float
    {
        return M_PI * pow($this->radius, 2);
    }

    /**
     * Compute the perimeter of the circle
     * @return float
     */
    final public function perimeter(): float
    {
        return 2 * M_PI * $this->radius;
    }

    final public function scale(float $factor): bool
    {
        if ($factor <= 0) {
            return false;
        }
        $this->radius = $this->radius * $factor;
        return true;
    }

    final public function isClosed(): bool
    {
        return true;
    }

    final public function __toString(): string
    {
        return strtoupper(__CLASS__) . " width radius: $this->radius";
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * @param float $radius
     * @return Circle
     */
    public function setRadius(float $radius): Circle
    {
        $this->radius = $radius;
        return $this;
    }
}
