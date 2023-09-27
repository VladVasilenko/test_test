<?php
if (!function_exists('pascalCase')) {
	function pascalCase($underscoredOrSpacedString)
	{
		return str_replace(' ', '', ucwords(str_replace('_', ' ', $underscoredOrSpacedString)));
	}
}
