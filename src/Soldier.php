<?php

namespace Nemesis;

use DateTime;

class Soldier {

	private $name;
	private $birthday;
	private $leader;

	public function __construct(
		NameCollection $name,
		Birthday $birthday
	) {
		$this->name = $name;
		$this->birthday = $birthday;
	}

	public function registerLeader(Leader $leader) : void {
		$this->leader = $leader;
	}

	/**
	 * @return string
	 */
	public function getNameString(): string {
		return $this->name->getAsString();
	}

	/**
	 * @return int
	 */
	public function getAge(): int {
		$age = $this->birthday->getDateTimeInterface()->diff(new DateTime())->y;
		return $age;
	}

}