<?php
declare(strict_types = 1);
namespace Carlosjfc\GeometricShapes;

/**
 * Class InvalidShapeException custom exception to define the Shapes
 * @package Carlosjfc\GeometricShapes
 */
class InvalidShapeException extends \Exception
{
    /**
     * Custom exception codes. x00y0z, where:
     * x: number of sides of the Shape
     * y: a sequential number on the subgroup
     * z: a sequential number for the error codes
     */
    const CIRCLE_CLOSED_EXCEPTION_CODE = 100101;
    const CIRCLE_RADIUS_EXCEPTION_CODE = 100102;
    const TRIANGLE_CLOSED_EXCEPTION_CODE = 300101;
    const TRIANGLE_SIDE_EXCEPTION_CODE = 300102;
    const RIGHT_TRIANGLE_CLOSED_EXCEPTION_CODE = 300201;
    const RIGHT_TRIANGLE_SIDE_EXCEPTION_CODE = 300202;
    const EQUILATERAL_TRIANGLE_CLOSED_EXCEPTION_CODE = 300301;
    const EQUILATERAL_TRIANGLE_SIDE_EXCEPTION_CODE = 300302;
    const PARALLELOGRAM_CLOSED_EXCEPTION_CODE = 400101;
    const PARALLELOGRAM_SIDE_EXCEPTION_CODE = 400102;
    const RECTANGLE_CLOSED_EXCEPTION_CODE = 400201;
    const RECTANGLE_SIDE_EXCEPTION_CODE = 400202;
    const SQUARE_CLOSED_EXCEPTION_CODE = 400301;
    const SQUARE_SIDE_EXCEPTION_CODE = 400302;

    /**
     * @var string $shape the Shape throwing the Exception
     */
    protected $shape;

    /**
     * @var string $shapeExceptionMessage the Shape throwing the Exception
     */
    protected $shapeExceptionMessage;

    public function __construct(
        string $shape,
        string $shapeExceptionMessage,
        int $code = 0,
        \Exception $previous = null
    ) {
        $this->shape = $shape;
        $this->shapeExceptionMessage = $shapeExceptionMessage . ' is invalid!';
        parent::__construct($this->shapeExceptionMessage, $code, $previous);
    }

    /**
     * Get the Shape name that couldn't be defined
     * @return string
     */
    public function getShape(): string
    {
        return $this->shape;
    }
}
