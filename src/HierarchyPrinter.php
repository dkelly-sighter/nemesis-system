<?php


namespace Nemesis;


class HierarchyPrinter {

	/**
	 * @param Leader $leader
	 */
	public function printHierarchy(Leader $leader): void {
		echo "The leader is now " . $leader->getNameString() . " ";
		echo "They are " . $leader->getAge() . " years old. ";
		echo "They have the following reports: \n";
		foreach ($leader->getFollowers() as $follower) {
			echo "--The follower is " . $follower->getNameString() . "\n";
			echo "--They are " . $follower->getAge() . " years old. \n";
			echo "--They have the following reports: \n";
			foreach ($follower->getFollowers() as $follower2) {
				echo "----The follower is " . $follower2->getNameString() . "\n";
				echo "----They are " . $follower2->getAge() . " years old. ";
				echo "----They have the following reports: \n";
			}
		}
	}
}