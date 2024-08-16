@extends('Admin.layout.master')

@section('title', 'Booking list')

@section('content')
    <div class="container-fluid mt-5">

        <!-- Page Heading -->
        <div class="d-sm-flex  align-items-center justify-content-between mb-4">
            <h1 style="color: blueviolet;" class="h3 mb-0 ">ကြိုတင်စာရင်းပေးမှတ်တမ်း</h1>

        </div>

        @if (session('orderAcceptSuccess'))
            <div class="col-4 offset-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> {{ session('orderAcceptSuccess') }}
                </div>
            </div>
        @endif

        @if (session('orderRejectSuccess'))
            <div class="col-4 offset-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> {{ session('orderRejectSuccess') }}
                </div>
            </div>
        @endif
        <div class="dropdown p-2 m-1 ">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                ရွေးချယ်နိုင်ခြင်းများ
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item filter-category" data-category-id="All">အားလုံး</a></li>
                @foreach ($categories as $c)
                    <li><a class="dropdown-item filter-category"
                            data-category-id="{{ $c->id }}">{{ $c->name }}</a></li>
                @endforeach
            </ul>
        </div>

        <!-- Content Row -->

        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-12 card shadow-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">နံပါတ်</th>
                            <th scope="col">သတိုးသားအမည်</th>
                            <th scope="col">သတိုးသမီးအမည်</th>
                            <th scope="col">ဝန်ဆောင်မှုအမည်</th>
                            <th scope="col">အီးမေးလ်လိပ်စာ</th>
                            <th scope="col">ဖုန်းနံပါတ်</th>
                            <th scope="col">ရက်စွဲ</th>
                            <th scope="col">အကြောင်းအရာ</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @include('Admin.pagination.tbody', ['booking' => $booking])
                    </tbody>
                </table>
                <div class="pagination-container">
                    {{ $booking->links('pagination::bootstrap-5') }}
                </div>
            </div>


        </div>

        <!-- Content Row -->
    </div>

@endsection
@section('script')

    <script>
        $(document).on('click', '.dropdown-item', function(e) {
            e.preventDefault();

            var categoryId = $(this).data('category-id');
            fetchBookings('/booking/list-filter/' + categoryId);
        });

        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            fetchBookings(url);
        });

        function fetchBookings(url) {
            $.ajax({
                url: url,
                method: 'GET',
                success: function(response) {
                    $('tbody').html(response.tableRows);
                    $('.pagination').html(response.paginationLinks);
                },
                error: function(xhr, status, error) {
                    console.log('Error:', xhr.responseText);
                }
            });
        }
    </script>

@endsection
