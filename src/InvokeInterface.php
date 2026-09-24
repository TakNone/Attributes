<?php

declare(strict_types = 1);

namespace Tak\Attributes;

interface InvokeInterface {
	public function invoke(callable $callback,array $arguments) : mixed;
}

?>