<?php

namespace App\Services\Categories;

use App\Repositories\Categories\CategoriesRepository;
use App\Repositories\Categories\DTOs\CategoriesDestroyDTO;
use App\Repositories\Categories\DTOs\CategoriesIndexDTO;
use App\Repositories\Categories\DTOs\CategoriesShowDTO;
use App\Repositories\Categories\DTOs\CategoriesStoreDTO;
use App\Repositories\Categories\DTOs\CategoriesUpdateDTO;

class CategoriesService
{
    public function __construct(
        protected CategoriesRepository $categoriesRepository,
    ) {
    }

    public function index(CategoriesIndexDTO $categoriesIndexDTO): mixed
    {
        return $this->categoriesRepository->index($categoriesIndexDTO);
    }

    public function store(CategoriesStoreDTO $categoriesStoreDTO): mixed
    {
        return $this->categoriesRepository->store($categoriesStoreDTO);
    }

    public function show(CategoriesShowDTO $categoriesShowDTO): mixed
    {
        return $this->categoriesRepository->show($categoriesShowDTO);
    }

    public function update(CategoriesUpdateDTO $categoriesUpdateDTO): mixed
    {
        $this->categoriesRepository->update($categoriesUpdateDTO);
        return $this->categoriesRepository->getById($categoriesUpdateDTO->getId());
    }

    public function destroy(CategoriesDestroyDTO $categoriesDestroyDTO): mixed
    {
        return $this->categoriesRepository->destroy($categoriesDestroyDTO);
    }
}
