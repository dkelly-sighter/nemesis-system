<?php

namespace Nemesis;

use DateTime;

class BirthdayFactory {

	public function make() : Birthday {
		$int = mt_rand(10000,1262055681);
		$string = date("Y-m-d H:i:s", $int);
		$dateTime = new DateTime($string);
		return new Birthday($dateTime);
	}

}