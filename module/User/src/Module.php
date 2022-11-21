<?php

declare(strict_types=1);

namespace User;

use Laminas\Db\Adapter\Adapter;
use User\Model\Table\UsersTable;

class Module 
{
    public function getConfig(): array
    {
        /** @var array $config */
        $config = include __DIR__ . '/../config/module.config.php';
        return $config;
    }

    public function getServiceConfig(): array
    {
        return [
            'factories' => [
                UsersTable::class => function($sm) {
                    $dbAdapter = $sm->get(Adapter::class);
                    return new UsersTable($dbAdapter);
                }
            ]
        ];
    }
}