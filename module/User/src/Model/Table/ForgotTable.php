<?php

declare(strict_types=1);

namespace User\Model\Table;

use Laminas\Db\TableGateway\AbstractTableGateway;
use Laminas\Db\Adapter\Adapter;

class ForgotTable extends AbstractTableGateway
{
    protected $adapter;
    protected $table = 'forgot';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    # function to delete any tokens that are more than 3 days old from the forgot table
    public function clearOldTokens()
    {
        $sqlQuery = $this->sql->delete()->where(['created < ?' => date('Y-m-d H:i:s', time() - (3600 * 72))]);
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);

        return $sqlStmt->execute();
    }

    # delete token belonging to user with specified user ID
    public function deleteToken(int $userId)
    {
        $sqlQuery = $this->sql->delete()->where(['user_id' => $userId]);
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);

        return $sqlStmt->execute();
    }

    # function to fetch token
    public function fetchToken(string $token, int $userId)
    {
        $sqlQuery = $this->sql->select()->where(['token' => $token])->where(['user_id' => $userId]);
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);

        return $sqlStmt->execute()->current();
    }

    # function to generate token
    public function generateToken(int $length)
	{
		if($length < 8 || $length > 40) {
			throw new \LengthException('Token length must be in range 08-40.');
		}

		# allowed characters
		$chars = 'NaObPcQdReSfTgUhViWjXkYlZmAnBoCpDqErFsGtHuIvJwKxLyMz';
		$token = '';

		for($i = 0; $i < $length; $i++) {
			$random = rand(0, strlen($chars) - 1);
			$token .= substr($chars, $random, 1); 
		}

		return $token;
	}

    # function to save the token
    public function saveToken(string $token, int $userId)
    {
        $values = [
            'user_id' => $userId,
            'token' => $token,
            'created' => date('Y-m-d H:i:s')
        ];

        $sqlQuery = $this->sql->insert()->values($values);
        $sqlStmt = $this->sql->prepareStatementForSqlObject($sqlQuery);

        return $sqlStmt->execute();
    }
}