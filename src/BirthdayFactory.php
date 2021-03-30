<?php

namespace Nemesis;

use DateTime;

class BirthdayFactory {

	public function make() : Birthday {
		$dateTime = new DateTime('2000-02-03');
		return new Birthday($dateTime);
	}

}