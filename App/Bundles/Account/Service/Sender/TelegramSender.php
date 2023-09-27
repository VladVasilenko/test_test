<?php

namespace Bundles\Account\Service\Sender;

use Bundles\Account\Interfaces\NotificationDataInterface;
use Bundles\Account\Interfaces\SenderInterface;

class TelegramSender implements SenderInterface
{
	/**
	 * @param NotificationDataInterface $notificationData
	 * @return void
	 */
	public function send(NotificationDataInterface $notificationData): void
	{
		// TODO: Implement send() method.
	}
}