@extends('layouts.app')

@section('title', 'Categories')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Category</h1>
                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i>
                    Add Category
                </button>
            </div>

            <div class="section-body">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit"
                                            data-json="{{ json_encode($category) }}">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-delete" data-json="{{ json_encode($category) }}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    @include('pages.category.create')

    @include('pages.category.edit')

    @include('pages.category.delete')

@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script>
        $('#modal-edit').on('show.bs.modal', function(e) {
            var category = $(e.relatedTarget).data('json');
            $(e.currentTarget).find('input[name="name"]').val(category.name);
            $(e.currentTarget).find('form').attr('action', '{{ route('category.update', '') }}' + '/' + category
            .id);
        });
        $('#modal-delete').on('show.bs.modal', function(e) {
            var category = $(e.relatedTarget).data('json');
            $(e.currentTarget).find('form').attr('action', '{{ route('category.destroy', '') }}' + '/' + category
                .id);
        });
    </script>
@endpush
