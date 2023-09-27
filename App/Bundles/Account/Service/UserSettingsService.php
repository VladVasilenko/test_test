<?php

namespace Bundles\Account\Service;

use Bundles\Account\Entity\UserEntity;
use Bundles\Account\Enum\NotificationType;
use Bundles\Account\Factory\NotificationDataFactory;
use Bundles\Account\Manager\UserSettingManager;
use Bundles\Account\Request\UserSettingRequest;
use Bundles\Account\Service\Sender\AbstractSender;
use Response\Response;

class UserSettingsService
{
	/**
	 * @var UserSettingManager
	 */
	private UserSettingManager $userSettingManager;
	/**
	 * @var ConfirmationCodeService
	 */
	private ConfirmationCodeService $codeService;

	/**
	 * @param UserSettingManager $userSettingManager
	 * @param ConfirmationCodeService $codeService
	 */
	public function __construct(UserSettingManager $userSettingManager, ConfirmationCodeService $codeService)
	{
		$this->userSettingManager = $userSettingManager;
		$this->codeService = $codeService;
	}

	/**
	 * @param UserSettingRequest $request
	 * @param UserEntity $user
	 * @return void
	 * @throws \ErrorException
	 */
	public function changeSetting(UserSettingRequest $request, UserEntity $user): Response
	{
		$this->userSettingManager->startTx($commit, $rollback);

		if ($this->isConfirmRequest($request)) {
			$view = $this->confirmChangeSetting($request, $user);
			$commit();
			return $view;
		}

		if ($this->isAnotherNotificationType($request, $user)) {
			$result = $this->changeNotificationType($request,$user);
			if (!$result) {
				$rollback();
				throw new \ErrorException('');
			}
		}

		//Validate available types in Request
		$sender = AbstractSender::getInstance($notificationType = NotificationType::checkAndGet($request->notificationType));
		$sender->send(NotificationDataFactory::factory($user, $notificationType));

		$commit();

		// Return response, which contain info for return view with confirm code form
		return new Response();

	}

	/**
	 * Check, thar selected notification type is different from last selected
	 * @param UserSettingRequest $request
	 * @param UserEntity $user
	 * @return bool
	 */
	private function isAnotherNotificationType(UserSettingRequest $request, UserEntity $user): bool
	{

	}

	/**
	 * Change notification type, and save it in db
	 * @param UserSettingRequest $request
	 * @param UserEntity $user
	 * @return bool
	 */
	private function changeNotificationType(UserSettingRequest $request, UserEntity $user): bool
	{

	}

	/**
	 * Check, that request contain confirm code
	 * @param UserSettingRequest $request
	 * @return bool
	 */
	private function isConfirmRequest(UserSettingRequest $request): bool
	{

	}

	/**
	 * @param UserEntity $user
	 * @param UserSettingRequest $request
	 * @return void
	 */
	private function applySetting(UserEntity $user, UserSettingRequest $request)
	{
	}

	/**
	 * @param UserSettingRequest $request
	 * @param UserEntity $user
	 * @return Response
	 * @throws \ErrorException
	 */
	private function confirmChangeSetting(UserSettingRequest $request, UserEntity $user): Response
	{
		$verify = $this->codeService->confirmCode($request->code, $user);
		if (!$verify) {
			throw new \ErrorException('', 403, '');
		}
		$this->applySetting($user, $request);
		// magic ))) use new() just for example. I know it`s bad practice
		return new Response();
	}
}