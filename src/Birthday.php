<?php

namespace Nemesis;

use DateTime;
use DateTimeInterface;

class Birthday {

	private $dateTime;

	/**
	 * @param DateTime $dateTime
	 */
	public function __construct(
		DateTime $dateTime
	) {
		$this->dateTime = $dateTime;
	}

	public function getDateTimeInterface() : DateTimeInterface {
		return $this->dateTime;
	}
}