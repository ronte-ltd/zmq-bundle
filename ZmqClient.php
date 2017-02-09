<?php

namespace RonteLtd\Zmq;

class ZmqClient implements Client
{
    private $type;
    private $url;
    private $socket;

    public function __construct(int $type, string $url)
    {
        $this->type = $type;
        $this->url = $url;
    }

    public function send(string $message): bool
    {
        try {
            if (!$this->socket) {
                $context = new \ZMQContext();
                $this->socket = $context
                    ->getSocket($this->type, 'my sock');
                $this->socket->connect($this->url);
            }

            $this->socket->send($message);
        } catch (\ZMQException $e) {
            return false;
        }
        return true;
    }

    public function __destruct()
    {
        if ($this->socket) {
            try {
                $this->socket->disconnect($this->url);
            } catch (\ZMQException $e) {
            }
        }
    }
}
