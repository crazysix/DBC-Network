<?php

/**
 * Lando connection credentials.
 */
$lando_info = json_decode(getenv('LANDO_INFO'), TRUE);
$settings['trusted_host_patterns'] = ['.*'];
$databases['default']['default'] = array (
  'database' => $lando_info['database']['creds']['database'],
  'username' => $lando_info['database']['creds']['user'],
  'password' => $lando_info['database']['creds']['password'],
  'prefix' => '',
  'host' => $lando_info['database']['internal_connection']['host'],
  'port' => $lando_info['database']['internal_connection']['port'],
  'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
  'driver' => 'mysql',
);
$settings['hash_salt'] = md5(getenv('LANDO_HOST_IP'));
