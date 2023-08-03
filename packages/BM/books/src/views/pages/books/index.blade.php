@extends('books::layout.master')

@section('books', 'active')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between w-100">
                            <h4 class="card-title">Books</h4>
                            <form class="d-flex gap-2" method="GET">
                                <div style="width: 200px;">
                                    <select class="categories-by-ajax form-control select2" name="ct" id="category_id" aria-hidden="true">
                                        @if (isset($_GET['ct']) && $_GET['ct'] !== '___')
                                            <option selected value="{{ $selected_category->id }}"> {{ $selected_category->category_name }} </option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="{{ @$q }}" placeholder="{{ __('Search') }}">
                                        
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-default d-none d-md-inline-block text-white">Search</button>
                                </div>
                                @if($can_update_delete_save())
                                <div class="text-end upgrade-btn">
                                    <a href="{{ route('admin.books.create') }}" class="btn btn-success d-none d-md-inline-block text-white">Add Book</a>
                                </div>
                                @endif
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Price</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">author</th>
                                        <th class="border-top-0">description</th>
                                        <th class="border-top-0">publication_date</th>
                                        <th class="border-top-0">language</th>
                                        <th class="border-top-0">publisher</th>
                                        <th class="border-top-0">stock_quantity</th>
                                        @if($can_update_delete_save())
                                        <th class="border-top-0 text-center" style="width: 130px;">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->book_name }}</td>
                                            <td>{{ $book->book_price }}</td>
                                            <td>{{ $book->categories->category_name ?? 'N/A' }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->description }}</td>
                                            <td>{{ $book->publication_date }}</td>
                                            <td>{{ $book->language}}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->stock_quantity }}</td>
                                            @if($can_update_delete_save())
                                            <td><a class="btn btn-default" href="{{ route('admin.books.edit', $book->id) }}">Edit</a>
                                                <a class="btn btn-danger text-white" href="{{ route('admin.books.delete', $book->id) }}">Delete</a>
                                            </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            No books
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('vendor/books/js/ajax-live-search.js') }}"></script>
@endpush
