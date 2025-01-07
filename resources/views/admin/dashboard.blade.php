@extends('admin.layout.default')

@section('title')
    @parent
    Dashboard | Tapeli - Responsive Admin Dashboard Template
@endsection

@push('style')
@endpush

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Dashboard</h4>
                </div>
            </div>

            <!-- start row -->
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="film" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Best-Selling Movies</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-traffic">
                                <thead>
                                <tr>
                                    <th>Movie</th>
                                    <th>Sales</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($bestSellingMovies as $movie)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $movie->title }}</td>--}}
{{--                                        <td>{{ $movie->sales_sum_quantity }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end row -->

            <!-- Start Monthly Sales -->
            <div class="row">
                <div class="col-md-6 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="shopping-cart" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Best-Selling Combos</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-traffic">
                                <thead>
                                <tr>
                                    <th>Combo</th>
                                    <th>Sales</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($bestSellingCombos as $combo)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $combo->name }}</td>--}}
{{--                                        <td>{{ $combo->sales_sum_quantity }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Monthly Sales -->

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="border border-dark rounded-2 me-2 widget-icons-sections">
                                    <i data-feather="calendar" class="widgets-icons"></i>
                                </div>
                                <h5 class="card-title mb-0">Today's Premieres</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="list-group">
{{--                                @foreach($dailyPremieres as $premiere)--}}
{{--                                    <li class="list-group-item">--}}
{{--                                        {{ $premiere->movie_title }} - {{ $premiere->premiere_time }}--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@push('script')
    <!-- Widgets Init Js -->
    <script src="{{ asset('assets/js/pages/analytics-dashboard.init.js') }}"></script>
@endpush
