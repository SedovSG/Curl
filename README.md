# cUrl
Обёртка для работы с cURL

## Использование

### Подключение
```php
use Curl;

$url = 'https://api.yandex.ru';
 
$curl = new Curl();
```
### GET-запрос
  
```php
$str = $curl->get($url);
```

### POST-запрос

```php
$str = $curl->post($url, ['id' => 2, ...]);
```

### PUT-запрос

```php
$str = $curl->put($url, ['id' => 84, ...]);
```

### DELETE-запрос

```php
$str = $curl->delete($url, ['id' => 12]);
```
