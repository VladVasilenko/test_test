<?php

namespace Bundles\Account\Service\Sender;

use Bundles\Account\Enum\NotificationType;
use Bundles\Account\Interfaces\SenderInterface;

abstract class AbstractSender implements SenderInterface
{
	/**
	 * @var AbstractSender[]
	 */
	private static array $instances = [];

	/**
	 *
	 * @param NotificationType $notificationType
	 * @return SenderInterface
	 */
	public static function getInstance(NotificationType $notificationType): SenderInterface
	{

		if (!isset(static::$instances[$notificationType->getValue()])) {
			$executorClass = pascalCase($notificationType->getValue()) . 'Sender';
			$executorClass = 'Bundles\Account\Service\Sender\\' . $executorClass;
			static::$instances[$notificationType->getValue()] = new $executorClass();
		}

		return static::$instances[$notificationType->getValue()];
	}
}