<?php

namespace Nemesis;

class CaptainFactory {

	/**
	 * @var SoldierBuilderFactory
	 */
	private $soldierBuilderFactory;
	/**
	 * @var SquadLeaderFactory
	 */
	private $squadLeaderFactory;

	/**
	 * @param SoldierBuilderFactory $soldierBuilderFactory
	 * @param SquadLeaderFactory    $squadLeaderFactory
	 */
	public function __construct(
		SoldierBuilderFactory $soldierBuilderFactory,
		SquadLeaderFactory $squadLeaderFactory
	) {
		$this->soldierBuilderFactory = $soldierBuilderFactory;
		$this->squadLeaderFactory = $squadLeaderFactory;
	}

	/**
	 * @return Leader
	 */
	public function make(): Leader {
		$leaderBuilder = $this->soldierBuilderFactory->make();
		$reports = [];
		for ($i = 0; $i < 2; $i++) {
			$squadLeader = $this->squadLeaderFactory->make();
			$reports[] = $squadLeader;
		}
		$leaderBuilder->addReports(...$reports);
		$leader = $leaderBuilder->buildLeader();
		return $leader;
	}

}