<?php

namespace Bundles\Account\Interfaces;

interface SenderInterface
{
	/**
	 * @param NotificationDataInterface $notificationData
	 * @return void
	 */
	public function send(NotificationDataInterface $notificationData): void;
}