<?php

namespace Nemesis;

class LeaderBuilder {

	private $name;
	private $birthday;
	/**
	 * @var Leader[]
	 */
	private $soldiers;

	public function __construct(
		NameCollection $name,
		Birthday $birthday
	) {
		$this->name = $name;
		$this->birthday = $birthday;
		$this->soldiers = [];
	}

	public function getName() : NameCollection {
		return $this->name;
	}

	public function getBirthday() : Birthday {
		return $this->birthday;
	}

	public function addReports(Leader ...$soldiers) : LeaderBuilder {
		$this->soldiers = array_merge($this->soldiers, $soldiers);
		return $this;
	}

	/**
	 * @return Leader[]
	 */
	public function getReports() : array {
		return $this->soldiers;
	}

	public function buildLeader() : Leader {
		$leader = new Leader($this);
		foreach ($this->soldiers as $soldier) {
			$soldier->registerLeader($leader);
		}
		return $leader;
	}
}