@extends('books::layout.master')

@section('categories', 'active')

@section('content')
    <div class="container-fluid">
        <div class="col-lg-5 col-xlg-8 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal form-material mx-2"  action="{{route('admin.categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-12 mb-0">Category Name</label>
                            <div class="col-md-12">
                                <input type="text" name="name" placeholder="Enter category name" class="form-control  form-control-line">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Create Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
