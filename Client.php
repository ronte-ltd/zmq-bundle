<?php

namespace RonteLtd\Zmq;

interface Client
{
    /**
     * Send message to Queue.
     *
     * @return bool Success/Unsuccess
     */
    public function send(string $message): bool;
}
