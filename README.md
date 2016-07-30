Тестовое задание
----------------

### API

Поиск организаций по названию
~~~
api/comtitle?title_company=ОАО АлмазЛифт
~~~
[Проверить этот запрос](http://cd01621.tmweb.ru/api/comtitle?title_company=ОАО АлмазЛифт)

Поиск по радиусу
~~~
api/comrad?radius=0.01&latitude=82.78&longitude=54.78
~~~
[Проверить этот запрос](http://cd01621.tmweb.ru/api/comrad?radius=0.01&latitude=82.78&longitude=54.78)

Поиск в прямоугольной области
api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78
[Проверить этот запрос](http://cd01621.tmweb.ru/api/comrect?x=0.02&y=0.024&latitude=82.78&longitude=54.78)

Поиск организаций по рубрике с учетом вложенных рубрик
~~~
api/comsrub?rubrick=4
~~~
[Проверить этот запрос](http://cd01621.tmweb.ru/api/comsrub?rubrick=4)


### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```