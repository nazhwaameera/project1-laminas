<?php

declare(strict_types=1);

namespace User\Controller\Factory;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface as ContainerException;
use Laminas\Db\Adapter\Adapter;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\LoginController;
use User\Model\Table\UsersTable;

class LoginControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new LoginController(
            $container->get(Adapter::class),
            $container->get(UsersTable::class),
        );
    }

}