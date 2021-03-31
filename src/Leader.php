<?php

namespace Nemesis;

class Leader extends Soldier {
	/**
	 * @var Leader[]
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

	public function getFollowers() : array {
		return $this->reports;
	}

}
