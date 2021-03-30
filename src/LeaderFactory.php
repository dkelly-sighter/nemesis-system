<?php

namespace Nemesis;

class LeaderFactory {
	/**
	 * @var SoldierBuilderFactory
	 */
	private $soldierBuilderFactory;

	public function __construct(
		SoldierBuilderFactory $soldierBuilderFactory
	) {
		$this->soldierBuilderFactory = $soldierBuilderFactory;
	}

	/**
	 * @return Leader
	 */
	public function make(): Leader {
		$leaderBuilder = $this->soldierBuilderFactory->make();
		$reports = [];
		for ($i = 0; $i < 3; $i++) {
			$soliderBuilder = $this->soldierBuilderFactory->make();
			$reports[] = $soliderBuilder->buildLeader();
		}
		$leaderBuilder->addReports(...$reports);
		$leader = $leaderBuilder->buildLeader();
		return $leader;
	}

}