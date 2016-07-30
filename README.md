Тестовое задание
----------------

### API

Выдача всех организаций находящихся в конкретном здании ([Проверить этот запрос](http://cd01621.tmweb.ru/api/combuild?build=10))
~~~
api/combuild?build=10
~~~
Ответ:
```php
    [
    {"title":"<Назвние организации 1>"},
    {"title":"Назвние организации 2>"},
     .
     .
     .
    {"title":"<Назвние организации n>"}
    ]
```

Список всех организаций, которые относятся к указанной рубрике ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrub?rubrick=15))
~~~
api/comrub?rubrick=12
~~~

Поиск организаций по радиусу (рассчет в декартовой системе) ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrad?radius=0.01&latitude=82.78&longitude=54.78))
~~~
api/comrad?radius=0.01&latitude=82.78&longitude=54.78
~~~

Поиск организаций в прямоугольной области (рассчет в декартовой системе) ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78))
~~~
api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78
~~~


Список зданий ([Проверить этот запрос](http://cd01621.tmweb.ru/api/builds))
~~~
api/builds
~~~

Поиск организаций по рубрике с учетом вложенных рубрик ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comsrub?rubrick=4))
~~~
api/comsrub?rubrick=4
~~~

Поиск организаций по названию ([Проверить этот запрос](http://cd01621.tmweb.ru/api/comtitle?title_company=ОАО АлмазЛифт))
~~~
api/comtitle?title_company=ОАО АлмазЛифт
~~~


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