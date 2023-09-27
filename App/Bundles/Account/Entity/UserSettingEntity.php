<?php

namespace Bundles\Account\Entity;

use Bundles\Account\Enum\NotificationType;
use Entity\Entity;

/**
 * @method UserSettingEntity setId(int $value)
 * @method int getId
 * @method UserSettingEntity setUserId(int $value)
 * @method int getUserId
 * @method UserSettingEntity setNotificationType(string $value)
 * @method string getNotificationType
 * @method UserSettingEntity setSettingOne(type $value)
 * @method type getSettingOne
 */
class UserSettingEntity extends Entity
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
	protected $notification_type;
	/**
	 * ...
	 */
	protected $setting_one;

	public function getNotificationTypeAsEnum(): ?NotificationType
	{
		return NotificationType::checkAndGet($this->getNotificationType());
	}
}