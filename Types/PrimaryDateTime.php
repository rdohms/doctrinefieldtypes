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
    /**
     * Type name
     */
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
     * Converts a value from its database representation to its PHP representation of this type
     *
     * @param mixed $value The value to convert
     * @param AbstractPlatform $platform The currently used database platform
     * @return mixed The PHP representation of the value
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