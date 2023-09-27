<?php

namespace Bundles\Account\Entity;

use Bundles\Account\Enum\NotificationType;
use Entity\Entity;

/**
 * @method UserSettingEntity setId(int $value)
 * @method int getId
 * @method UserSettingEntity setUserId(int $value)
 * @method int getUserId
 * @method string getCode
 * @method UserSettingEntity setIsConfirmed(int $value)
 * @method UserSettingEntity setExpiredAt(\DateTime $value)
 * @method \DateTime getExpiredAt
 * @method UserSettingEntity setCreatedAt(\DateTime $value)
 * @method \DateTime getCreatedAt
 */
class ConfirmationCodeEntity extends Entity
{
	/**
	 * @type bigint
	 * @not-null
	 * @primary
	 */
	protected $id;
	/**
	 * @type bigint(50)
	 * @not-null
	 * @index
	 */
	protected $user_id;
	/**
	 * @type varchar(50)
	 */
	protected $code;
	/**
	 * @type unsigned_smallint
	 */
	protected $is_confirmed;
	/**
	 * @type date
	 */
	protected $expired_at;
	/**
	 * @type date
	 */
	protected $created_at;

	public function getIsConfirmed(): bool
	{
		return (bool) $this->is_confirmed;
	}

	public function setCode(string $code)
	{
		$this->code = password_hash($code, PASSWORD_BCRYPT);
	}

	public function getNotificationTypeAsEnum(): ?NotificationType
	{
		return NotificationType::checkAndGet($this->getNotificationType());
	}
}