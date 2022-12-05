<?php

declare(strict_types=1);

namespace User\Controller\Factory;

use Psr\Container\ContainerInterface;
use Psr\Container\ContainerExceptionInterface as ContainerException;
use Laminas\ServiceManager\Factory\FactoryInterface;
use User\Controller\PasswordController;
use User\Model\Table\ForgotTable;
use User\Model\Table\UsersTable;

class PasswordControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new PasswordController(
            $container->get(ForgotTable::class),
			$container->get(UsersTable::class)
		);
    }
}