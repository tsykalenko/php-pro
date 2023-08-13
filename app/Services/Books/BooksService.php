<?php

namespace App\Services\Books;

use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\DTOs\BooksDestroyDTO;
use App\Repositories\Books\DTOs\BooksIndexDTO;
use App\Repositories\Books\DTOs\BooksShowDTO;
use App\Repositories\Books\DTOs\BooksStoreDTO;
use App\Repositories\Books\DTOs\BooksUpdateDTO;


class BooksService
{
    public function __construct(
        protected BooksRepository $bookRepository

    ) {
    }

    public function index(BooksIndexDTO $bookIndexDTO): mixed
    {
        return $this->bookRepository->index($bookIndexDTO);
    }

    public function store(BooksStoreDTO $bookStoreDTO): mixed
    {
        return $this->bookRepository->store($bookStoreDTO);
    }

    public function show(BooksShowDTO $booksShowDTO): mixed
    {
        return $this->bookRepository->show($booksShowDTO);
    }

    public function update(BooksUpdateDTO $booksUpdateDTO): mixed
    {
        return $this->bookRepository->update($booksUpdateDTO);
    }

    public function destroy(BooksDestroyDTO $booksDestroyDTO): mixed
    {
        return $this->bookRepository->destroy($booksDestroyDTO);
    }

}
