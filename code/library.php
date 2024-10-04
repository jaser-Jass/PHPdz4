<?php

abstract class Book {
  protected $title;
  protected $author;
  protected $publicationYear;
  protected $readCount;

  public function __construct($title, $author, $publicationYear) {
      $this->title = $title;
      $this->author = $author;
      $this->publicationYear = $publicationYear;
      $this->readCount = 0;
  }

  // Метод получения на руки
  abstract public function getOnHand();

  // Метод для увеличения счетчика прочтений
  public function incrementReadCount() {
      $this->readCount++;
  }

  // Метод для получения информации о книге
  public function getInfo() {
      return "Название: $this->title, Автор: $this->author, Год публикации: $this->publicationYear, Кол-во прочтений: $this->readCount";
  }
}


class DigitalBook extends Book {
  private $downloadLink;

  public function __construct($title, $author, $publicationYear, $downloadLink) {
      parent::__construct($title, $author, $publicationYear);
      $this->downloadLink = $downloadLink;
  }

  public function getOnHand() {
      return "Ссылка на скачивание: $this->downloadLink";
  }
}

class PhysicalBook extends Book {
  private $libraryAddress;

  public function __construct($title, $author, $publicationYear, $libraryAddress) {
      parent::__construct($title, $author, $publicationYear);
      $this->libraryAddress = $libraryAddress;
  }

  public function getOnHand() {
      return "Адрес библиотеки: $this->libraryAddress";
  }
}

$digitalBook = new DigitalBook("Цифровая магия", "Алексей Петров", 2021, "http://example.com/download");
$physicalBook = new PhysicalBook("Тайны пыльной библиотеки", "Ирина Смирнова", 2020, "ул. Библиотечная, 10");

$digitalBook->incrementReadCount();
$physicalBook->incrementReadCount();
$physicalBook->incrementReadCount();

echo $digitalBook->getInfo() . "\n"; // Выводит информацию о цифровой книге
echo $digitalBook->getOnHand() . "\n"; // Выводит ссылку на скачивание

echo $physicalBook->getInfo() . "\n"; // Выводит информацию о физической книге
echo $physicalBook->getOnHand() . "\n"; // Выводит адрес библиотеки