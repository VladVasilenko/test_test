<?php

namespace Lib;

abstract class AbstractEnum
{
	public function getValue(): string
	{
		
	}

	public function getName(): string
	{
		
	}

	public static function checkAndGet(string $value): ?AbstractEnum
	{

	}
}