<!-- Basic Page Needs -->
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="description" content="A Template by Gozha.net">
<meta name="keywords" content="HTML, CSS, JavaScript">
<meta name="author" content="Gozha.net">

<!-- Mobile Specific Metas-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="telephone=no" name="format-detection">
<style>
    .phim-section {
        display: flex;
        justify-content: space-between;
        /* Aligns items horizontally with space between */
        align-items: center;
        /* Vertically centers the content */

    }

    .left,
    .right a {
        flex: 1;
        font-size: 100%;
    }

    .left {
        text-align: left;
    }

    .right {
        text-align: right;
    }

    .text-movie {
        font-size: 30px;
    }

    .movie-card-compact {
        width: 270px;
        padding-bottom: 30px;
        padding: 30px 30px;
        /* background-color: #fefae0; */
        /* border: 1px solid #ddd; */
        /* border-radius: 8px; */
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    .movie-title {
        font-size: 17px;
        font-weight: bold;
        margin-bottom: 10px;
        margin-top: 10px;
        color: #000;
    }

    .movie-card-compact p {
        margin: 2px 0;
    }

    .movie-actions {
        display: flex;
        justify-content: space-between;
        /* margin-top: 15px; */
    }

    .btn-like,
    .btn-ticket {
        padding: 5px 10px;
        font-size: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
    }

    .btn-like {
        background-color: #1877f2;
        color: white;
    }

    .btn-like i {
        margin-right: 5px;
    }

    .btn-ticket {
        background-color: #e53935;
        color: white;
        font-size: 19px;

    }

    .btn-ticket i {
        margin-right: 5px;
    }

    .movie-poster {
        width: 100%;
        height: 290px;
        border: 6px solid #000;
        /* Add a light gray border */
        margin-bottom: 10px;
        /* Add some space between the image and the content */
    }

    .text-movies {
        height: 250px;
    }

    .image-container {
        position: relative;
        display: inline-block;
    }

    .main-image {
        width: 200px;
        /* Adjust thumbnail size */
        height: auto;
        cursor: zoom-in;
    }

    .zoomed-image {
        position: absolute;
        top: 0;
        left: 100%;
        width: 500px;
        height: 500px;
        background-size: 150%;
        /* Adjust this value for sharpness */
        background-position: center;
        background-repeat: no-repeat;
        display: none;
        border: 2px solid #000;
        z-index: 100;
        border: 5px solid gray;
        /* Đường viền vàng */
        /* border-radius: 10px; */
        /* Bo tròn các góc (tuỳ chọn) */
        background-color: #fff;
        /* Optional */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        /* Optional */
    }

    .image-container:hover .zoomed-image {
        display: block;
    }

    html {
        scroll-behavior: smooth;
    }
    .select .sbSelector:after,
    .datepicker:after  {
        background-image: none !important;
    }

    /* Ẩn modal mặc định */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.713);
        /* Màu nền mờ */
    }

    /* Nội dung của modal */
    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Chiều rộng modal */
        max-width: 600px;
        /* Giới hạn tối đa chiều rộng */

    }

    /* Nút đóng modal */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    


</style>

<script>
    document.querySelectorAll('.image-container').forEach(container => {
        const mainImage = container.querySelector('.main-image');
        const zoomedImage = container.querySelector('.zoomed-image');

        // Khi di chuột vào container, chỉ kích hoạt zoom trong vùng ảnh chính
        mainImage.addEventListener('mousemove', function(e) {
            zoomedImage.style.display = 'block'; // Hiển thị ảnh zoom khi hover

            // Lấy vị trí của ảnh chính
            const rect = mainImage.getBoundingClientRect();

            // Tính toán vị trí chuột so với ảnh chính
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            // Lấy phần trăm vị trí chuột trong ảnh chính
            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            // Cập nhật vị trí background của ảnh zoom theo vị trí chuột
            zoomedImage.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
        });

        // Ẩn ảnh zoom khi chuột rời khỏi container của ảnh chính
        mainImage.addEventListener('mouseleave', function() {
            zoomedImage.style.display = 'none'; // Ẩn ảnh zoom khi rời khỏi ảnh chính
        });
    });
</script>







<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
{{-- [if lt IE 9]> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.js"></script>		
<![endif] --}}
