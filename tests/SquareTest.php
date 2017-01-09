<?php
use Carlosjfc\GeometricShapes\Square;

class SquareTest extends PHPUnit_Framework_TestCase
{
    public function testExpectBuildSquare()
    {
        $square = new Square(5.23);
        $this->assertAttributeEquals(5.23, 'length', $square);
        $this->assertAttributeEquals(5.23, 'width', $square);
        $this->assertAttributeEquals(90, 'angle', $square);
        $this->assertEquals(27.3529, $square->area());
        $this->assertEquals(20.92, $square->perimeter());
    }
}
