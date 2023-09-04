<?php

namespace App\Repositories\Books;

use App\Repositories\Books\DTOs\BooksDestroyDTO;
use App\Repositories\Books\DTOs\BooksIndexDTO;
use App\Repositories\Books\DTOs\BooksShowDTO;
use App\Repositories\Books\DTOs\BooksStoreDTO;
use App\Repositories\Books\DTOs\BooksUpdateDTO;
use App\Repositories\Books\Iterators\BooksIterator;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;

class BooksRepository
{
    public function getAllData()
    {
        $lastId = 2;
        $result = DB::table('books')
            ->select([
                'books.id',
                'books.name',
                'year',
                'created_at',
                'category_id',
                'categories.name as category_name',
            ])
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->orderBy('books.id')
            ->limit(2)
            ->where('books.id', '>', $lastId)
            ->get();


        return $result->map(function ($item) {
            return new BooksIterator($item);
        });
    }

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
        DB::table('books')
            ->update([
                'name' => $booksUpdateDTO->getName(),
                'year' => $booksUpdateDTO->getYear(),
                'lang' => $booksUpdateDTO->getLang(),
                'pages' => $booksUpdateDTO->getPages(),
            ]);
    }

    public function destroy(BooksDestroyDTO $booksDestroyDTO): bool
    {
        return DB::table('books')
            ->where('id', '=', $booksDestroyDTO->getId())
            ->delete();
    }

    public function getById(int $id): BooksIterator
    {
        return new BooksIterator(
            DB::table('books')
                ->select([
                    'id',
                    'name',
                    'year',
                    'created_at',
                ])
                ->where('id', '=', $id)
                ->first()
        );
    }

}
