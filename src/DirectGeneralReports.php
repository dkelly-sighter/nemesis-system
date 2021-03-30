<?php

namespace Nemesis;

class DirectGeneralReports {
	/**
	 * @var Soldier[]
	 */
	private $directReports;

	/**
	 * @param Soldier ...$directReports
	 */
	public function __construct(
		Soldier ...$directReports
	) {
		$this->directReports = $directReports;
	}
}