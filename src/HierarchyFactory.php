<?php

namespace Nemesis;

class HierarchyFactory {
	/**
	 * @var LeaderFactory
	 */
	private $leaderFactory;

	public function __construct(
		LeaderFactory $leaderFactory
	) {
		$this->leaderFactory = $leaderFactory;
	}

	public function make() : Hierarchy {
		$general = $this->leaderFactory->make();
		return new Hierarchy($general);
	}

}