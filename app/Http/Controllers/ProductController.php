<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use \Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public ProductService $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index() : View
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->attributes = json_decode($product->attributes, true);
        }
        return view('index', compact('products'));
    }

    /**
     * Store a newly created product in storage.
     *
     * @param StoreRequest $request The request containing the validated data.
     *
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
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
