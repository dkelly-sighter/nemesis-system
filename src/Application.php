<?php

namespace Nemesis;

class Application {
	/**
	 * @var HierarchyPrinter
	 */
	private $hierarchyPrinter;
	/**
	 * @var HierarchyFactory
	 */
	private $hierarchyFactory;
	/**
	 * @var TargetGetter
	 */
	private $targetGetter;

	/**
	 * @param HierarchyPrinter $hierarchyPrinter
	 * @param HierarchyFactory $hierarchyFactory
	 * @param TargetGetter     $targetGetter
	 */
	public function __construct(
		HierarchyPrinter $hierarchyPrinter,
		HierarchyFactory $hierarchyFactory,
		TargetGetter $targetGetter
	) {
		$this->hierarchyPrinter = $hierarchyPrinter;
		$this->hierarchyFactory = $hierarchyFactory;
		$this->targetGetter = $targetGetter;
	}

	public function run() : void {
		$hierarchy = $this->hierarchyFactory->make();
		$this->hierarchyPrinter->printHierarchy($hierarchy);

		$continue = true;
		while ($continue == true) {
			$continue = $this->update($hierarchy);
		}

		echo "\n Thanks for playing \n";
	}

	protected function update(Hierarchy $hierarchy) : bool {
		$continue = true;
		echo "\n Would you like to kill someone? Type 'yes' to continue: ";
		$handle = fopen("php://stdin", "r");
		$line = fgets($handle);
		if (trim($line) != 'yes') {
			$continue = false;
			return $continue;
		}
		fclose($handle);

		$target = $this->targetGetter->getTarget($hierarchy);
		echo "\n Killing leader " . $target->getNameString() . ". \n";
		$target->die();
		echo "\n Death to leader \n\n";

		if ($hierarchy->isHierarchyDead()) {
			echo " You have won ";
			$continue = false;
		} else {
			$this->hierarchyPrinter->printHierarchy($hierarchy);
			$hierarchy->updateHierarchy();
		}
		return $continue;
	}

}