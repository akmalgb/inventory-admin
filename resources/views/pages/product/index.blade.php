@extends('layouts.app')

@section('title', 'Products')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>List Product</h1>
                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i>
                    Add Product
                </button>
            </div>

            <div class="section-body">
                <div class="container">
                    {{-- @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <div class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        </div>
                    @endif --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>Rp, {{ number_format($product->price) }}</td>
                                    @if (!isset($product->stock->quantity) || $product->stock->quantity == 0)
                                        <td>0</td>
                                    @else
                                        <td>{{ $product->stock->quantity }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                            Detail
                                        </a>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-edit"
                                            data-json="{{ json_encode($product) }}">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#modal-delete" data-json="{{ json_encode($product) }}">
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

    @include('pages.product.create')

    @include('pages.product.edit')

    @include('pages.product.delete')
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script>
        $('#modal-edit').on('show.bs.modal', function(e) {
            var product = $(e.relatedTarget).data('json');
            $(e.currentTarget).find('select[name="category_id"]').val(product.category_id);
            $(e.currentTarget).find('input[name="name"]').val(product.name);
            $(e.currentTarget).find('input[name="price"]').val(product.price);
            $(e.currentTarget).find('form').attr('action', '{{ route('product.update', '') }}' + '/' + product.id);
        });
        $('#modal-delete').on('show.bs.modal', function(e) {
            var product = $(e.relatedTarget).data('json');
            $(e.currentTarget).find('form').attr('action', '{{ route('product.destroy', '') }}' + '/' + product.id);
        });
    </script>
@endpush
