<!DOCTYPE html>
<html>
<head>
    <title>Rating Display Test</title>
    <style>
        .rating-display label {
            font-size: 24px;
            color: gold;
        }
    </style>
</head>
<body>
<div class="rating-display">
    <!-- Replace with a test value -->
    @for ($i = 1; $i <= 5; $i++)
        <label>{{ $i <= 3 ? '★' : '☆' }}</label>
    @endfor
    <span>3.0/5</span>
</div>
</body>
</html>
