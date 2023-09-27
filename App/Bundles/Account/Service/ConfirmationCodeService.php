<?php

namespace Bundles\Account\Service;

use Bundles\Account\Entity\ConfirmationCodeEntity;
use Bundles\Account\Entity\UserEntity;
use Bundles\Account\Manager\ConfirmationCodeManager;
use ErrorException;

class ConfirmationCodeService
{
	/**
	 * @var ConfirmationCodeManager
	 */
	private ConfirmationCodeManager $codeManager;

	/**
	 * @param ConfirmationCodeManager $codeManager
	 */
	public function __construct(ConfirmationCodeManager $codeManager)
	{
		$this->codeManager = $codeManager;
	}

	/**
	 * @param string $code
	 * @param UserEntity $userEntity
	 * @return bool
	 * @throws ErrorException
	 */
	public function confirmCode(string $code, UserEntity $userEntity): bool
	{
		/** @var ConfirmationCodeEntity|null $codeEntity */
		$codeEntity = $this->codeManager->getOne(
			[
				'user_id'      => $userEntity->getId(),
				'is_confirmed' => false,
				'is_expired'   => false,
			]
		);
		if (!$codeEntity) {
			throw new ErrorException('');
		}

		$status = password_verify($code, $codeEntity->getCode());

		if (!$status) {
			throw new ErrorException('');
		}

		$this->codeManager->lockEntity($codeEntity);
		$codeEntity->setIsConfirmed(1);

		$this->codeManager->save($codeEntity);

		return true;
	}
}