<?php
class Person {
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;
  private $grandmotherma;
  private $grandfatherma;
  private $grandmotherpa;
  private $grandfatherpa;


  function __construct($name, $lastname, $age, $mother=null, $father=null, $grandmotherma=null, $grandfatherma=null, $grandmotherpa=null, $grandfatherpa=null,)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->grandmotherma = $grandmotherma;
    $this->grandfatherma = $grandfatherma;
    $this->grandmotherpa = $grandmotherpa;
    $this->grandfatherpa = $grandfatherpa;
    $this->hp = 100;
  }

  function sayHi($name) {
    return "hi, $name! I`m " . $this->name;
  }
  function setHp($hp) {
    if ($this->hp + $hp > 100) {
      $this->hp = 100;
    } else {
      $this->hp = $this->hp + $hp;
    }
  }
  function getHp() 
  {
    return $this->hp;
  }
  function getAge() 
  {
    return $this->age;
  }
  function getName() {
    return $this->name;
  }
  function getLastname() {
    return $this->lastname;
  }
  function getMother() {
    return $this->mother;
  }
  function getFather() {
    return $this->father;
  }
  function getGrandMotherMa() {
    return $this->grandmotherma;
  }
  function getGrandFatherMa() {
    return $this->grandfatherma;
  }
  function getGrandMotherPa() {
    return $this->grandmotherpa;
  }
  function getGrandFatherPa() {
    return $this->grandfatherpa;
  }

  function getInfo() {
    return "<h3>Пару слов о моих родных</h3>" . "Меня зовут " . $this->getName() . "<br> Моя фамилия " . $this->getLastname() . "<br> Мне " . $this->getAge() . " лет";
  }
}
$igor = new Person("Игорь", "Петров", 70);
$maria = new Person("Мария", "Петрова", 65);
$dmitri = new Person("Дмитрий", "Иванов", 72);
$valya = new Person("Валентина", "Иванова", 69);

$alex = new Person("Александр", "Иванов", 41, $valya, $dmitri);
$daria = new Person("Дарья", "Иванова", 41, $maria, $igor);

$makar = new Person("Макар", "Иванов", 15, $daria, $alex);

echo $makar->getInfo();
// echo $makar->getMother()->getFather()->getName();




// здоровье человека не может быть более 100 единиц
// $medKit = 50;
// $alex->setHp(- 30); //Упал
// echo $alex->getHp() . "<br>";
// $alex->setHp($medKit);  // Нашел аптечку
// echo $alex->getHp(); 