<?php

namespace Nemesis;

class SoldierBuilderFactory {
	/**
	 * @var NameCollectionFactory
	 */
	private $nameCollectionFactory;
	/**
	 * @var BirthdayFactory
	 */
	private $birthdayFactory;

	public function __construct(
		NameCollectionFactory $nameCollectionFactory,
		BirthdayFactory $birthdayFactory
	) {
		$this->nameCollectionFactory = $nameCollectionFactory;
		$this->birthdayFactory = $birthdayFactory;
	}

	public function make(): LeaderBuilder {
		$nameCollection = $this->nameCollectionFactory->make();
		$birthday = $this->birthdayFactory->make();
		$leaderBuilder = new LeaderBuilder(
			$nameCollection,
			$birthday
		);
		return $leaderBuilder;
	}

}