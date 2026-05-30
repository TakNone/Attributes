<?php

declare(strict_types = 1);

namespace Tak\Attributes\Invoke;

use Tak\Attributes\InvokeInterface;

use Attribute;

use Throwable;

use RuntimeException;

use function Tak\Asyncio\delay;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class Retry implements InvokeInterface {
	public function __construct(public int $attempts,public float $delay){
	}
	public function invoke(callable $callback,array $arguments) : mixed {
		for($i = 0;$i < $this->attempts;$i++){
			try {
				return call_user_func_array($callback,$arguments);
			} catch(Throwable){
				delay($this->delay);
			}
		}
		throw new RuntimeException($this->attempts.' attempts were made to execute the method and all attempts failed');
	}
}

?>