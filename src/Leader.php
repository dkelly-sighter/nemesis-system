<?php

namespace Nemesis;

class Leader extends Soldier {
	/**
	 * @var Soldier[]
	 */
	private $reports;

	/**
	 * @param LeaderBuilder $leaderBuilder
	 */
	public function __construct(
		LeaderBuilder $leaderBuilder
	) {
		parent::__construct(
			$leaderBuilder->getName(),
			$leaderBuilder->getBirthday()
		);

		$this->reports = $leaderBuilder->getReports();
	}

	public function getInfo() {
		echo "The leader is now " . $this->getNameString();
		echo "They are " . $this->getAge() . " years old.";
		echo "They have the following reports: ";
	}
}
