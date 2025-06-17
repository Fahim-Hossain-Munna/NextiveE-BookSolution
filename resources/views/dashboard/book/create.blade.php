@extends('layouts.app')

@section('content')
    <div class="row justify-content-start mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-dark text-white rounded-top-4">
                    <h4 class="mb-0 text-white">Upload New E-Book</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Book Thumbnail -->
                        <div class="mb-3">
                            <label for="bookThumbnail" class="form-label">Book Thumbnail</label>
                            <input class="form-control border" type="file" name="thumbnail">
                        </div>

                        <!-- Book category -->
                        <div class="mb-3">
                            <label for="bookCategory" class="form-label">Book Category</label>
                            <select class="form-select mt-2 border px-2" name="category_id">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Book Name -->
                        <div class="mb-3">
                            <label for="bookTitle" class="form-label">Book Title</label>
                            <input type="text" class="form-control border px-2" id="bookTitle"
                                placeholder="Enter category name" name="title">
                        </div>

                        <!-- Book Short Description -->
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Book Short Description</label>
                            <div id="texteditorForShortDescription" style="height: 200px">
                                {!! old('short_description') !!}
                            </div>
                            <input type="hidden" id="short_description" name="short_description"
                                value="{{ old('description') }}">
                        </div>

                        <!-- Book PDF -->
                        <div class="mb-3">
                            <label for="bookpdf" class="form-label">Book PDF</label>
                            <input class="form-control border" type="file" name="document">
                        </div>

                        <!-- Book Name -->
                        <div class="mb-3">
                            <label for="bookprice" class="form-label">Book Price</label>
                            <input type="text" class="form-control border px-2" id="bookprice"
                                placeholder="Enter category name" name="price">
                        </div>

                        <!-- Status -->
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="statusSwitch" name="status" value="1">
                            <label class="form-check-label" for="statusSwitch">Active Status</label>
                        </div>

                        <!-- Submit -->
                        <div class="">
                            <button type="submit" class="btn btn-dark btn-lg rounded-pill">Upload Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const quill = new Quill('#texteditorForShortDescription', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    [{
                        'font': []
                    }],
                    ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'align': []
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['link', 'image', 'video', 'formula']
                ]
            }
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById('short_description').value = quill.root.innerHTML;
        });
    </script>
@endpush
