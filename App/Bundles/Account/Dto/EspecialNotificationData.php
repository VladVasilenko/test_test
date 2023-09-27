<?php

namespace Bundles\Account\Dto;

class EspecialNotificationData extends AbstractNotificationData
{
	/**
	 * @var string
	 */
	protected string $especial_data;

	public function __construct(string $receiver, string $message, string $especial_data)
	{
		parent::__construct($receiver, $message);
		$this->especial_data = $especial_data;
	}
}