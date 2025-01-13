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

            <div class="row">
                <!-- Best-Selling Movies -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Best-Selling Movies</h5>
                        </div>
                        <div class="card-body">
                            <div id="best-selling-movies-chart"></div>
                            <ul class="list-group mt-3">
                                @foreach ($bestSellingMovies as $movie)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $movie->movie->title ?? 'Unknown Movie' }}
                                        <span class="badge bg-primary rounded-pill">{{ $movie->total_tickets_sold }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Most-Purchased Combos -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Most-Purchased Combos</h5>
                        </div>
                        <div class="card-body">
                            <div id="most-purchased-combos-chart"></div>
                            <ul class="list-group mt-3">
                                @foreach ($mostPurchasedCombos as $combo)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $combo->combo->combo_name ?? 'Unknown Combo' }}
                                        <span class="badge bg-success rounded-pill">{{ $combo->total_combos_sold }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Most-Purchased Screenings -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Most-Purchased Screenings</h5>
                        </div>
                        <div class="card-body">
                            <div id="most-purchased-screenings-chart"></div>
                            <ul class="list-group mt-3">
                                @foreach ($mostPurchasedScreens as $screening)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $screening->screen->screen_name ?? 'Unknown Screening' }}
                                        <span class="badge bg-warning rounded-pill">{{ $screening->total_tickets_sold }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div> <!-- content -->
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Best-Selling Movies Chart
            var moviesChartOptions = {
                series: [{
                    data: @json($bestSellingMovies->pluck('total_tickets_sold')->toArray())
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                xaxis: {
                    categories: @json($bestSellingMovies->pluck('movie.title')->toArray())
                },
            };
            var moviesChart = new ApexCharts(document.querySelector("#best-selling-movies-chart"), moviesChartOptions);
            moviesChart.render();

            // Most-Purchased Combos Chart
            var combosChartOptions = {
                series: [{
                    data: @json($mostPurchasedCombos->pluck('total_combos_sold')->toArray())
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                xaxis: {
                    categories: @json($mostPurchasedCombos->pluck('combo.combo_name')->toArray())
                },
            };
            var combosChart = new ApexCharts(document.querySelector("#most-purchased-combos-chart"), combosChartOptions);
            combosChart.render();

            // Most-Purchased Screenings Chart
            var screeningsChartOptions = {
                series: [{
                    data: @json($mostPurchasedScreens->pluck('total_tickets_sold')->toArray())
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                xaxis: {
                    categories: @json($mostPurchasedScreens->pluck('screen.screen_name')->toArray())
                },
            };
            var screeningsChart = new ApexCharts(document.querySelector("#most-purchased-screenings-chart"), screeningsChartOptions);
            screeningsChart.render();
        });
    </script>


    <!-- Widgets Init Js -->
    <script src="{{ asset('assets/js/pages/analytics-dashboard.init.js') }}"></script>
@endpush
