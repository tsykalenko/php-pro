<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CategoriesDestroyRequest;
use App\Http\Requests\Categories\CategoriesIndexRequest;
use App\Http\Requests\Categories\CategoriesShowRequest;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;
use App\Http\Resources\CategoriesResource;
use App\Repositories\Categories\DTOs\CategoriesDestroyDTO;
use App\Repositories\Categories\DTOs\CategoriesIndexDTO;
use App\Repositories\Categories\DTOs\CategoriesShowDTO;
use App\Repositories\Categories\DTOs\CategoriesStoreDTO;
use App\Repositories\Categories\DTOs\CategoriesUpdateDTO;
use App\Services\Categories\CategoriesService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CategoriesController extends Controller
{
    public function __construct(
        protected CategoriesService $categoriesService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        CategoriesIndexRequest $categoriesIndexRequest,
    ) {
        $validatedData = $categoriesIndexRequest->validated();
        $dto = new CategoriesIndexDTO(
            $validatedData['name']
        );
        $categoriesIterator = $this->categoriesService->index($dto);
        return response()->json(new CategoriesResource(collect()->$categoriesIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CategoriesStoreRequest $categoriesStoreRequest,
    ) {
        $validatedData = $categoriesStoreRequest->validated();
        $dto = new CategoriesStoreDTO(
            $validatedData['name'],
        );
        $categoriesIterator = $this->categoriesService->store($dto);
        return response()->json(new CategoriesResource($categoriesIterator), ResponseAlias::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(
        CategoriesShowRequest $categoriesShowRequest,
    ) {
        $validatedData = $categoriesShowRequest->validated();
        $dto = new CategoriesShowDTO(
            $validatedData['id']
        );
        $categoriesIterator = $this->categoriesService->show($dto);
        return response()->json(new CategoriesResource($categoriesIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CategoriesUpdateRequest $categoriesUpdateRequest,
    ) {
        $validatedData = $categoriesUpdateRequest->validated();
        $dto = new CategoriesUpdateDTO(
            $validatedData['id'],
            $validatedData['name'],
        );
        $categoriesIterator = $this->categoriesService->update($dto);
        return response()->json(new CategoriesResource($categoriesIterator), ResponseAlias::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        CategoriesDestroyRequest $categoriesDestroyRequest,
    ) {
        $validatedData = $categoriesDestroyRequest->validated();
        $dto = new CategoriesDestroyDTO(
            $validatedData['id']
        );
        $categoriesIterator = $this->categoriesService->destroy($dto);
        return response()->json(new CategoriesResource($categoriesIterator), ResponseAlias::HTTP_NO_CONTENT);
    }
}
