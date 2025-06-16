@extends('layouts.app')

@section('content')
    <div class="row justify-content-start mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-dark text-white rounded-top-4">
                    <h4 class="mb-0 text-white">Upload New Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Category Name -->
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control border px-2" id="categoryName"
                                placeholder="Enter category name" name="title">
                        </div>

                        <!-- Category Image -->
                        <div class="mb-3">
                            <label for="categoryImage" class="form-label">Category Image</label>
                            <input class="form-control" type="file" name="thumbnail">
                        </div>

                        <!-- Status -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="statusSwitch" name="status">
                            <label class="form-check-label" for="statusSwitch">Active Status</label>
                        </div>

                        <!-- Submit -->
                        <div class="">
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill">Upload Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
