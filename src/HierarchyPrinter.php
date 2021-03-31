<?php


namespace Nemesis;


class HierarchyPrinter {

	/**
	 * @param Leader $leader
	 */
	public function printHierarchy(Leader $leader): void {
		echo "The leader is now " . $leader->getNameString() . " \n";
		echo "They are " . $leader->getAge() . " years old. \n";
		echo "They have the following reports: \n";
		$this->printLevel('--', $leader);
	}

	private function printLevel(string $level, Leader $leader) {
		foreach ($leader->getFollowers() as $follower) {
			echo "$level The follower is " . $follower->getFirstName() . "\n";
			echo "$level They are " . $follower->getAge() . " years old. \n";
			if (!empty($leader->getFollowers())) {
				$this->printLevel($level . '--', $follower);
			}
		}
	}
}