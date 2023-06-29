@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="text-primary">Delete Products</h1>
        <form action="{{ route('admin.products.destroy') }}" method="POST">
            @csrf
            @method('DELETE')
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->image }}</td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->type }}</td>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $product->id }}">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger">Delete Selected</button>
        </form>
    </div>
    <style>
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

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #afaaaa;
            color: #242323;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        .btn {
            background-color: #e60000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #cc0000;
        }
    </style>
@endsection
