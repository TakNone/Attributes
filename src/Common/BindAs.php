<?php

declare(strict_types = 1);

namespace Tak\Attributes\Common;

use Tak\Attributes\ValidatorInterface;

use Attribute;

use ReflectionClass;

use InvalidArgumentException;

#[Attribute(Attribute::TARGET_ALL | Attribute::IS_REPEATABLE)]
final class BindAs implements ValidatorInterface {
	public function __construct(public string $class,public string $method = '__construct',public bool $spread = false){
	}
	public function validate(string $name,mixed $value) : mixed {
		$spread = boolval($this->spread and is_array($value));
		$args = ($spread ? $value : array($value));
		$class = new ReflectionClass($this->class);
		/* Can use newLazyGhost for php 8.4+ */
		if($this->method === '__construct'){
			return $class->newInstanceArgs($args);
		}
		$method = $class->getMethod($this->method);
		return $method->invokeArgs($method->isStatic() ? null : $class->newInstanceWithoutConstructor(),$args);
	}
}

?>