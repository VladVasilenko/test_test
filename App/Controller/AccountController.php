<?php

namespace Controller;

use Bundles\Account\Entity\UserEntity;

abstract class AccountController extends BaseController
{
	protected bool $require_authorization = true;

	public function __construct()
	{
		parent::__construct();
		if ($this->require_authorization) {
			$this->restrictAccess();
		}
	}

	public function getUser(): UserEntity
	{
		// TODO: Implement getRewardType() method.
	}

	private function restrictAccess()
	{
		// TODO: Implement getRewardType() method.
	}
}