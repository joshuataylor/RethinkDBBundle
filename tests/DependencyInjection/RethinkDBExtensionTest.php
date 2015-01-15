<?php

namespace joshuataylor\Bundle\RethinkDBBundle\Tests\DependencyInjection;

use joshuataylor\Bundle\RethinkDBBundle\DependencyInjection\RethinkDBExtension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

class RethinkDBExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * QPush Extension
     *
     * @var RethinkDBExtension
     */
    private $extension;

    /**
     * Container
     *
     * @var ContainerBuilder
     */
    private $container;

    public function setUp()
    {
        $this->extension = new RethinkDBExtension();
        $this->container = new ContainerBuilder();

        $this->container->registerExtension($this->extension);
    }

    public function testConfiguration()
    {
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__.'/../Fixtures/'));
        $loader->load('config_test.yml');

        $this->container->compile();

        $this->assertTrue($this->container->has('rethinkdb'));
    }
}
