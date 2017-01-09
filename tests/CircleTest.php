<?php
use Carlosjfc\GeometricShapes\Circle;

class CircleTest extends PHPUnit_Framework_TestCase
{
    public function testExpectBuildSquare()
    {
        $circle = new Circle(5.23);
        $this->assertAttributeEquals(5.23, 'radius', $circle);
        $this->assertEquals(85.931669694376268, $circle->area());
        $this->assertEquals(32.861059156549238, $circle->perimeter());
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 100102
     */
    public function testCircleIsNotValidRadius()
    {
        new Circle(0);
    }

    public function testCanScaleCircleUp()
    {
        $circle = new Circle(5.23);
        $this->assertAttributeEquals(5.23, 'radius', $circle);
        $initialPerimeter = $circle->perimeter();
        $this->assertEquals(32.861059156549238, $initialPerimeter);
        $factor = 3.4;
        $circle->scale($factor);
        $this->assertAttributeEquals(5.23 * $factor, 'radius', $circle);
        $this->assertEquals($factor * $initialPerimeter, $circle->perimeter());
    }

    public function testCanScaleCircleDown()
    {
        $circle = new Circle(5.23);
        $this->assertAttributeEquals(5.23, 'radius', $circle);
        $initialPerimeter = $circle->perimeter();
        $this->assertEquals(32.861059156549238, $initialPerimeter);
        $factor = 0.25;
        $circle->scale($factor);
        $this->assertAttributeEquals(5.23 * $factor, 'radius', $circle);
        $this->assertEquals($factor * $initialPerimeter, $circle->perimeter());
    }
}
