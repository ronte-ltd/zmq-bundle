<?php

namespace RonteLtd\Zmq\Tests\Functional;

class BootTest extends TestCase
{
    public function testBoot()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
    }
}
