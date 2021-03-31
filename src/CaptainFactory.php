<?php

namespace Nemesis;

class CaptainFactory {

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
		for ($i = 0; $i < 7; $i++) {
			$soliderBuilder = $this->soldierBuilderFactory->make();
			$reports[] = $soliderBuilder->buildLeader();
		}
		$leaderBuilder->addReports(...$reports);
		$leader = $leaderBuilder->buildLeader();
		return $leader;
	}

}