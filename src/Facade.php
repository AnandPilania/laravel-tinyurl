<?php

namespace AP\Tinyurl;

use AP\Support\Facade as Base;

class Facade extends Base
{
	protected static function getFacadeAccessor()
	{
		return 'tinyurl';
	}
}