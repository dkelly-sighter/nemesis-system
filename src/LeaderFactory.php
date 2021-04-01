<?php

namespace Nemesis;

class LeaderFactory {
	/**
	 * @var SoldierBuilderFactory
	 */
	private $soldierBuilderFactory;
	/**
	 * @var CaptainFactory
	 */
	private $captainFactory;

	/**
	 * @param SoldierBuilderFactory $soldierBuilderFactory
	 * @param CaptainFactory        $captainFactory
	 */
	public function __construct(
		SoldierBuilderFactory $soldierBuilderFactory,
		CaptainFactory $captainFactory
	) {
		$this->soldierBuilderFactory = $soldierBuilderFactory;
		$this->captainFactory = $captainFactory;
	}

	/**
	 * @return Leader
	 */
	public function make(): Leader {
		$leaderBuilder = $this->soldierBuilderFactory->make();
		$reports = [];
		for ($i = 0; $i < 2; $i++) {
			$leader = $this->captainFactory->make();
			$reports[] = $leader;
		}
		$leaderBuilder->addReports(...$reports);
		$leader = $leaderBuilder->buildLeader();
		return $leader;
	}

}