<?php

namespace kujaff\DoctrineBundle\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeType;
use kujaff\DoctrineBundle\Entity\PrimaryDateTime as PrimaryDateTimeEntity;

/**
 * Field DateTime with __toString to be used as primary key
 */
class PrimaryDateTime extends DateTimeType
{
	const PRIMARYDATETIME = 'primarydatetime';

	/**
	 * Return type name
	 *
	 * @return type
	 */
	public function getName()
	{
		return self::PRIMARYDATETIME;
	}

	/**
	 * Convert SQL field to PHP var
	 *
	 * @param string $value
	 * @param AbstractPlatform $platform
	 * @return PrimaryDateTimeEntity
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform)
	{
		$dateTime = parent::convertToPHPValue($value, $platform);

		if (!$dateTime) {
			return $dateTime;
		}

		return new PrimaryDateTimeEntity('@' . $dateTime->format('U'));
	}

}
