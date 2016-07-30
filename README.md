Тестовое задание
----------------

### API

Выдача всех организаций находящихся в конкретном здании ([Проверить этот запрос](http://cd01621.tmweb.ru/api/combuild?build=10))
~~~
api/combuild?build=<id здания>
api/combuild?build=5
~~~
Ответ:
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"<Назвние организации 2>"},
     ...
    {"title":"<Назвние организации n>"}
    ]
```

Список всех организаций, которые относятся к указанной рубрике ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrub?rubrick=4))
~~~
api/comrub?rubrick=<id рубрики>
api/comrub?rubrick=10
~~~
Ответ:
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"<Назвние организации 2>"},
     ...
    {"title":"<Назвние организации n>"}
    ]
```

Поиск организаций по радиусу (рассчет в декартовой системе) ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrad?radius=0.01&latitude=82.78&longitude=54.78))
~~~
api/comrad?radius=<радиус>&latitude=<ширина>&longitude=<долгота>
api/comrad?radius=0.01&latitude=82.78&longitude=54.78
~~~
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"<Назвние организации 2>"},
     ...
    {"title":"<Назвние организации n>"}
    ]
```

Поиск организаций в прямоугольной области (рассчет в декартовой системе) ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78))
~~~
api/comrect?x=<значение x>&y=<значение y>&latitude=<ширина>&longitude=<долгота>
api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78
~~~
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"<Назвние организации 2>"},
     ...
    {"title":"<Назвние организации n>"}
    ]
```

Список зданий ([Проверить этот запрос](http://cd01621.tmweb.ru/api/builds))
~~~
api/builds
~~~
```php
    [
    {"address":"<Адрес здания 1>"},
    {"address":"<Адрес здания 2>"},
     ...
    {"address":"<Адрес здания m>"},
    ]
```

Информации об организациях по их идентификаторам ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comid?id_company=8))
~~~
api/comid?id_company=<ID компании>
~~~
```php

    {
        "id_company":"<id>",
        "title":"<Название комании>",
        "address":"<Адрес комании>",
        "phones":[
            {"number":"<Телефон 1>"},
            ...
            {"number":"<Телефон n>"}
        ],
        "rubrick":[
            {"rubrick":"<название рубрики 1>"},
            ...
            {"rubrick":"<название рубрики m>"}
        ]
    }

```

Поиск организаций по названию ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comtitle?title_company=ОАО АлмазЛифт))
~~~
api/comtitle?title_company=<часть или полное название комании>
api/comtitle?title_company=ОАО АлмазЛифт
~~~

Список всех организаций, которые относятся к указанной рубрике, с учетом вложенности рубрик
 ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comsrub?rubrick=4))
~~~
api/comsrub?rubrick=<id_рубрики>
api/comsrub?rubrick=4
~~~
Ответ:
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"<Назвние организации 2>"},
     ...
    {"title":"<Назвние организации n>"}
    ]
```


### База данных

База данных создается вручную.
Настроить подключение к БД в файле `config/db.php` , например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=testgis',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

### Структура и тестовые данные

Для заполнения структуры БД и генерации тестовых данных, нужно 
из командной строки выполнить миграцию
~~~
yii migrate
~~~

Другой вариант - восстановить дамп БД. Дамп находится в `data/dump_.sql`

### P.S.

Реализовано на [yii2-app-basic](https://github.com/yiisoft/yii2-app-basic)