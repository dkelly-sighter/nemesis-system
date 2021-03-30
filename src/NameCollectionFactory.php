<?php

namespace Nemesis;

use Nubs\RandomNameGenerator\All;

class NameCollectionFactory {

	private $nameFactory;

	public function __construct(
		NameFactory $nameFactory
	) {
		$this->nameFactory = $nameFactory;
	}

	public function make() : NameCollection {
		$generator = All::create();
		$name = $generator->getName();
		return new NameCollection($name);
	}

}