<?php
use Carlosjfc\GeometricShapes\EquilateralTriangle;

class EquilateralTriangleTest extends PHPUnit_Framework_TestCase
{
    public function testExpectBuildEquilateralTriangle()
    {
        $equilateralTriangle = new EquilateralTriangle(5);
        $this->assertAttributeEquals(5, 'sideAB', $equilateralTriangle);
        $this->assertAttributeEquals(5, 'sideBC', $equilateralTriangle);
        $this->assertAttributeEquals(5, 'sideCA', $equilateralTriangle);
        $this->assertEquals(10.825317547305483, $equilateralTriangle->area());
        $this->assertEquals(15, $equilateralTriangle->perimeter());
    }
}
