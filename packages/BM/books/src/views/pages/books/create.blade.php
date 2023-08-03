@extends('books::layout.master')

@section('books', 'active')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-5 col-xlg-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="{{ route('admin.books.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Book Name</label>
                            <div class="col-md-12">
                                <input type="text" name="name" placeholder="Enter book name" class="form-control  form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Book Price</label>
                            <div class="col-md-12">
                                <input type="number" name="price" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <label class="col-sm-12">Select Category</label>
                            <div class="col-sm-12 ">
                                <select name="category_id" class="form-select form-control-line">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @include('book_extend')

                       
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Create Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
