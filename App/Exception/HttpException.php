<?php

namespace Exception;

class HttpException extends \Exception
{
	/**
	 * @var int HTTP status code, such as 403, 404, 500, etc.
	 */
	public $statusCode;

	/**
	 * Constructor.
	 * @param int $status HTTP status code, such as 404, 500, etc.
	 * @param null $message error message
	 * @param int $code error code
	 * @param \Throwable|null $previous The previous exception used for the exception chaining.
	 */
	public function __construct($status, $message = null, $code = 0, \Throwable $previous = null)
	{
		$this->statusCode = $status;
		parent::__construct($message, $code, $previous);
	}

	/**
	 * @return string the user-friendly name of this exception
	 */
}
