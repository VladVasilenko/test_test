<?php

namespace Manager;

use Entity\Entity;

class BaseManager
{
	public function save(Entity $entity): void
	{

	}
	public function startTx(&$commit, &$rollback)
	{
		
	}

	public function lockEntity(Entity $entity)
	{

	}

	public function getOne(array $params): ?Entity
	{

	}
}