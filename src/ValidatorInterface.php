<?php

declare(strict_types = 1);

namespace Tak\Attributes;

interface ValidatorInterface {
	public function validate(string $name,mixed $value) : mixed;
}

?>