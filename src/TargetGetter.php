<?php

namespace Nemesis;

class TargetGetter {

	/**
	 * @param Hierarchy $hierarchy
	 *
	 * @return Leader
	 */
	public function getTarget(Hierarchy $hierarchy) : Leader {
		echo "\n Who would you like to kill? ";
		$handle = fopen("php://stdin", "r");
		$line = fgets($handle);
		$trimmedLine = trim($line);
		fclose($handle);

		try {
			$target = $hierarchy->getSoldier($trimmedLine);
		} catch (SoldierNotFoundException $soldierNotFoundException) {
		}
//
//		$general = $hierarchy->getLeader();
//		$followers = $general->getFollowers();
//		if (empty($followers)) {
//			$target = $general;
//		} else {
//			$target = $general->getFollowers()[0];
//		}
//		return $target;
	}

}