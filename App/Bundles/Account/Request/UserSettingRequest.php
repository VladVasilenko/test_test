<?php

namespace Bundles\Account\Request;

use Cassandra\Exception\ValidationException;
use Lib\Request;

class UserSettingRequest extends Request
{
	/**
	 * @return void
	 * @throws ValidationException
	 */
	public function validate(): void
	{
		///magic)))

		parent::validate();
	}
}