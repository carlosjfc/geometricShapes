<?php
use Carlosjfc\GeometricShapes\Parallelogram;

class ParallelogramTest extends PHPUnit_Framework_TestCase
{

    public function testExpectParallelogramIsValid()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $this->assertAttributeEquals(5.23, 'length', $parallelogram);
        $this->assertAttributeEquals(6.7845, 'width', $parallelogram);
        $this->assertAttributeEquals(27.8, 'angle', $parallelogram);
        $this->assertEquals(16.548766844049, $parallelogram->area());
        $this->assertEquals(24.029, $parallelogram->perimeter());
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400102
     */
    public function testParallelogramIsNotValidByLenght()
    {
        new Parallelogram(0, 6.7845, 27.8);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400102
     */
    public function testParallelogramIsNotValidByWidth()
    {
        new Parallelogram(5.23, -10, 27.8);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400101
     */
    public function testParallelogramIsNotValidByAngle()
    {
        new Parallelogram(5.23, 6.7845, 180);
    }

    public function testCanScaleParallelogramUp()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $initialPerimeter = $parallelogram->perimeter();
        $this->assertEquals(24.029, $initialPerimeter);
        $factor = 3.4;
        $parallelogram->scale($factor);
        $this->assertAttributeEquals(17.782, 'length', $parallelogram);
        $this->assertAttributeEquals(23.0673, 'width', $parallelogram);
        $this->assertAttributeEquals(27.8, 'angle', $parallelogram);
        $this->assertEquals($factor * $initialPerimeter, $parallelogram->perimeter());
    }

    public function testCanScaleParallelogramDown()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $initialPerimeter = $parallelogram->perimeter();
        $this->assertEquals(24.029, $initialPerimeter);
        $factor = 0.25;
        $parallelogram->scale($factor);
        $this->assertAttributeEquals(1.3075, 'length', $parallelogram);
        $this->assertAttributeEquals(1.696125, 'width', $parallelogram);
        $this->assertAttributeEquals(27.8, 'angle', $parallelogram);
        $this->assertEquals($factor * $initialPerimeter, $parallelogram->perimeter());
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400102
     */
    public function testParallelogramNotValidLength()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $parallelogram->setLength(-0.23);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400102
     */
    public function testParallelogramNotValidWidth()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $parallelogram->setLength(-2.45);
    }

    /**
     * @expectedException Carlosjfc\GeometricShapes\InvalidShapeException
     * @expectedExceptionCode 400101
     */
    public function testParallelogramNotValidAngle()
    {
        $parallelogram = new Parallelogram(5.23, 6.7845, 27.8);
        $parallelogram->setAngle(270);
    }
}
