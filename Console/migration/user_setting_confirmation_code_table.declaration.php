<?php

return [
	'id'           => ['type' => 'bigint', 'not-null', 'primary'],
	'user_id'      => ['type' => 'bigint', 'not-null', 'index'],
	'code'         => ['type' => 'varchar(50)'],
	'is_confirmed' => ['type' => 'unsigned_smallint', 'not_null', 'default' => 0],
	'expired_at'   => ['type' => 'date', 'not_null'],
	'created_at'   => ['type' => 'date', 'not_null'],
];