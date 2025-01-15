@extends('admin.layout.default')

@section('title')
    Bookings - Danh Sách Booking
@endsection

@section('head')
    <base href="/">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />


@endsection

@section('content')

    <h2 class="mt-4">Danh sách vé</h2>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <button id="scan-qr-btn" class="btn btn-primary mb-3">Scan QR Code</button>
                                <div id="qr-reader" style="width: 500px;"></div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Mã vé</th>
                                        <th>Người mua</th>
                                        <th>Tên phim</th>
                                        <th>Xuất chiếu</th>
                                        <th>Chỗ ngồi</th>
                                        <th>Ngày đặt</th>
                                        <th>Giá</th>
                                        <th>Checkin</th>
                                        <th>Trạng thái vé</th>
                                        <th>Hành Động</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($ticket as $item)
                                        <tr>
                                            <td>{{ $item->booking->order_code}}</td>
                                            <td>{{ $item->user->username}}</td>
                                            <td>{{ $item->movie->title}}</td>
                                            <td>{{ $item->showtime->showtime_date }}</td>
                                            @php
                                                $item->seats = json_decode($item->seats, true);
                                            @endphp
                                            <td>{{ implode(', ', $item->seats) }}</td>
                                            <td>{{ $item->created_at->format('d-m-Y')}}</td>

                                            @if(isset($item->booking->combo_id))
                                                <td>{{ number_format($item->booking->total_price, 0, ',', ',')  }} VNĐ</td>
                                            @else
                                                <td>{{ number_format($item->transaction->total, 0, ',', ',')  }} VNĐ</td>
                                            @endif
                                            <td>
                                                @if($item->checkin == 1)
                                                    <span class="badge bg-success">Đã checkin</span>
                                                @else
                                                    <span class="badge bg-danger">Chưa checkin</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge bg-success">Đã xem</span>
                                                @elseif($item->status == 0)
                                                    <span class="badge bg-danger">Chưa xem</span>
                                                @else
                                                    <span class="badge bg-warning">Đã hủy</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.ticket.show', $item->ticket_id) }}" class="btn btn-info">Xem</a>
{{--                                                <a href="{{ route('admin.checkin', $item->ticket_id) }}" class="btn btn-info">Checkin</a>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <script>
        // document.getElementById('scan-qr-btn').style.display = 'block'; // Show the scan QR button

        document.getElementById('scan-qr-btn').addEventListener('click', function() {
            // console.log('Scan QR button clicked');
            const qrReader = document.getElementById('qr-reader');
            qrReader.style.display = 'block'; // Show the QR reader div

            const html5QrCode = new Html5Qrcode("qr-reader");
            html5QrCode.start(
                { facingMode: "environment" },
                {
                    fps: 5,
                    qrbox: 250
                },
                qrCodeMessage => {
                    // Handle the scanned QR code message
                    console.log(`QR Code detected: ${qrCodeMessage}`);
                    // Redirect to process QR ticket
                    window.location.href = qrCodeMessage;
                },
                errorMessage => {
                    // Handle errors
                    console.log(`QR Code no longer in front of camera.`);
                }
            ).catch(err => {
                // Start failed, handle it.
                console.log(`Unable to start scanning, error: ${err}`);
            });
        });
    </script>
@endsection

@section('script')
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/libs/qrcode/html5-qrcode.min.js') }}"></script>


    <!-- Table Editable plugin -->
    <script src="{{ asset('assets/libs/table-edits/build/table-edits.min.js') }}"></script>

    <script src="{{ asset('assets/js/pages/table-editable.int.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- Include html5-qrcode library -->
    <script src="{{asset('https://unpkg.com/html5-qrcode/html5-qrcode.min.js')}}"></script>


@endsection
