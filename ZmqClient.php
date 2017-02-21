<?php

namespace RonteLtd\Zmq;

use Psr\Log\LoggerInterface;

class ZmqClient implements Client
{
    private $logger;
    private $type;
    private $url;
    private $sleep;
    private $socket;

    public function __construct(
        LoggerInterface $logger,
        int $type,
        string $url,
        int $sleep
    ) {
        $this->logger = $logger;
        $this->type = $type;
        $this->url = $url;
        $this->sleep = $sleep;
    }

    public function send(string $message): bool
    {
        $this->logger->debug('Zmq start sending');
        try {
            if (!$this->socket) {
                $this->logger->debug('Zmq start connecting');
                $context = new \ZMQContext();
                $this->socket = $context
                    ->getSocket($this->type, 'my sock');
                $this->socket->connect($this->url);
                $this->logger->debug('Zmq connected');
                usleep($this->sleep);
            }

            $this->socket->send($message);
            $this->logger->debug('Zmq sent');
        } catch (\ZMQException $e) {
            $this->logger->error(
                'Zmq send message failed: ' . $e->getMessage()
            );
            return false;
        }
        return true;
    }

    public function __destruct()
    {
        if ($this->socket) {
            try {
                usleep($this->sleep);
                $this->socket->disconnect($this->url);
            } catch (\ZMQException $e) {
                $this->logger->error(
                    'Zmq close socket error: ' . $e->getMessage()
                );
            }
        }
    }
}
