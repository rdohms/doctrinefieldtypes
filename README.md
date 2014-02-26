doctrinebundle
==============

Add fields type to Doctrine

Installation
============

Composer :

    "kujaff/doctrinebundle": "dev-master"

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


Add types you want in app/config/config.yml :

    doctrine:
        dbal:
            types:
                base64: kujaff\DoctrineBundle\Types\Base64


Uses
====

Simply define your field type like it :

    # Resources/config/doctrine/MyEntity.orm.yml
    namespace\MyBundle\Entity\MyEntity:
        fields:
            mybase64:
                type: base64
                length: 30 # your length, real length will be 35% more due to base64 encoding
                nullable: true/false
