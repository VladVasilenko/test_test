<?php

namespace Bundles\Account\Dto;

use Bundles\Account\Interfaces\NotificationDataInterface;

abstract class AbstractNotificationData implements NotificationDataInterface
{
	/**
	 * @var string
	 */
	protected string $receiver;

	/**
	 * @var string
	 */
	protected string $message;

	public function __construct(string $receiver, $message)
	{
		$this->receiver =$receiver;
		$this->message = $message;
	}

	public function getReceiver(): string
	{
		// TODO: Implement getReceiver() method.
	}

	public function getMessage(): string
	{
		// TODO: Implement getMessage() method.
	}
}