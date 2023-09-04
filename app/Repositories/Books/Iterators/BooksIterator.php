<?php

namespace App\Repositories\Books\Iterators;

use App\Enum\LangEnum;
use App\Repositories\Categories\Iterators\CategoriesIterator;
use Carbon\Carbon;

class BooksIterator
{
    protected int $id;
    protected string $name;
    protected int $year;
    protected string $lang;
    protected int $pages;
    protected CategoriesIterator $category;
    protected Carbon $createdAt;

    /**
     * @return int
     */
    public function getCategory(): CategoriesIterator
    {
        return $this->category;
    }

    public function __construct(object $data)
    {
        $this->id = $data->id;
        $this->name = $data->name;
        $this->year = $data->year;
        $this->createdAt = new Carbon($data->created_at);
        $this->category = new CategoriesIterator(
            $data->category_id,
            $data->category_name,
        );
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

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }
}
