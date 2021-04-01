<?php

namespace Nemesis;

class Leader extends Soldier {
	/**
	 * @var Leader[]
	 */
	private $reports;

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

	public function die() {
		if ($this->hasNoLeader()) {
			$this->tryToPromote();
		} else {
			$this->giveFollowersToLeader();
			$this->getLeader()->removeFollower($this);
		}
		parent::die();
	}

	public function addFollower(Soldier $soldier) : void {
		$this->reports[] = $soldier;
	}

	public function removeFollower(Soldier $soldier) : void {
		$newReports = [];
		foreach ($this->getFollowers() as $follower) {
			if ($soldier !== $follower) {
				$newReports[] = $follower;
			}
		}
		$this->reports = $newReports;
	}

	public function takeFollowersFromLeader(Leader $leader) : void {
		$newReports = [];
		foreach ($this->getFollowers() as $follower) {
			if ($follower === $leader) {
				$newReports = array_merge($newReports, $follower->getFollowers());
			} else {
				$newReports[] = $follower;
			}
		}
		$this->reports = $newReports;
	}

	protected function hasNoLeader(): bool {
		return empty($this->getLeader());
	}

	protected function giveFollowersToLeader(): void {
		foreach ($this->reports as $report) {
			$report->registerLeader($this->getLeader());
			$this->getLeader()->takeFollowersFromLeader($this);
		}
	}

	protected function promoteNewLeader(): Leader {
		$newLeader = $this->getFollowers()[0];
		foreach ($newLeader->getFollowers() as $follower) {
			$follower->registerLeader($newLeader);
			$newLeader->addFollower($follower);
		}
		return $newLeader;
	}

	protected function hasNoFollowers(array $followers): bool {
		return empty($followers);
	}

	protected function tryToPromote(): ?Leader {
		$followers = $this->getFollowers();
		if ($this->hasNoFollowers($followers)) {
			return $this->getLeader();
		} else {
			$newLeader = $this->promoteNewLeader();
			return $newLeader;
		}
	}

	public function getSoldier($soldierName) : Soldier {
		if ($this->getFirstName() == $soldierName) {
			return $this;
		} else {
			$followers = $this->getFollowers();
			if (empty($followers)) {

			}
		}
	}

}
