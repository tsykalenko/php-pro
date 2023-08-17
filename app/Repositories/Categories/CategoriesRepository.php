<?php

namespace App\Repositories\Categories;

use App\Repositories\Categories\DTOs\CategoriesDestroyDTO;
use App\Repositories\Categories\DTOs\CategoriesIndexDTO;
use App\Repositories\Categories\DTOs\CategoriesShowDTO;
use App\Repositories\Categories\DTOs\CategoriesStoreDTO;
use App\Repositories\Categories\DTOs\CategoriesUpdateDTO;
use App\Repositories\Categories\Iterators\CategoriesIterator;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Collection;


class CategoriesRepository
{
    public function getAllData()
    {
        $result = DB::table('categories')
            ->select([
                'id',
                'name',
            ])
            ->get();
        return $result->map(function ($item) {
            return new CategoriesIterator($item);
        });
    }

    public function index(CategoriesIndexDTO $categoriesIndexDTO): Collection
    {
        $query = DB::table('categories');
        return $query->get();
    }

    public function store(CategoriesStoreDTO $categoriesStoreDTO): int
    {
        return DB::table('categories')
            ->insertGetId([
                'name' => $categoriesStoreDTO->getName(),
            ]);
    }

    public function show(CategoriesShowDTO $categoriesShowDTO): int
    {
        return DB::table('categories')
            ->insertGetId([
                'id' => $categoriesShowDTO->getId(),
            ]);
    }

    public function update(CategoriesUpdateDTO $categoriesUpdateDTO)
    {
        DB::table('categories')
            ->update([
                'name' => $categoriesUpdateDTO->getName(),

            ]);
    }

    public function destroy(CategoriesDestroyDTO $categoriesDestroyDTO): bool
    {
        return DB::table('categories')
            ->where('id', '=', $categoriesDestroyDTO->getId())
            ->delete();
    }

    public function getById(int $id): CategoriesIterator
    {
        return new CategoriesIterator(
            DB::table('categories')
                ->select([
                    'id',
                    'name',
                ])
                ->where('id', '=', $id)
                ->first()
        );
    }

}
