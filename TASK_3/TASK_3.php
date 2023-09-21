<?php

class UserAuthenticated // Аутентифікація користувача
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected string $password,
        protected string $role,
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

}

class DisplayProfileUser // Відображення профілю користувача
{
    public function userProfileDisplay(UserAuthenticated $id): string
    {
        return 'Імʼя користувача: ' . $id->getName() . PHP_EOL . 'Роль користувача: ' . $id->getRole();
    }
}

$user1 = new UserAuthenticated(1, 'Oleksiy', 'Qwerty', 'admin');

$displayUser1 = new DisplayProfileUser();

echo $displayUser1->UserProfileDisplay($user1);
echo PHP_EOL;
echo PHP_EOL;

class Order // Обробка замовлення
{
    public function __construct(
        protected int $id,
        protected string $name,
    ) {
    }


    public function getId(): int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }
}

class DisplayInfoOrder // Відображення інформації про замовлення
{
    public function orderInfoDisplay(Order $id): string
    {
        return 'Назва товару: ' . $id->getName();
    }
}

$order1 = new Order(1, 'Cable');
$displayOrder1 = new DisplayInfoOrder();
echo $displayOrder1->orderInfoDisplay($order1);
echo PHP_EOL;
echo PHP_EOL;

class DataManager // Збереження даних в базі даних
{
    public function __construct(
        protected int $id,
        protected string $data,
    ) {
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getData(): string
    {
        return $this->data;
    }
}

class DisplayDataManager // Відображення даних на веб-сторінці
{
    public function managerDataDisplay(DataManager $manager): string
    {
        return 'Ось усі дані: ' . $manager->getData();
    }
}

$dataManager1 = new DataManager(1, 'Це і є усі дані)))');
$displayDataManager1 = new displayDataManager();
echo $displayDataManager1->managerDataDisplay($dataManager1);

echo PHP_EOL;
echo PHP_EOL;


interface WriteFile
{
    public function writing(
        string $filename,
        string $ext,
    ): bool;
}

class TxtWriting implements WriteFile
{ // Запис даних в файл
    public function writing(string $filename, string $ext,): bool
    {
        if ($ext === 'txt') {
            return true; // функціонал запису файлів типу txt
        }
        return false;
    }
}

class CsvWriting implements WriteFile
{
    public function writing(string $filename, string $ext,): bool
    {
        if ($ext === 'csv') {
            return true;
        }
        return false;
    }
}

interface ReadFile
{
    public function reading(
        string $ext
    ): bool;
}

class TxtReading implements ReadFile
{

    public function reading(string $ext): bool
    {
        if ($ext === 'txt') {
            return true; // Читання запису файлів типу txt
        }
        return false; //  Читання запису файлів інших типів
    }
}

class CsvReading implements ReadFile
{
    public function reading(string $ext): bool
    {
        if ($ext === 'csv') {
            return true; // Читання запису файлів типу txt
        }
        return false; //  Читання запису файлів інших типів
    }
}

interface GenerateReport
{
    public function generate(
        string $data,
        string $format,
    ): bool;

}

class ReportGenPdf implements GenerateReport
{
    public function generate(string $data, string $format): bool
    {
        if ($format === 'pdf') {
            return true;
        }
        return false;
    }
}

class ReportGenCsv implements GenerateReport
{
    public function generate(string $data, string $format): bool
    {
        if ($format === 'csv') {
            return true;
        }
        return false;
    }
}


interface OrderProcessor
{
    public function processOrder(string $data, string $format): bool;
}

class Product implements OrderProcessor
{
    protected string $order;

    public function processOrder(string $data, string $format): bool
    {
        if ($this->order == 'product') {
            $this->processOrder('order with type product', 'pdf');
        }
        return false;
    }
}

class Service implements OrderProcessor
{
    protected string $order;

    public function processOrder(string $data, string $format): bool
    {
        if ($this->order == 'service') {
            $this->processOrder('order with type service', 'CSV');
        }
        return false;
    }
}

class Delivery implements OrderProcessor
{
    protected string $order;

    public function processOrder(string $data, string $format): bool
    {
        if ($this->order == 'delivery') {
            $this->processOrder('order with type delivery', 'pdf');
        }
        return false;
    }
}
