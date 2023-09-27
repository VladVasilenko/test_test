<?php

namespace Bundles\Account\Entity;

use Entity\Entity;
/**
 * @method UserEntity setId(int $value)
 * @method int getId
 * @method UserEntity setFirstName(int $value)
 * @method int getFirstName
 */
class UserEntity extends Entity
{
	/**
	 * @type bigint
	 * @not-null
	 * @primary
	 */
	protected $id;
	/**
	 * @type varchar(50)
	 * @not-null
	 * @index
	 */
	protected $first_name;
}