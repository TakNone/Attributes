<?php

declare(strict_types = 1);

namespace Tak\Attributes\Invoke;

use Tak\Attributes\InvokeInterface;

use Attribute;

use Throwable;

use function Tak\Asyncio\async;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
final class Async implements InvokeInterface {
	public function __construct(public bool $await = true,public bool $catch = true,public bool $ignore = false){
	}
	public function invoke(callable $callback,array $arguments) : mixed {
		$future = async($callback,...$arguments);
		if($this->catch){
			$future = $future->catch(fn(Throwable $error) : bool => error_log(strval($error)));
		}
		if($this->ignore){
			$future = $future->ignore();
		}
		return $this->await ? $future->await() : null;
	}
}

?>