<?php

declare(strict_types=1);

namespace User\Controller\Factory;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface as ContainerException;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\AuthController;
use User\Model\Table\UsersTable;

class AuthControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AuthController(
			$container->get(UsersTable::class)
		);
    }
}