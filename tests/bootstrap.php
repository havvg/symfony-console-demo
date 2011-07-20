<?php

if (file_exists($file = __DIR__ . '/../autoload.php') or file_exists($file = __DIR__ . '/../autoload.php.dist'))
{
  $loader = require_once($file);
}
else
{
  throw new RuntimeException('The autloader could not be loaded.');
}

if (!$loader instanceof \Symfony\Component\ClassLoader\UniversalClassLoader) {
    throw new RuntimeException('The testsuite requires a UniversalClassLoader.');
}

$namespaces = $loader->getNamespaces();
$loader->registerNamespaces(array(
    'Demo' => array_merge(array(__DIR__), $namespaces['Demo']),
));