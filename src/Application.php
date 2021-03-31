<?php

namespace Nemesis;

class Application {
	/**
	 * @var LeaderFactory
	 */
	private $leaderFactory;
	/** @var HierarchyPrinter */
	private $hierarchyPrinter;

	public function __construct(
		LeaderFactory $leaderFactory,
		HierarchyPrinter $hierarchyPrinter
	) {
		$this->leaderFactory = $leaderFactory;
		$this->hierarchyPrinter = $hierarchyPrinter;
	}

	public function run() : void {
		$leader = $this->leaderFactory->make();
		$this->printHierarchy($leader);

//		$this->askForInput();
	}

	protected function askForInput(): void {
		echo "Are you sure you want to do this?  Type 'yes' to continue: ";
		$handle = fopen("php://stdin", "r");
		$line = fgets($handle);
		if (trim($line) != 'yes') {
			echo "ABORTING!\n";
			exit;
		}
		fclose($handle);
		echo "\n";
		echo "Thank you, continuing...\n";
	}

	/**
	 * @param Leader $leader
	 */
	protected function printHierarchy(Leader $leader): void {
		$this->hierarchyPrinter->printHierarchy($leader);
	}


}