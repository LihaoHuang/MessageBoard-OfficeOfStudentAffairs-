<div class="col-md-3">
    <div class="card my-4 ">
        <h5 class="card-header text-white bg-info">個人資料</h5>
        <div class="card-body">
            @if(!Session::has('per'))
                <form id="login_form" class="form-horizontal" method="post" action="login">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="InputAccount" name="InputAccount" aria-describedby="emailHelp" placeholder="校務行政帳號" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="密碼">
                    </div>
                    <button form="login_form" type="submit" class="btn btn-primary">登入</button>
                </form>
            @else
                帳號: {{Session::get('per')}}@if(Session::get('is_per')) <span style="color: blue;">(管理者)</span>@endif<br/>
                姓名: {{Session::get('name')}}<br/>
                信箱: {{Session::get('email')}}<br/>
                登入時間: {{Session::get('time')}}<br/>
                <a onclick="return confirm('確定要登出嗎?');" href="logout" class="btn btn-danger">登出</a>
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
            <li class="list-group-item"><a href="/"  style="color:black;"><i class="fas fa-star"></i> 不分類</a></li>
            @foreach($boardkind as $index => $kind)
                <li class="list-group-item"><a href="/{{$kind->KIND_SN}}"  style="color:black;"><i class="fas fa-star"></i> {{$kind->KIND_DESC}}</a></li>
            @endforeach
        </ul>
    </div>
</div>