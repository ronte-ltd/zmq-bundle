<?php

namespace RonteLtd\Zmq;

use RonteLtd\Zmq\DependencyInjection\RonteZmqExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RonteZmqBundle extends Bundle
{
    public function __construct()
    {
        $this->extension = new RonteZmqExtension();
    }
}
