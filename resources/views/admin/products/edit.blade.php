@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="heading">Edit Product</h1>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" class="product-form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image" class="form-label">Image:</label>
                <input type="text" name="image" class="form-control" value="{{ $product->image }}" required>
            </div><br>
            <div class="form-group">
                <label for="sku" class="form-label">SKU:</label>
                <input type="text" name="sku" class="form-control" value="{{ $product->sku }}" required>
            </div><br>
            <div class="form-group">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div><br>
            <div class="form-group">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
            </div><br>
            <div class="form-group">
                <label for="type" class="form-label">Type:</label>
                <input type="text" name="type" class="form-control" value="{{ $product->type }}" required>
            </div><br>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <style>
        /* Custom CSS styles */
        .container {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .heading {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .product-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-label {
            color: #555;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: none;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.25);
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
