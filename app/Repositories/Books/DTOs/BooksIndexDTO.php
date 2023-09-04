<?php

namespace App\Repositories\Books\DTOs;

use App\Enum\LangEnum;
use Carbon\Carbon;

class BooksIndexDTO
{
    public function __construct(
        protected Carbon $startDate,
        protected Carbon $endDate,
        protected int $year,
        protected LangEnum $lang,
    ) {
    }


    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }


    public function getEndDate(): Carbon
    {
        return $this->endDate;
    }


    public function getYear(): int
    {
        return $this->year;
    }


    public function getLang(): LangEnum
    {
        return $this->lang;
    }
}
