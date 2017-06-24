<?php declare(strict_types = 1);

require_once __DIR__ . '/../vendor/autoload.php';

$receiver = new \Oli\EmailSender\Persistence\Entities\Person('Petr Olišar', 'petr.olisar@gmail.com');
$sender = new \Oli\EmailSender\Persistence\Entities\Person('František Vomáčka', 'vomacka@email.cz');

$email = new \Oli\EmailSender\Persistence\Entities\Email($sender, $receiver, 'Ahoj Františku, jak se máš?', 'Testovací e-mail');

$loader = new Nette\DI\ContainerLoader(__DIR__ . '/../temp');
$class = $loader->load(function(\Nette\DI\Compiler $compiler) {
  $compiler->loadConfig(__DIR__ . '/config.neon');
});
/** @var \Nette\DI\Container $container */
$container = new $class;

/** @var \Oli\EmailSender\Persistence\PersistEmail $persistEmail */
$persistEmail = $container->getByType(\Oli\EmailSender\Persistence\IPersistEmail::class);

$persistEmail->send($email);
