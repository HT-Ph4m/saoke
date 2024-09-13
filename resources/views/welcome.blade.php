<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Style Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .search-container {
            margin-top: 5%;
            text-align: center;
        }

        .search-box {
            width: 50%;
            margin: 0 auto;
        }

        .search-results {
            margin-top: 20px;
        }

        .search-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <div class="container search-container">
        <h1>ADNX CHECK VAR</h1>
        <div id="search-form">
            <div class="input-group search-box">
                <input type="text" class="form-control" name="query" placeholder="Search..." required>
                <button type="submit" id="searchSubmit" class="btn btn-primary">Search</button>
            </div>
        </div>

        <!-- Kết quả tìm kiếm -->
        <div class="search-results">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".pagination a", function(e) {
                e.preventDefault();
                const page = $(this).attr("href").split("page=")[1];
                getlogs(page);
            });

            $("#searchSubmit").on("click", function(e) {
                e.preventDefault();
                getlogs(1);
            });

            function getlogs(page) {
                let keyword = $('input[name="query"]').val();
                $.ajax({
                    url: "/search",
                    type: "GET",
                    data: {
                        keyword: keyword,
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
