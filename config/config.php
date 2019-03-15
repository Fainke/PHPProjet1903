<?php

use Generic\Database\Connection;
use Generic\Renderer\TwigRenderer;

return [

    "root-dir" => dirname(__DIR__),
    "database_name" => 'bdd_mysql_command',
    "database_user" => 'php_user_bdd',
    "database_pass" => 'rjqwhMYlhNXmVOPc',

    TwigRenderer::class => function(\DI\Container $container) {
        return new TwigRenderer(
            $container->get('root-dir') .  '/templates'
        );
    },

    Connection::class => function(\DI\Container $container) {
        return new Connection(
            $container->get('database_name'),
            $container->get('database_user'),
            $container->get('database_pass')
        );
    }
];