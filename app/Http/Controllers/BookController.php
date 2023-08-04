<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\BookShowRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $bookStoreRequest)
    {
        $bookStoreRequest->input('id');
        $bookStoreRequest->validated();
        return new BookResource(
            (object)[
                'id' => '1',
                'name' => 'MyFirstBook',
                'author' => 'Oleksiy',
                'year' => '2023',
                'countPages' => '813',
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(BookShowRequest $bookShowRequest, $id)
    {
        $bookShowRequest->merge(['id' => $id])->validated();
        return new BookResource(
            (object)[
                'name' => 'MyFirstBook',
                'author' => 'Oleksiy',
                'year' => '2023',
                'countPages' => '813',
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $bookUpdateRequest, $id)
    {
        $bookUpdateRequest->merge(['id' => $id])->validated();
        return new BookResource(
            (object)[
                'name' => 'MyFirstBook',
                'author' => 'Oleksiy',
                'year' => '2023',
                'countPages' => '813',
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
