<?php
namespace Bundles\Account\Controller;

use Bundles\Account\Request\UserSettingRequest;
use Bundles\Account\Service\UserSettingsService;
use Controller\AccountController;
use Exception\HttpException;
use Lib\View;
use Response\Response;

class UserSettingsController extends AccountController
{
	private UserSettingsService $service;
	public function __construct(UserSettingsService $service)
	{
		parent::__construct();
		$this->service = $service;
	}

	public function index(): View
	{
		//....... magic)) and we get instance of Response class
		$response = new Response();

		return $this->render($response);

	}

	/**
	 * I know that it is better to make another method for generating confirm code and for validating it in order to share responsibility,
	 * but I thought that this would be enough for an example. Excuse me
	 *
	 * @param UserSettingRequest $request
	 * @return View
	 * @throws HttpException
	 */
	public function changeSetting(UserSettingRequest $request): View
	{
		try {
			$response = $this->service->changeSetting($request, $this->getUser());
			return $this->render($response);
		} catch (\Exception $e) {
			//Imagine, that we have added response formatting to the BaseController
			throw new HttpException($e->getCode(), $e->getMessage());
		}
	}
}