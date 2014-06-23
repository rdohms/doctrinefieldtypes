Installation
------------
```yml
# app/config/config.yml
doctrine:
    dbal:
        types:
            base64: kujaff\DoctrineFieldTypes\Type\Base64
```

Usage
-----

Just add a base64 property to your entity, like that :
```yml
# Resources/config/doctrine/MyEntity.orm.yml
Foo\BarBundle\Entity\MyEntity:
    fields:
        remotePassword:
            type: base64
            length: 100
```
Notice final lenth in database will be 33% greater than defined by length, cause of base64 transformation of your string.

[Back to index](../README.md)