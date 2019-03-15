<?php

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
    }

];