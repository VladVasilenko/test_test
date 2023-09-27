<?php

namespace Bundles\Account\Enum;

use Lib\AbstractEnum;

/**
 * @method static self EMAIL()
 * @method static self SMS()
 * @method static self TELEGRAM()
 */
class NotificationType extends AbstractEnum
{
	public const EMAIL = 'email';
	public const SMS = 'sms';
	public const TELEGRAM = 'telegram';

}