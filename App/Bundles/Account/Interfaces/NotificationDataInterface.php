<?php

namespace Bundles\Account\Interfaces;

interface NotificationDataInterface
{

	/**
	 * Email/phone or other
	 *
	 * @return string
	 */
	public function getReceiver(): string;

	/**
	 * NotificationText
	 *
	 * @return string
	 */
	public function getMessage(): string;

}