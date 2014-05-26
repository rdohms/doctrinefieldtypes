<?php

namespace kujaff\DoctrineBundle\Entity;

/**
 * DateTime can be defined as primary key
 * Doctrine needs to transform each primary key into string, and DataTime PHP object can't be
 * So, just add __toString to DateTime PHP object
 */
class PrimaryDateTime extends \DateTime
{

	public function __toString()
	{
		return $this->format('U');
	}

}