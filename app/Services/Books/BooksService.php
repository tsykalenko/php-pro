<?php

namespace App\Services\Books;

use App\Repositories\Books\BooksRepository;
use App\Repositories\Books\DTOs\BooksDestroyDTO;
use App\Repositories\Books\DTOs\BooksIndexDTO;
use App\Repositories\Books\DTOs\BooksShowDTO;
use App\Repositories\Books\DTOs\BooksStoreDTO;
use App\Repositories\Books\DTOs\BooksUpdateDTO;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BooksService
{
    public function __construct(
        protected BooksRepository $bookRepository

    ) {
    }

    public function index(BooksIndexDTO $bookIndexDTO): JsonResponse
    {
        $result = $this->bookRepository->index($bookIndexDTO);
        return response()->json($result, ResponseAlias::HTTP_OK);
    }

    public function store(BooksStoreDTO $bookStoreDTO): JsonResponse
    {
        $result = $this->bookRepository->store($bookStoreDTO);
        return response()->json($result, ResponseAlias::HTTP_CREATED);
    }

    public function show(BooksShowDTO $booksShowDTO): JsonResponse
    {
        $result = $this->bookRepository->show($booksShowDTO);
        return response()->json($result, ResponseAlias::HTTP_OK);
    }

    public function update(BooksUpdateDTO $booksUpdateDTO): JsonResponse
    {
        $result = $this->bookRepository->update($booksUpdateDTO);
        return response()->json($result, ResponseAlias::HTTP_OK);
    }

    public function destroy(BooksDestroyDTO $booksDestroyDTO): JsonResponse
    {
        $result = $this->bookRepository->destroy($booksDestroyDTO);
        return response()->json($result, ResponseAlias::HTTP_NO_CONTENT);
    }

}
