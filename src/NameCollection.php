<?php

namespace Nemesis;

class NameCollection {

	private $names;

	public function __construct(
		string $name,
		string ...$names
	) {
		$this->names = array_merge([$name], $names);
	}

	public function getAsString() : string {
		return implode(' ', $this->names);
	}

	public function getFirstName() : string {
		return array_values($this->names)[0];
	}

}