<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <title>學生事務處 留言板</title>

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
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img width="200px" src="{{asset("img/nfu.png")}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">首頁
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            留言分類
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 宿舍</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 租屋</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 學生活動</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 社團</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 獎助學金</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 急難救助</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 助學</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 貸款</a>
                            <a class="dropdown-item" href="#"><i class="fas fa-star"></i> 工讀以及校內外安全</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">登入</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation END -->

    <!-- Page Content -->
    <div class="container" style="">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="my-4">學生事務處
                    <small>
                        留言板
                        <h5 style="display: inline">
                            <span class="badge badge-pill badge-primary">宿舍</span>
                        </h5>
                    </small>
                </h1>

                <!-- Blog Post -->
                <div class="card border-info article">
                    <div class="card border-light post">
                        <div class="card-header text-muted">
                            編號: 001 發文者: 黃立豪 (2018/01/01)
                            <button type="button" class="btn btn-sm btn-info">
                                回覆 <i class="fas fa-check"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">住宿生是否能換房</h5>
                            <p class="card-text">如果住的房間裡面的人跟自己的生活作息相差太大(例如:同房住宿生經常晚上2、3點才睡，並且使用語音聊天)使晚上睡覺時非常難以入眠，能否申請換房換到同一層樓無人使用的空床位?</p>
                            {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                        </div>
                    </div>
                    <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                    <div class="card border-light message">
                        <div class="card-header text-muted">
                            留言者: 生輔組 (2018/01/01)
                        </div>
                        <div class="card-body">
                            <p class="card-text">同學您好，如果有更換床位的需求，請先到生輔組辦公室（行政大樓一樓電梯旁）拿更換床位的申請單填寫，在填寫完畢後會再聯絡您進行一個訪談瞭解您目前的住宿狀況、實際需求和期待，視情況為您再做安排。</p>
                        </div>
                    </div>
                </div>

                <div class="card border-info article">
                    <div class="card border-light post">
                        <div class="card-header text-muted">
                            編號: 002 發文者: 黃立豪 (2018/01/01)
                            <button type="button" class="btn btn-sm btn-info">
                                回覆 <i class="fas fa-check"></i>
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">男三宿廁所清潔</h5>
                            <p class="card-text">男三宿清潔公司是否還有在清潔廁所
                                學期初時宿舍的整潔一直都很好
                                但在填完問卷後感覺就走樣了
                                請問能否改善一下
                                希望我還能看到當初的乾淨景象
                                ps.我是4f的小學弟</p>
                            {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                        </div>
                    </div>
                    <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                    <div class="card border-light message">
                        <div class="card-header text-muted">
                            留言者: 生輔組 (2018/01/01)
                        </div>
                        <div class="card-body">
                            <p class="card-text">同學您好:
                                學生宿舍環境由清潔人員負責打掃，如同學認為宿舍公用廁所清潔有需改善之處，煩請至生輔組說明舍別及樓層，以便請清潔人員加強改善，謝謝您的協助!
                            </p>
                        </div>
                    </div>
                </div>


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; 上一頁</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">下一頁 &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">
                <!-- Categories Widget -->
                <div class="card my-4 ">
                    <h5 class="card-header text-white bg-info">學生事務處</h5>
                    <div class="card-body">
                        <a href="http://student.nfu.edu.tw/index/board.php">
                            <img width="100%" src="{{asset("img/office_of_student_affairs.png")}}">
                        </a>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4 card card-inverse card-warning">
                    <h5 class="card-header text-white bg-info">留言分類</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 宿舍</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 租屋</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 學生活動</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 社團</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 獎助學金</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 急難救助</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 助學</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 貸款</a></li>
                        <li class="list-group-item"><a href="#"  style="color:black;"><i class="fas fa-star"></i> 工讀以及校內外安全</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- Container END-->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">
                Copyright © 2017 國立虎尾科技大學. All rights reserved.
                </br>~平台維護：系統設計組~
            </p>
        </div>
        <!-- /.container -->
    </footer>
    <!-- Footer END-->

    <a class="btn btn btn-secondary" style="z-index:999;position: fixed;right: 20px;bottom: 100px;" href="javascript:scroll(0,0)"><i class="fas fa-chevron-up"></i> Top</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

</body>
</html>