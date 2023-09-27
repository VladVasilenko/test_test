<?php

namespace Bundles\Account\Service\Sender;

use Bundles\Account\Interfaces\NotificationDataInterface;
use Bundles\Account\Interfaces\SenderInterface;

class EmailSender implements SenderInterface
{
	/**
	 * @param NotificationDataInterface $notificationData
	 * @return void
	 */
	public function send(NotificationDataInterface $notificationData): void
	{
		// TODO: Implement send() method.

		//We can check type of class, for use EspecialNotificationData
	}
}