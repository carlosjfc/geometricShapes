<?php
use Carlosjfc\GeometricShapes\Triangle;

class TriangleTest extends PHPUnit_Framework_TestCase
{
    public function testExpectTriangleIsValid()
    {
        $triangle = new Triangle(5, 9, 6);
        $this->assertAttributeEquals(5, 'sideAB', $triangle);
        $this->assertAttributeEquals(9, 'sideBC', $triangle);
        $this->assertAttributeEquals(6, 'sideCA', $triangle);
        $this->assertEquals(14.142135623730951, $triangle->area());
        $this->assertEquals(20, $triangle->perimeter());
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300101
     */
    public function testTriangleIsNotValid()
    {
        new Triangle(5.23, 6.7845, 27.8);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleIsNotValidBySideAB()
    {
        new Triangle(0, 6.7845, 27.8);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleIsNotValidBySideBC()
    {
        new Triangle(5.23, -10, 27.8);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleIsNotValidBySideCA()
    {
        new Triangle(5.23, 6.7845, -1);
    }

    public function testCanScaleTriangleUp()
    {
        $triangle = new Triangle(5, 9, 6);
        $initialPerimeter = $triangle->perimeter();
        $this->assertEquals(20, $initialPerimeter);
        $factor = 3.4;
        $triangle->scale($factor);
        $this->assertAttributeEquals(5 * $factor, 'sideAB', $triangle);
        $this->assertAttributeEquals(9 * $factor, 'sideBC', $triangle);
        $this->assertAttributeEquals(6 * $factor, 'sideCA', $triangle);
        $this->assertEquals($factor * $initialPerimeter, $triangle->perimeter());
    }

    public function testCanScaleTriangleDown()
    {
        $triangle = new Triangle(5, 9, 6);
        $initialPerimeter = $triangle->perimeter();
        $this->assertEquals(20, $initialPerimeter);
        $factor = 0.25;
        $triangle->scale($factor);
        $this->assertAttributeEquals(5 * $factor, 'sideAB', $triangle);
        $this->assertAttributeEquals(9 * $factor, 'sideBC', $triangle);
        $this->assertAttributeEquals(6 * $factor, 'sideCA', $triangle);
        $this->assertEquals($factor * $initialPerimeter, $triangle->perimeter());
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleNotValidSideAB()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideAB(-0.23);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleNotValidSideBC()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideBC(-2.45);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300102
     */
    public function testTriangleNotValidSideCA()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideCA(0);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300101
     */
    public function testTriangleNotValidBySideAB()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideAB(270);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300101
     */
    public function testTriangleNotValidBySideBC()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideBC(270);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 300101
     */
    public function testTriangleNotValidBySideCA()
    {
        $triangle = new Triangle(5, 9, 6);
        $triangle->setSideCA(270);
    }
}
