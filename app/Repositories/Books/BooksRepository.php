<?php

namespace App\Repositories\Books;

use App\Repositories\Books\DTOs\BooksDestroyDTO;
use App\Repositories\Books\DTOs\BooksIndexDTO;
use App\Repositories\Books\DTOs\BooksShowDTO;
use App\Repositories\Books\DTOs\BooksStoreDTO;
use App\Repositories\Books\DTOs\BooksUpdateDTO;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;

class BooksRepository
{
    public function index(BooksIndexDTO $bookIndexDTO): Collection
    {
        $query = DB::table('books')
            ->whereBetween('created_at', [
                $bookIndexDTO->getStartDate(),
                $bookIndexDTO->getEndDate(),
            ]);
        if ($bookIndexDTO->getYear()) {
            $query->where('year', '=', $bookIndexDTO->getYear());
        }
        if ($bookIndexDTO->getLang()) {
            $query->where('lang', '=', $bookIndexDTO->getLang());
        }
        return $query->get();
    }

    public function store(BooksStoreDTO $bookStoreDTO): int
    {
        return DB::table('books')
            ->insertGetId([
                'name' => $bookStoreDTO->getName(),
                'year' => $bookStoreDTO->getYear(),
                'lang' => $bookStoreDTO->getLang(),
                'pages' => $bookStoreDTO->getPages(),
            ]);
    }


    public function show(BooksShowDTO $booksShowDTO): int
    {
        return DB::table('books')
            ->insertGetId([
                'id' => $booksShowDTO->getId(),
            ]);
    }

    public function update(BooksUpdateDTO $booksUpdateDTO)
    {
        return DB::table('books')
            ->insertGetId([
                'name' => $booksUpdateDTO->getName(),
                'year' => $booksUpdateDTO->getYear(),
                'lang' => $booksUpdateDTO->getLang(),
                'pages' => $booksUpdateDTO->getPages(),
            ]);
    }

    public function destroy(BooksDestroyDTO $booksDestroyDTO)
    {
        return DB::table('books')
            ->delete([
                'id' => $booksDestroyDTO->getId(),
            ]);
    }


}
