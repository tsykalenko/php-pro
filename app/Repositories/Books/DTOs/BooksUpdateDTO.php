<?php

namespace App\Repositories\Books\DTOs;

class BooksUpdateDTO
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected int $year,
        protected string $lang,
        protected int $pages,
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


    public function getYear(): int
    {
        return $this->year;
    }


    public function getLang(): string
    {
        return $this->lang;
    }


    public function getPages(): int
    {
        return $this->pages;
    }


}
