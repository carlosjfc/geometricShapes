<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Methods for working with 2-dimensional geometric shapes.
 */

interface Shape
{
    /**
     * Measurement of a right angle in degrees.
     */
    const RIGHT_ANGLE = 90;

    /**
     * Compute the area of the shape.
     * @return float the area
     */
    public function area(): float;

    /**
     * Compute the perimeter of the shape.
     * @return float the perimeter
     */
    public function perimeter(): float;

    /**
     * Proportionally resize the shape up or down
     * @param float $factor floating-point scale factor for scale
     * @return bool whether the scale operation was successful or not
     * @link https://en.wikipedia.org/wiki/Similarity_(geometry)
     * Two geometrical objects are called similar if they both have the same shape,
     * or one has the same shape as the mirror image of the other. More precisely,
     * one can be obtained from the other by uniformly scaling (enlarging or reducing).
     * If two objects are similar, each is congruent to the result of a particular
     * uniform scaling of the other.
     * @link http://www.watertown.k12.ma.us/wms/math/math_help/gradeseven/stretching/scale%20factor.htm
     */
    public function scale(float $factor): bool;

    /**
     * I created this function more for show Exceptions.
     * We want to verify that with the provided attributes we still have a close shape
     * because all of our shapes will be close shapes. For the Circle we will not have many issues,
     * but with the other shapes we could being receiving some values that doesn't form that Shape.
     * Now, for Polygons we will be following some rules:
     * In elementary geometry, a polygon /ˈpɒlɪɡɒn/ is a plane figure that
     * is bounded by a finite chain of straight line segments closing in
     * a loop to form a closed polygonal chain or circuit.
     * @link https://en.wikipedia.org/wiki/Polygon
     * Also in our context we will be working with simple polygons,
     * In geometry a simple polygon /ˈpɒlɪɡɒn/ is a flat shape consisting
     * of straight, non-intersecting line segments or "sides" that are joined
     * pair-wise to form a closed path.
     * @link https://en.wikipedia.org/wiki/Simple_polygon
     */
    public function isClosed(): bool;
}
