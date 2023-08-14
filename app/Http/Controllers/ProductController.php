<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProductController extends Controller
{
    public ProductService $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index() : View
    {
        return view('index');
    }

    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $product = $request->validated();
        if($this->service->create($product)) {
            return response()->json([
                'message' => 'Товар '. $product['article'] .' успешно создан.',
            ], ResponseAlias::HTTP_OK);
        } else {
            return response()->json([
                'errors' => 'Ошибка на стороне сервера при создании товара',
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
