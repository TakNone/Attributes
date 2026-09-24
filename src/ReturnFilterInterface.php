<?php

declare(strict_types = 1);

namespace Tak\Attributes;

interface ReturnFilterInterface {
	public function filter(string $name,mixed $value) : mixed;
}

?>