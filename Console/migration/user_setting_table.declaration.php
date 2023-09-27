<?php

return [
	'id'                => ['type' => 'bigint', 'not-null', 'primary'],
	'user_id'           => ['type' => 'bigint', 'not-null', 'index'],
	'notification_type' => ['type' => 'enum'],
	'setting_one'       => ['....'],
	'...'               => ['....'],
];