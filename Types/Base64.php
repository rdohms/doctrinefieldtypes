<?php
namespace kujaff\DoctrineBundle\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Field base64 encoded value
 */
class Base64 extends Type
{
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
	 * {@inherited}
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
	 * {@inherited}
	 */
	public function convertToDatabaseValue($value, AbstractPlatform $platform)
	{
		return ($value === null) ? null : base64_encode($value);
	}

	/**
	 * {@inherited}
	 */
	public function convertToPHPValue($value, AbstractPlatform $platform)
	{
		return ($value === null) ? null : base64_decode($value);
	}

}
