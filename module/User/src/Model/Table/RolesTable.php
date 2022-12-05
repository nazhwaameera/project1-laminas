<?php

declare(strict_types=1);

namespace User\Model\Table;

use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Db\Adapter\Adapter;

class RolesTable extends AbstractTableGateway
{
    protected $adapater;
    protected $table = 'roles';

    public function __construct(Adapter $adapter)
    {
        $this->adapater = $adapter;
        $this->initialize();
    }
}