<?php

use Tak\Attributes\AttributesEngine;

use Tak\Attributes\Invoke\Repeat;

use Tak\Attributes\Invoke\Cache;

use Tak\Attributes\Common\Json;

use Tak\Attributes\Common\Contains;

use Tak\Attributes\Common\EndsWith;

use Tak\Attributes\Common\StartsWith;

use Tak\Attributes\Common\In;

use Tak\Asyncio\Loop;

final class UserService {
	public int $counter = 0;

	use AttributesEngine;

	#[Cache(ttl : 0.4)]
	#[Repeat(interval : 0.2,timeout : 1.2)]
	protected function register(
		#[Json(enableCheck : false)] string $json,
		#[StartsWith('@'),Contains('User'),EndsWith('!')] string $username,
		#[In(['user','admin'])] string $role = 'user'
	) : mixed {
		echo 'Counter : ' , ++$this->counter , PHP_EOL;
		return sprintf('registered %s (%s) details %s',$username,$role,$json);
	}
}

$service = new UserService();

var_dump($service->register(['user'=>'me'],'@My User Name !','admin'));

Loop::run();

?>