<?php

Const CLIENT_ID = '';
Const CLIENT_SECRET = '';
Const REDIRECT_URL = 'http://Your-Domain/oauthExample.php';
Const CACHE_DRIVER = 'memcache';
Const MEMCACHE_SERVER_IP = '127.0.0.1';
Const MEMCACHE_SERVER_PORT = '11211';
Const MEMCACHE_PREFIX = 'souq_api';

// if (CACHE_DRIVER == 'memcache') {
//     // init the stash memcache driver
//     $driver = new \Stash\Driver\Memcache();

//     $driver->setOptions(array('servers' => array('127.0.0.1', '11211')));

//     // Using memcached options
//     $driver = new \Stash\Driver\Memcache();

//     $options = array();

//     $options['servers'][] = array(MEMCACHE_SERVER_IP, MEMCACHE_SERVER_PORT);

//     $options['prefix_key'] = MEMCACHE_PREFIX;

//     $options['libketama_compatible'] = true;

//     $options['cache_lookups'] = true;

//     $options['serializer'] = 'json';

//     $driver->setOptions($options);

//     $pool = new \Stash\Pool($driver);
// }

// class Config
// {

// }
