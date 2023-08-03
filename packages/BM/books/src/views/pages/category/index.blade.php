@extends('books::layout.master')

@section('categories', 'active')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between w-100">
                            <h4 class="card-title">Categories</h4>
                            <div class="d-flex gap-2">
                                <form class="d-flex gap-2" method="GET">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" value="{{ @$q }}" placeholder="{{ __('Search') }}">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-default d-none d-md-inline-block text-white">Search</button>
                                    </div>
                                </form>
                                @if ($can_update_delete_save())
                                    <div class="text-end upgrade-btn">
                                        <a href="{{ route('admin.categories.create') }}" class="btn btn-success d-none d-md-inline-block text-white">Add Category</a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">ID</th>
                                        <th class="border-top-0">Name</th>
                                        @if ($can_update_delete_save())
                                            <th class="border-top-0 text-center" style="width: 130px;">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            @if ($can_update_delete_save())
                                                <td><a class="btn btn-default" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                                    <a class="btn btn-danger text-white" href="{{ route('admin.categories.delete', $category->id) }}">Delete</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @empty
                                        <tr>
                                            No categories
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
