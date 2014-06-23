<?php

namespace steevanb\DoctrineFieldTypes\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Field base64 encoded value
 */
class Base64 extends Type
{
    /**
     * Type name
     */
    const BASE64 = 'base64';

    /**
     * Return type name
     *
     * @return type
     */
    public function getName()
    {
        return self::BASE64;
    }

    /**
     * Gets the SQL declaration snippet for a field of this type
     *
     * @param array $fieldDeclaration The field declaration
     * @param AbstractPlatform $platform The currently used database platform
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $length = intval($fieldDeclaration['length']);
        if ($length > 0) {
            $length += ceil($length * 0.35);
        }
        return 'VARCHAR(' . $length . ')';
    }

    /**
     * Converts a value from its PHP representation to its database representation of this type
     *
     * @param mixed $value The value to convert
     * @param AbstractPlatform $platform The currently used database platform
     * @return mixed The database representation of the value
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value === null) ? null : base64_encode($value);
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
        return ($value === null) ? null : base64_decode($value);
    }
}