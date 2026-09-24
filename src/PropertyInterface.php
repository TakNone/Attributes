<?php

declare(strict_types = 1);

namespace Tak\Attributes;

interface PropertyInterface {
	public function check(string $name,mixed $value) : mixed;
}

?>