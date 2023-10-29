<?php

namespace GaryClarke\Framework\Tests;

use GaryClarke\Framework\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    /**
     * @test
     * */
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

}