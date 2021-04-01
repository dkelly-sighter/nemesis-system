<?php

namespace Nemesis;

class Hierarchy {
	/**
	 * @var Leader
	 */
	private $leader;

	public function __construct(
		Leader $leader
	) {
		$this->leader = $leader;
	}

	public function isHierarchyDead() : bool {
		return $this->leaderIsDead() && $this->leaderHasNoFollowers();
	}

	public function updateHierarchy() {
		if ($this->leaderIsDead()) {
			$this->fixHierarchy();
		}
	}

	private function fixHierarchy() {
		$nextInLine = $this->getNextInLine();
		$this->setLeader($nextInLine);
	}

	private function getNextInLine() {
		$followers = $this->leader->getFollowers();
		return $followers[0];
	}

	private function setLeader(Leader $leader) {
		$this->leader = $leader;
	}

	public function getLeader() : Leader {
		return $this->leader;
	}

	public function getSoldier(string $soldierName) : Soldier {
		if ($this->leader->getFirstName() == $soldierName) {
			return $this->leader;
		} else {
			return $this->leader->getSoldier($soldierName);
		}
	}

	protected function leaderIsDead() : bool {
		return $this->leader->isDead();
	}

	protected function leaderHasNoFollowers() : bool {
		return empty($this->leader->getFollowers());
	}
}