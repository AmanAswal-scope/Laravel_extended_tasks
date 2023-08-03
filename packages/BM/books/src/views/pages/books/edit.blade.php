@extends('books::layout.master')

@section('books', 'active')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-5 col-xlg-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2" action="{{ route('admin.books.update') }}" method="POST">
                        @csrf
                        <input type="text" name="id" value="{{$book->id}}" hidden>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Book Name</label>
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{$book->book_name}}" placeholder="Enter book name" class="form-control  form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Book Price</label>
                            <div class="col-md-12">
                                <input type="number" name="price" value="{{$book->book_price}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>



                        <div class="form-group mb-2">
                            <label class="col-sm-12">Select Category</label>
                            <div class="col-sm-12 ">
                                <select name="category_id" class="form-select form-control-line">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{$book->category_id == $category->id ? "selected":""}}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @include('edit_extend')
<!-- 
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Author</label>
                            <div class="col-md-12">
                                <input type="text" name="Author" value="{{$book->author}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Discription</label>
                            <div class="col-md-12">
                                <input type="text" name="Discription" value="{{$book->description}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Publication_date</label>
                            <div class="col-md-12">
                                <input type="date" name="Publication_date" value="{{$book->publication_date}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 mb-0">Language</label>
                            <div class="col-md-12">
                                <input type="text" name="Language" value="{{$book->language}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-12 mb-0">Publisher</label>
                            <div class="col-md-12">
                                <input type="text" name="Publisher" value="{{$book->publisher}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-12 mb-0">Stock_quantity</label>
                            <div class="col-md-12">
                                <input type="number" name="Stock_quantity" value="{{$book->stock_quantity}}" placeholder="Enter book price" class="form-control  form-control-line">
                            </div>
                        </div> -->


                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
