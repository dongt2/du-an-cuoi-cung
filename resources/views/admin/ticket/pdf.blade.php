<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tickets PDF</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }
        .ticket {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 20px;
        }
        .ticket-header {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .ticket-content span {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
@foreach($tickets as $ticket)
    <div class="ticket">
        <div class="ticket-header">Mã vé {{ $ticket['order_code'] }}</div>
        <span><strong>Tên Khách Hàng:</strong> {{ $ticket['buyer_name'] }}</span>
        <div class="ticket-header">Tên phim {{ $ticket['movie_title'] }}</div>
        <div class="ticket-content">
            <span><strong>Phòng:</strong> {{ $ticket['screen_name'] }}</span>
            <span><strong>Xuấu chiếu:</strong> {{ $ticket['showtime'] }} ngày {{ $ticket['showtime_date'] }}</span>
            <span><strong>Ghế:</strong> {{ $ticket['seat'] }}</span>
            <span><strong>Giá:</strong> {{ $ticket['price'] }} VNĐ</span>
            @if($ticket['combo'])
                <span><strong>Combo:</strong> {{ $ticket['combo'] }} x {{ $ticket['quantity'] }}</span>
            @endif
        </div>
    </div>
@endforeach
</body>
</html>
