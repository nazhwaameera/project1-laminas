<?php

declare(strict_types=1);

namespace User\Model\Entity;

class UserEntity
{
	protected $user_id;
	protected $username;
	protected $email;
	protected $password;
	protected $role_id;
	protected $active;
	protected $created;
	protected $modified;
	#roles table column
	protected $role;

	public function getUserId()
	{
		return $this->user_id;
	}

	public function setUserId($user_id)
	{
		$this->user_id = $user_id;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getRoleId()
	{
		return $this->role_id;
	}

	public function setRoleId($role_id)
	{
		$this->role_id = $role_id;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setActive($active)
	{
		$this->active = $active;
	}

	public function getCreated()
	{
		return $this->created;
	}

	public function setCreated($created)
	{
		$this->created = $created;
	}

	public function getModified()
	{
		return $this->modified;
	}

	public function setModified($modified)
	{
		$this->modified = $modified;
	}

	public function getRole()
	{
		return $this->role;
	}

	public function setRole($role)
	{
		$this->role  = $role;
	}
}
