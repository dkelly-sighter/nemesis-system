<?php

namespace Nemesis;

use DateTime;

class Soldier {

	private $name;
	private $birthday;
	protected $leader;
	/**
	 * @var false
	 */
	private $dead;

	public function __construct(
		NameCollection $name,
		Birthday $birthday
	) {
		$this->name = $name;
		$this->birthday = $birthday;
		$this->dead = false;
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

	public function getLeader() : ?Leader {
		return $this->leader;
	}

	public function getGeneral() : ?Soldier {
		$leader = $this->getLeader();
		if (!empty($leader)) {
			return $leader->getGeneral();
		}
		return $this;
	}

	public function die() {
		$this->dead = true;
		return $this;
	}

	public function isDead() : bool {
		return $this->dead;
	}

}