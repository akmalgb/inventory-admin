@extends('layouts.app')

@section('title', 'Supplying')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Supplying History</h1>
                <button class="btn btn-primary btn-sm ml-auto" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-plus"></i>
                    New Supplying
                </button>
            </div>

            <div class="section-body">
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supplyings as $supplying)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $supplying->created_at }}</td>
                                <td>{{ $supplying->product->name }}</td>
                                <td>{{ $supplying->quantity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    @include('pages.supplying.create')

@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                if (categoryID) {
                    $.ajax({
                        url: '/get-products/' + categoryID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#product').empty();
                                $('#product').append('<option hidden>Choose Product</option>');
                                $.each(data, function(key, product) {
                                    $('select[name="product_id"]').append('<option value="' + product.id + '">' + product.name + '</option>');
                                });
                            } else {
                                $('#product').empty();
                            }
                        }
                    });
                } else {
                    $('#product').empty();
                }
            });
        });
    </script>
@endpush
