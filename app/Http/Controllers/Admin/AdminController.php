<?php

namespace App\Http\Controllers\Admin;

use App\Actions\CreateProductAction;
use App\Actions\DeleteProductAction;
use App\Actions\GetProductsAction;
use App\Actions\UpdateProductAction;
use App\Dtos\CreateProductDto;
use App\Dtos\UpdateProductDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ReadProductRepository;

class AdminController extends Controller
{

    public function index(GetProductsAction $productAction)

    {
        $products = $productAction->run();
        $selectedColumns = config('admin.select_columns');
        $searchQuery = config('admin.search');

        return view('admin.products.index', compact('products', 'selectedColumns', 'searchQuery'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store (
        CreateProductRequest $request,
        CreateProductAction  $createProductAction
    )

    {
        $dto = CreateProductDto::fromRequest($request);
        $createProductAction->run($dto);
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update (
        Product              $product,
        UpdateProductRequest $request,
        UpdateProductAction  $updateProductAction
    )

    {
        $dto = UpdateProductDto::fromRequest($request);
        $updateProductAction->run($product, $dto);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(
        DeleteProductRequest $request,
        DeleteProductAction  $deleteProductAction)
    {
        $deleteProductAction->run($request);

        return redirect()->route('admin.products.index')->with('success', 'Products deleted successfully.');
    }

    public function delete(ReadProductRepository $productRepository)
    {
        $products = $productRepository->getAll();

        return view('admin.products.delete', compact('products'));
    }
}
