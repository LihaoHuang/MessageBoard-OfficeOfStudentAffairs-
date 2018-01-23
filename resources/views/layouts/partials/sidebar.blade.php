<div class="col-md-3">
    <div class="card my-4 ">
        <h5 class="card-header text-white bg-info">個人資料</h5>
        <div class="card-body">
            @if(true)
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="InputAccount" aria-describedby="emailHelp" placeholder="校務行政帳號" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="InputPassword" placeholder="密碼">
                    </div>
                    <button type="submit" class="btn btn-primary">登入</button>
                </form>
            @else
                帳號: 40343232<br/>
                姓名: 黃立豪<br/>
                信箱: 40343232@gm.nfu.edu.tw
                登入時間: 2018/01/23
                <button type="submit" class="btn btn-danger">登出</button>
            @endif
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4 ">
        <h5 class="card-header text-white bg-info">學生事務處</h5>
        <div class="card-body">
            <a href="http://student.nfu.edu.tw/index/board.php">
                <img width="100%" src="{{asset("img/office_of_student_affairs.png")}}">
            </a>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4 ">
        <h5 class="card-header text-white bg-info">快速服務網</h5>
        <div class="card-body">
            <a href="http://response.nfu.edu.tw/login.php">
                <img width="100%" src="{{asset("img/response.png")}}">
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