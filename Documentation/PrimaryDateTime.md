PrimaryDateTime
---------------

PrimaryDateTime fix datetime field type, when you want to use it as primary key.

PHP DateTime object can't be converted to string, and Doctrine needs it for all primary key in UnitOfWork.

So, PrimaryDateTime just extends DateTime doctrine type and DateTime PHP object, to add __toString() method and allow DateTime to be used as primary key.

Installation
------------

Add primarydatetime field type to your configuration :

```yml
# app/config/config.yml
doctrine:
    dbal:
        types:
            primarydatetime: kujaff\DoctrineFieldTypes\Type\PrimaryDateTime
```

Usage
-----

Just add a primarydatetime property to your entity, like that :
```yml
# Resources/config/doctrine/MyEntity.orm.yml
Foo\BarBundle\Entity\MyEntity:
    id:
        myDate:
            type: primarydatetime
            id: true
```

[Back to index](../README.md)