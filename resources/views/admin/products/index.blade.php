@extends('layouts.app')


@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Column Visibility Options
            const columnVisibilitySelect = document.querySelector('#column-visibility');
            const tableHeaders = document.querySelectorAll('#table-headers th');
            const tableBodyRows = document.querySelectorAll('#table-body tr');

            columnVisibilitySelect.addEventListener('change', function() {
                const selectedColumns = Array.from(columnVisibilitySelect.selectedOptions).map(option => option.value);

                tableHeaders.forEach(header => {
                    const columnName = header.textContent.toLowerCase().trim();

                    if (selectedColumns.includes(columnName)) {
                        header.style.display = 'table-cell';
                    } else {
                        header.style.display = 'none';
                    }
                });

                tableBodyRows.forEach(row => {
                    Array.from(row.cells).forEach((cell, index) => {
                        const columnName = tableHeaders[index].textContent.toLowerCase().trim();

                        if (selectedColumns.includes(columnName)) {
                            cell.style.display = 'table-cell';
                        } else {
                            cell.style.display = 'none';
                        }
                    });
                });
            });

            // Search Field
            const searchInput = document.querySelector('#search');

            searchInput.addEventListener('input', function() {
                const searchText = searchInput.value.toLowerCase().trim();

                tableBodyRows.forEach(row => {
                    let hasMatch = false;

                    Array.from(row.cells).forEach(cell => {
                        const cellText = cell.textContent.toLowerCase().trim();

                        if (cellText.includes(searchText)) {
                            cell.classList.add('text-success');
                            hasMatch = true;
                        } else {
                            cell.classList.remove('text-success');
                        }
                    });

                    if (hasMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

    </script>

    <div class="container">
        <h1>Product List</h1>

        <!-- Column Visibility Options -->
        <div class="mb-3">
            <label for="column-visibility" class="label">Select Columns:</label><br>

            <select id="column-visibility" multiple class="select">
                <option value="image" class="option">Image</option>
                <option value="sku" class="option">SKU</option>
                <option value="name" class="option">Name</option>
                <option value="quantity" class="option">Quantity</option>
                <option value="type" class="option">Type</option>
            </select>
        </div><br>

        <style>
            .label {
                color: #181616;
                font-weight: bold;
                font-size: 18px;
            }

            .select {
                padding: 8px;
                border: 1px solid #3b1010;
                border-radius: 4px;
                width: 200px;
                font-size: 16px;
            }

            .option {
                color: #0c1317;
                font-size: 16px;
            }
        </style>
        <!-- Search Field -->
        <div class="mb-3">
            <label for="search" class="search">Search</label>
            <input type="text" id="search" name="search" class="form-control">
        </div><br>

        <style>
            .search {
                color: #181616;
                font-weight: bold;
                font-size: 18px;
            }
        </style>
        <!-- Product Table -->
        <table class="table">
            <thead>
            <tr id="table-headers">
                @foreach ($selectedColumns as $column)
                    <th>{{ ucfirst($column) }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody id="table-body">
            @foreach ($products as $product)
                <tr>
                    @foreach ($selectedColumns as $column)
                        <td>{{ $product->$column }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $products->links() }}
    </div>
    <style>
        body {
            font-family: "Arial", sans-serif;
        }

         .container {
            background-color: #f8f8f8;
            padding: 20px;
        }

        .table {
            background-color: #e5dada;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            background-color: #38383a;
            padding: 10px;
            text-align: left;
            color: #b9bfc0;
        }

        .table td {
            padding: 10px;
            border-bottom: 1px solid #442626;
            color: #333;
        }
        .form-control{
            padding: 6px;
            border-bottom: 1px solid #442626;
            color: #333;
        }
    </style>
@endsection



