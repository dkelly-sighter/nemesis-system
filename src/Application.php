<?php

namespace Nemesis;

use DateTime;

class Application {
	/**
	 * @var LeaderFactory
	 */
	private $leaderFactory;

	/**
	 */
	public function __construct(
		LeaderFactory $leaderFactory
	) {
		$this->leaderFactory = $leaderFactory;
	}

	public function run() : void {
		$leader = $this->leaderFactory->make();
		$leader->getInfo();

		$this->askForInput();
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


}