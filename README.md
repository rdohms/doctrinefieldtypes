doctrinebundle
==============

Add fields type to Doctrine

Installation
============

Composer :

    # composer.json
    {
        "require": {
            # -----
            "kujaff/doctrinebundle": "dev-master"
        }
    }

Add bundle to your AppKernel :

    # app/config/AppKernel.php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // -----
                new kujaff\DoctrineBundle\DoctrineBundle(),
            );
        }
    }


Add types you need in your Doctrine config :

    # app/config/config.yml
    doctrine:
        dbal:
            types:
                base64: kujaff\DoctrineBundle\Types\Base64
                primarydatetime: kujaff\DoctrineBundle\Types\PrimaryDateTime


Base64
======

Base64 field type will save a base64 encoded version of your value, and decode it to the basic string when you get your entity :

    # Resources/config/doctrine/MyEntity.orm.yml
    namespace\MyBundle\Entity\MyEntity:
        fields:
            mybase64:
                type: base64
                length: 30 # your length, real length will be 35% more due to base64 encoding
                nullable: true/false

PrimaryDateTime
===============

PrimaryDateTime fix datetime field type, when you want to use it as primary key.

PHP DateTime object can't be converted to string, and Doctrine needs it for all primary key in UnitOfWork.

So, PrimaryDateTime just extends DateTime doctrine type and DateTime PHP object, to as __toString() method and allow DateTime to be used as primary key.

    # Resources/config/doctrine/MyEntity.orm.yml
    namespace\MyBundle\Entity\MyEntity:
        id:
            myDate:
                type: primarydatetime
                id: true