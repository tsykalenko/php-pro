<?php

namespace App\Repositories\Books\DTOs;

use App\Enum\LangEnum;

class BooksStoreDTO
{
    public function __construct(
        protected string $name,
        protected int $year,
        protected LangEnum $lang,
        protected int $pages,
    ) {
    }


    public function getLang(): LangEnum
    {
        return $this->lang;
    }

    public function getPages(): int
    {
        return $this->pages;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getYear(): int
    {
        return $this->year;
    }

}
