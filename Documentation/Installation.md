Composer
--------

```json
# composer.json
{
    "require": {
        "kujaff/doctrinefieldtypes": "2.*"
    }
}
```

Add types you need in your Doctrine config
------------------------------------------
```yml
# app/config/config.yml
doctrine:
    dbal:
        types:
            base64: kujaff\DoctrineFieldTypes\Type\Base64
            primarydatetime: kujaff\DoctrineFieldTypes\Type\PrimaryDateTime

[Back to index](../README.md)