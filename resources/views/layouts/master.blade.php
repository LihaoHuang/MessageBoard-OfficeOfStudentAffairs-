<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

        <title>學生事務處 留言板 | @yield('title')</title>

        <style>
            body {
                font-family:微軟正黑體;
            }

            .dotted_line {
                margin: 5px 20px 5px 20px;
            }

            .article {
                margin-top: 1rem;
            }

            .post {
                margin-top: 0rem;
                margin-bottom: 3px;
            }

            .message {
                margin: 3px 0 0 3rem;
            }

            .pagination {
                margin-top: 1rem;
            }

            .myMOUSE {
                cursor: pointer;
            }

            @media screen and (max-width: 520px) {
                #message-btn {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        @if (session('message'))
            <script> alert('{{ session('message') }}') </script>
        @endif

        <!-- navbar start -->
        @include('layouts.partials.navbar')
        <!-- navbar end -->

        <!-- Page Content -->
        @yield('content')
        <!-- Container END-->

        <!-- footer start -->
        @include('layouts.partials.footer')
        <!-- footer -->


        <a id="goTop" class="btn btn btn-secondary" style="z-index:999;position: fixed;right: 20px;bottom: 100px;" href="javascript:scroll(0,0)"><i class="fas fa-chevron-up"></i> Top</a>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
        <script>
            $(function () {
                // Textarea輸入框
                $('textarea').ckeditor();

                // Go Top 按鈕滑動效果
                $.extend($.easing, {
                    easeOutExpo: function (x, t, b, c, d) {
                        return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
                    }
                });
                $("#goTop").click(function(){
                    $("html, body").animate({scrollTop: 0}, 1000, "easeOutExpo");
                });

                //驗證碼
                $('img.captcha-img').on('click', function () {
                    var captcha = $(this);
                    var config = captcha.data('refresh-config');
//                    console.log(config);
                    $.ajax({
                        method: 'GET',
                        url: '/get_captcha/' + config,
                    }).done(function (response) {
                        captcha.prop('src', response);
                    });
                });
            });
        </script>
    </body>
</html>