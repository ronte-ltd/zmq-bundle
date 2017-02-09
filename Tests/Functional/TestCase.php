<?php

namespace RonteLtd\Zmq\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Filesystem\Filesystem;

abstract class TestCase extends WebTestCase
{
    protected static function createKernel(array $options = [])
    {
        return new AppKernel('test', true);
    }

    protected function setUp()
    {
        $fs = new Filesystem();
        $fs->remove(sys_get_temp_dir().'/RonteLtdZmq/');
    }

    protected function tearDown()
    {
        static::$kernel = null;
    }
}
