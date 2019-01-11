<?php
/**
 * Curl (https://www.omnisoft.pro/)
 *
 * @author     Седов Станислав, <SedovSG@yandex.ru>
 * @copyright  Copyright (c) 2016 OmniSoft. (http://www.omnisoft.pro)
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 */

declare(strict_types = 1);

/**
 * Класс работы с cURL.
 *
 * @category   PHP/Curl
 * @package    Curl
 * @author     Седов Станислав, <SedovSG@yandex.ru>
 * @copyright  Copyright (c) 2016 OmniSoft. (http://www.omnisoft.pro)
 * @license    https://opensource.org/licenses/BSD-3-Clause New BSD License
 * @version    1.0.0
 */
class Curl
{
  /** @var array Заголовки запроса */
  protected $headers = [];
  
  /**
   * Метод создаёт экземпляр базового объекта класса контроллера.
   * @param  array $headers Заголовки
   * @throws \ErrorException Отсутствует библиотека cURL
   * @return void
   */
  public function __construct(array $headers = [])
  {
    if(!extension_loaded('curl')) {
      throw new \ErrorException('Отсутствует библиотека cURL');
    }

    $this->headers = $headers;
  }

  /**
   * Метод получает данные через GET
   * @param  string $url URL-адрес
   * @throws \ErrorException Ошибка создания объекта cURL
   * @return object|false
   */
  public function get($url)
  {
    $ch = curl_init($url);

    if($ch == false)
    {
      throw new \ErrorException('Ошибка создания объекта cURL');  
    }

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");                                                                                                                    
    $result = curl_exec($ch);

    if(curl_errno($ch) != 0)
    {
      throw new \ErrorException(curl_error($ch));  
    }
    
    curl_close($ch);
    return $result;
  }
  
  /**
   * Метод получает данные через POST
   * @param  string $url    URL-адрес
   * @param  array  $params Параметры запроса
   * @throws \ErrorException Ошибка создания объекта cURL
   * @return object|false
   */
  public function post($url, $params)
  {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_URL,$url);

    if($ch == false)
    {
      throw new \ErrorException('Ошибка создания объекта cURL');  
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt($ch, CURLOPT_POST, count(http_build_query($params)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));    

    $output = curl_exec($ch);

    if(curl_errno($ch) != 0)
    {
      throw new \ErrorException(curl_error($ch));  
    }

    curl_close($ch);
    return $output;
  }

  /**
   * Метод получает данные через PUT
   * @param  string $url    URL-адрес
   * @param  array  $params Параметры запроса
   * @throws \ErrorException Ошибка создания объекта cURL
   * @return object|false
   */
  public function put($url, $params)
  {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

    if($ch == false)
    {
      throw new \ErrorException('Ошибка создания объекта cURL');  
    }

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt($ch, CURLOPT_POST, count(http_build_query($params)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));    

    $output = curl_exec($ch);

    if(curl_errno($ch) != 0)
    {
      throw new \ErrorException(curl_error($ch));  
    }

    curl_close($ch);
    return $output;
  }

  /**
   * Метод получает данные через DELETE
   * @param  string $url    URL-адрес
   * @param  array  $params Параметры запроса
   * @throws \ErrorException Ошибка создания объекта cURL
   * @return object|false
   */
  public function delete($url, $params)
  {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

    if($ch == false)
    {
      throw new \ErrorException('Ошибка создания объекта cURL');  
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
    curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt($ch, CURLOPT_POST, count(http_build_query($params)));
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));    

    $output = curl_exec($ch);

    if(curl_errno($ch) != 0)
    {
      throw new \ErrorException(curl_error($ch));  
    }

    curl_close($ch);
    return $output;
  }

}
