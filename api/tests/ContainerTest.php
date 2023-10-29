<?php

namespace GaryClarke\Framework\Tests;

use GaryClarke\Framework\Container\Container;
use GaryClarke\Framework\Container\ContainerException;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @test
     */
    public function a_service_can_be_retrieved_from_the_container()
    {
        // Setup
        $container = new Container();

        // Do something
        // this function has two args: id (string), concrete class name string | object
        $container->add('dependent-class', DependentClass::class);

        // Make assertions
        $this->assertInstanceOf(DependentClass::class, $container->get('dependent-class'));
    }

    /**
     * @test
     */
    public function a_container_exception_is_thrown_if_a_service_cannot_be_found()
    {
        // setup
        $container = new Container();

        // expect exception
        $this->expectException(ContainerException::class);

        // do something
        $container->add('foobar');

    }

    /**
     * @test
     */
    public function a_container_return_false_if_checking_service_is_not_exist()
    {
        // setup
        $container = new Container();

        $container->add('dependent-class', DependentClass::class);
        // assert return false
        $this->assertFalse($container->has('myservice'));
        $this->assertTrue($container->has('dependent-class'));
    }

}