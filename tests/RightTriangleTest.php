<?php
use Carlosjfc\GeometricShapes\RightTriangle;

class RightTriangleTest extends PHPUnit_Framework_TestCase
{
    public function testExpectBuildRightTriangle()
    {
        $rightTriangle = new RightTriangle(5.23, 6.7845);
        $this->assertAttributeEquals(5.23, 'sideAB', $rightTriangle);
        $this->assertAttributeEquals(6.7845, 'sideBC', $rightTriangle);
        $this->assertAttributeEquals(8.5663492953533016, 'sideCA', $rightTriangle);
        $this->assertAttributeEquals($rightTriangle->hypotenuse(), 'sideCA', $rightTriangle);
        $this->assertEquals(17.7414675, $rightTriangle->area());
        $this->assertEquals(20.580849295353303, $rightTriangle->perimeter());
    }
}
