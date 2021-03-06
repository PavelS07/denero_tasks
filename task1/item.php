<?php
/** 
* 1. Создать класс Item, который не наследуется. В конструктор класса передается ID объекта.
* 2. Описать свойства (int) id, (string) name, (int) status, (bool) changed. Свойства доступны только внутри класса.
* 3. Создать метод init(). Предусмотреть одноразовый вызов метода.
* 4. Метод доступен только внутри класса.
* 5. Метод получает из таблицы objects. данные name и status и заполняет их в свойства экземпляра 
* (реализация работы с базой не требуется, представим что класс уже работает с бд). 
* Эти данные также необходимо хранить в сыром виде внутри объекта, до сохранения. 
* 6. Сделать возможным получение свойств объекта, используя magic methods.
* 7. Сделать возможным задание свойств объекта, используя magic methods с проверкой вводимого значения 
* на заполненность и тип значения. Свойство ID не поддается записи.
* 8. Создать метод save().
* 9. Метод публичный.
* 10.Метод сохраняет установленные значения name и status в случае, если свойства объекта были изменены извне.
* 11. Класс должен быть задокументирован в стиле PHPDocumentor.
* @author Sobolev__ <pav.sobolew2015@yandex.ru>
* @version 1.0
* @package files
*/
/**
* Класс Item
* @package files
* @subpackage classes
*/
final class Item 
{
static $flag = false;

private $id;
private $name; 
private $status; 
private $changed; 

/**
* Магический метод __construct
* @param string $id_object Первый параметр метода
* @param string $id_object Значение для установки в {@link $$id_object}
* @return void
*/
function __construct($id)
{
  $this->id = (int) $this->id;
  $this->name = (string) $this->name;
  $this->status = (int) $this->status;
  $this->changed = (bool) $this->changed;
}

/**
* Магический метод __get
* @param string $property Первый параметр метода
* @return string
*/
public function __get($property)
{
  if (property_exists($this, $property)) {
    return $this->$property;
  } else {
    throw new Exception('Свойства не сущесвтует.');
  }
}

/**
* Магический метод __set
* @param string $property Первый параметр метода
* @param string $value Второй параметр метода
* @return void or exception  
*/
public function __set($property, $value)
{
  if (property_exists($this, $property)) {
    if($value === "") {
      throw new Exception('Свойство не должно иметь пустое значение.');
    } else {
      switch($property) {
        case "id":
          throw new Exception('Свойство id закрыто для записи.');
          break;
        case "name":
          if(is_string($value)) {
            $this->$property = $value;
          } else {
            throw new Exception('Свойство должно быть типа string.');
          }
          break;
        case "status":
          if(is_int($value)) {
            $this->$property = $value;
          } else {
            throw new Exception('Свойство должно быть типа int.');
          }
          break;
        case "changed":
          if(is_bool($value)) {
            $this->$property = $value;
          } else {
            throw new Exception('Свойство должно быть типа bool.');
          }
          break;
      }
    }
  } 

}

/**
* Метод save публичный сохраняет данные, измененные вне класса
* @param string $name Значение для установки в {@link $name}
* @param string $status Значение для установки в {@link $status}
* @param string $name Первый параметр метода
* @param string $status Второй параметр метода
* @return void
*/
public function save($name, $status)
{
  $this->name = (string) $name;
  $this->status = (int) $status;
}

/**
* Метод init приватный иницилизирует данные, выполняется один раз
* @static var int $count Переменная счетчик
* @param string $name Значение для установки в {@link $name}
* @param string $status Значение для установки в {@link $status}
* @param string $name Первый параметр метода
* @param string $status Второй параметр метода
* @return bool
*/
private function init($name, $status)
{
  if(self::$flag === true) return false;

  $this->name = $name;
  $this->status = $status;

  self::$flag = true;

  return true;
}
}
?>