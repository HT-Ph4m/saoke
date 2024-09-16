<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check sao kê</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Các kiểu chung cho các ô tìm kiếm */
        body {
            background-color: #f8f9fa;
        }

        .search-container {
            margin-top: 3%;
            text-align: center;
        }

        .search-box {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: flex-end;
        }

        .search-results {
            margin-top: 20px;
        }

        .search-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .col-date {
            flex: 0 0 12rem;
            /* Chiều rộng cố định cho các ô ngày */
        }

        .col-other {
            flex: 1;
            /* Các ô khác sẽ chiếm toàn bộ chiều rộng còn lại */
        }

        @media (max-width: 767.98px) {
            .col-date {
                flex: 1 1 48%;
                /* Chiều rộng của các ô ngày chung một hàng trong mobile */
            }

            .col-other {
                flex: 1 1 100%;
                /* Các ô tìm kiếm khác mỗi ô chiếm một hàng trong mobile */
            }

            .col-md-auto {
                flex: 1 1 100%;
                /* Nút tìm kiếm chiếm toàn bộ chiều rộng trong mobile view */
                text-align: center;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {

            .col-date {
                flex: 1 1 48%;
                /* Chiều rộng của các ô ngày chung một hàng trong mobile */
            }

            .col-other {
                flex: 1 1 100%;
                /* Các ô tìm kiếm khác mỗi ô chiếm một hàng trong mobile */
            }

            .col-md-auto {
                flex: 1 1 100%;
                /* Nút tìm kiếm chiếm toàn bộ chiều rộng trong mobile view */
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container search-container">
        <h1>Tổng tiền: {{ number_format($sumMoney, 0, ',', '.') }}</h1>
        <h6>Bao gồm:
            <a href="https://tinyurl.com/46kc3h4y" class="">Vietcombank</a>
            <a href="https://tinyurl.com/mup295by" class="">Vietinbank</a>
            <a href="https://tinyurl.com/bdhx6k2b" class="">Agribank+TrucTiep</a>
            <a href="https://tinyurl.com/43t76w5b" class="">BIDV(01-12)</a>
            <a href="https://tinyurl.com/48y3akd7" class="">VCB(11/09/2024)</a>
            <a href="https://tinyurl.com/249rtkvm" class="">VCB(12/09/2024)</a>
        </h6>
        {{-- <h1>TỔ VAR</h1> --}}
        <form id="searchForm" class="search-box">
            <div class="col-md col-date">
                <label for="dateFrom" class="form-label">Từ ngày</label>
                <input type="date" class="form-control" id="dateFrom" name="dateFrom">
            </div>
            <div class="col-md col-date">
                <label for="dateTo" class="form-label">Đến ngày</label>
                <input type="date" class="form-control" id="dateTo" name="dateTo">
            </div>
            <div class="col-md col-other">
                <label for="number" class="form-label">Tiền</label>
                <input type="number" class="form-control" id="number" name="number">
            </div>
            <div class="col-md col-other">
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="col-md col-other">
                <label for="content" class="form-label">Nội dung</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="col-md-auto">
                <button type="button" class="btn btn-outline-secondary" id="clearInput"
                    style="display: none;">&times;</button>
                <button type="submit" id="searchSubmit" class="btn btn-primary ms-2">Search</button>
            </div>
        </form>

        <!-- Kết quả tìm kiếm -->
        <div class="search-results">
            @include('partical.sao_ke_table')
        </div>
        <h6 style="font-size:12px;">Email: hongtruongpham18@gmail.com </h6>
        <span style="font-size:12px; font-style:italic; color:red;">Copyright © 2024 Pham Hong Truong. All rights
            reserved.
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#query').on('input', function() {
                let keyword = $(this).val();
                if (keyword.length > 0) {
                    $('#clearInput').show(); // Hiển thị nút "x"
                } else {
                    $('#clearInput').hide(); // Ẩn nút "x"
                }
            });

            $('#query').keypress(function(event) {
                if (event.which == 13) { // 13 là mã phím Enter
                    event.preventDefault(); // Ngăn việc submit form mặc định
                    $('#searchSubmit').click(); // Tự động click vào nút Search
                }
            });

            $(document).on("click", ".pagination a", function(e) {
                e.preventDefault();
                const page = $(this).attr("href").split("page=")[1];
                getlogs(page);
            });

            // Xóa nội dung trong input khi nhấn vào nút "x"
            $('#clearInput').on('click', function() {
                $('#query').val(''); // Xóa input
                $(this).hide(); // Ẩn nút "x"
            });

            $("#searchSubmit").on("click", function(e) {
                e.preventDefault();
                getlogs(1);
            });

            function getlogs(page) {
                let dateFrom = $('#dateFrom').val();
                let dateTo = $('#dateTo').val();
                let number = $('#number').val();
                let name = $('#name').val();
                let content = $('#content').val();
                let query = $('#query').val();

                $.ajax({
                    url: "/search",
                    type: "GET",
                    data: {
                        dateFrom: dateFrom,
                        dateTo: dateTo,
                        number: number,
                        name: name,
                        content: content,
                        query: query,
                        page: page
                    },
                    success: function(result) {
                        $(".search-results").html(result);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>

</body>

</html>
