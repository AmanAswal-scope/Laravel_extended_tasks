@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>CSV File Records</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book_Id</th>
                    <th>Book_Name</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Book_Published</th>
                    <th>Language</th>
                    <th>Publisher</th>
                    <th>StockQuantity</th>
                    <th>Date_Created</th>
                    <!-- Add more table headers for each column in your CSV file -->
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $record[0] }}</td>
                        <td>{{ $record[1] }}</td>
                        <td>{{ $record[3] }}</td>
                        <td>{{ $record[4] }}</td>
                        <td>{{ $record[5] }}</td>
                        <td>{{ $record[6] }}</td>
                        <td>{{ $record[7] }}</td>
                        <td>{{ $record[8] }}</td>
                        <td>{{ $record[9] }}</td>
                        <td>{{ $record[10] }}</td>
                        <!-- Add more table cells for each column in your CSV file -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
