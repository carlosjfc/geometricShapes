<?php
use Carlosjfc\GeometricShapes\Rectangle;

class RectangleTest extends PHPUnit_Framework_TestCase
{
    public function testExpectBuildRectangle()
    {
        $rectangle = new Rectangle(5.23, 6.7845);
        $this->assertAttributeEquals(5.23, 'length', $rectangle);
        $this->assertAttributeEquals(6.7845, 'width', $rectangle);
        $this->assertAttributeEquals(90, 'angle', $rectangle);
        $this->assertEquals(35.482935, $rectangle->area());
        $this->assertEquals(24.029, $rectangle->perimeter());
    }

    public function testSetAngleNotChangeRightAngle()
    {
        $rectangle = new Rectangle(5.23, 6.7845);
        $noneRightAngle = 46.35;
        $rectangle->setAngle($noneRightAngle);
        $this->assertAttributeEquals(90, 'angle', $rectangle);
        $this->assertAttributeNotEquals($noneRightAngle, 'angle', $rectangle);
    }
}
