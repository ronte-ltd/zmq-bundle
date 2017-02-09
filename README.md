Zmq client bundle
=================

[![Build Status](https://travis-ci.org/ronte-ltd/zmq-bundle.svg?branch=master)](https://travis-ci.org/ronte-ltd/zmq-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ronte-ltd/zmq-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ronte-ltd/zmq-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ronte-ltd/zmq-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ronte-ltd/zmq-bundle/?branch=master)
# Install

``` bash
composer require "ronte-ltd/zmq"
```

# Configure

``` yaml
# app/config/config.yml
# ...
ronte-zmq:
  type: \ZMQ::SOCKET_XPUB
  url: "tcp://localhost:12345"
```

# Use

``` php
$result = $container->get('ronte-zmq.client')
    ->send('Some queue message');

if ($result) {
    echo "Message sent.\n";
} else {
    echo "Message not sent.\n";
}
```
