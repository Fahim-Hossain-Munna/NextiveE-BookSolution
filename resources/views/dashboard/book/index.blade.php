@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>E-Books</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                            </p>
                        </div>
                        <div class="col-lg-6 col-7">
                            <a href="{{ route('admin.books.create') }}" class="btn btn-dark btn-sm float-end mb-0">
                                +Add Book
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Thumbnail</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Book PDF</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Author</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($books as $book)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ $book->thumbnailPath }}" class="avatar avatar-sm me-3"
                                                        alt="xd">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $book->title }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <a href="{{ $book->documentPath }}" target="_blank"
                                                        class="btn btn-link text-dark text-sm mb-0 px-0 ms-4">
                                                        <i
                                                            class="material-symbols-rounded text-lg position-relative me-1">picture_as_pdf</i>
                                                        PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $book->author ? $book->author->name : 'Unknown' }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $book->category ? $book->category->title : 'Unknown' }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold">
                                                {{ $book->price }}
                                            </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="badge badge-sm bg-gradient-success">{{ $book->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="d-flex align-items-center justify-content-center">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                href="javascript:void(0);"
                                                onclick="deleteAction('{{ route('admin.books.delete', $book->id) }}')">
                                                <i class="material-symbols-rounded text-sm me-2">delete</i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-danger" style="font-weight: bold; font-size: 12px">No books
                                                found.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
