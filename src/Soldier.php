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

	public function getNameString(): string {
		return $this->name->getAsString();
	}

	public function getFirstName() : string {
		return $this->name->getFirstName();
	}

	public function getAge(): int {
		$age = $this->birthday->getDateTimeInterface()->diff(new DateTime())->y;
		return $age;
	}

}