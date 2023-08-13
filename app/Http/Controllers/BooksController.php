<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BooksDestroyRequest;
use App\Http\Requests\Book\BooksIndexRequest;
use App\Http\Requests\Book\BooksShowRequest;
use App\Http\Requests\Book\BooksStoreRequest;
use App\Http\Requests\Book\BooksUpdateRequest;
use App\Http\Resources\BooksResource;
use App\Repositories\Books\DTOs\BooksDestroyDTO;
use App\Repositories\Books\DTOs\BooksIndexDTO;
use App\Repositories\Books\DTOs\BooksShowDTO;
use App\Repositories\Books\DTOs\BooksStoreDTO;
use App\Repositories\Books\DTOs\BooksUpdateDTO;
use App\Services\Books\BooksService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class BooksController extends Controller
{
    public function __construct(
        protected BooksService $booksService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        BooksIndexRequest $bookIndexRequest,
    ) {
        $validatedData = $bookIndexRequest->validated();
        $dto = new BooksIndexDTO(
            $validatedData['created_at'],
            $validatedData['updated_at'],
            $validatedData['year'],
            $validatedData['lang'],
        );
        $bookIterator = $this->booksService->index($dto);
        return response()->json(new BooksResource(collect()->$bookIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        BooksStoreRequest $bookStoreRequest,
    ) {
        $validatedData = $bookStoreRequest->validated();
        $dto = new BooksStoreDTO(
            $validatedData['name'],
            $validatedData['year'],
            $validatedData['lang'],
            $validatedData['pages'],
        );
        $bookIterator = $this->booksService->store($dto);
        return response()->json(new BooksResource($bookIterator), ResponseAlias::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(
        BooksShowRequest $bookShowRequest,
    ) {
        $validatedData = $bookShowRequest->validated();
        $dto = new BooksShowDTO(
            $validatedData['id']
        );
        $bookIterator = $this->booksService->show($dto);
        return response()->json(new BooksResource($bookIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BooksUpdateRequest $bookUpdateRequest,
    ) {
        $validatedData = $bookUpdateRequest->validated();
        $dto = new BooksUpdateDTO(
            $validatedData['id'],
            $validatedData['name'],
            $validatedData['year'],
            $validatedData['lang'],
            $validatedData['pages'],
        );
        $bookIterator = $this->booksService->update($dto);
        return response()->json(new BooksResource($bookIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        BooksDestroyRequest $booksDestroyRequest,
    ) {
        $validatedData = $booksDestroyRequest->validated();
        $dto = new BooksDestroyDTO(
            $validatedData['id']
        );
        $bookIterator = $this->booksService->destroy($dto);
        return response()->json(new BooksResource($bookIterator), ResponseAlias::HTTP_NO_CONTENT);
    }
}
