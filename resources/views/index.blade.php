@extends('layouts.master')

@section('title', '留言板')

@section('content')
<!-- Page Content -->
@if(!Session::has('per'))
    <button class="btn btn btn-success" style="z-index:999;position: fixed;right: 20px;bottom: 150px;" onclick="document.getElementById('InputAccount').focus();alert('請先進行登入!');"><i class="fas fa-comment-alt"></i> 我要留言</button>
@else
    <!-- Button trigger modal -->
    <button class="btn btn btn-success" style="z-index:999;position: fixed;right: 20px;bottom: 150px;" data-toggle="modal" data-target="#MessageModel"><i class="fas fa-comment-alt"></i> 我要留言</button>
@endif

<div class="container" style="">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-9">

            <h1 class="my-4">學生事務處
                <small valign="center" align="center" valign="center">
                    留言板
                    <h5 style="display: inline">
                        <span class="badge badge-pill badge-primary"> {{is_null($board_kind)?"不分類":($boardkind[$board_kind-1]->KIND_DESC)}}</span>
                    </h5>
                    @if(!Session::has('per'))
                        <button type="button" id="message-btn" class="btn btn-success" onclick="document.getElementById('InputAccount').focus();alert('請先進行登入!');" style="float:right;">
                            <i class="fas fa-comment-alt"></i> 我要留言
                        </button>
                    @else
                        <!-- Button trigger modal -->
                        <button type="button" id="message-btn" class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#MessageModel">
                            <i class="fas fa-comment-alt"></i> 我要留言
                        </button>
                    @endif
                </small>
            </h1>

            <!-- Blog Post -->
            @foreach($messages as $m_index => $m)
            <div class="card border-info article">
                <div class="card border-light post">
                    <div class="card-header text-muted">
                        <span href="#" class="badge badge-success">{{sprintf("%04d", $m->BOARD_SN)}}</span>
                        暱稱: <a href="mailto:{{$m->BOARD_EMAIL}}">{{$m->BOARD_PETNAME}}</a> ({{substr($m->BOARD_TIME, 0, 16)}})
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#ResponseModel" style="float:right;">
                            回覆 <i class="fas fa-check"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$m->BOARD_TITLE}}</h5>
                        <p class="card-text">{{$m->BOARD_CONTENT}}</p>
                        {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
                    </div>
                </div>
                <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                @foreach($response as $r_index => $re)
                    @if($m_index == $r_index)
                        @foreach($re as $r)
                        <div class="card border-light message">
                            <div class="card-header text-muted">
                                留言者: <a href="mailto:{{$r->BOARD_EMAIL}}">{{$r->BOARD_PETNAME}}</a> ({{substr($r->BOARD_TIME, 0, 16)}})
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$r->BOARD_CONTENT}}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
            @endforeach


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
        @include('layouts.partials.sidebar')

    </div>
    <!-- /.row -->
</div>
<!-- Container END-->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="MessageModel" tabindex="-1" role="dialog" aria-labelledby="MessageModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MessageModelLabel">留言</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    善意提醒：本留言版為提供同學討論學生相關事務之公開園地，為讓大家有一個優質的交流空間，請大家留言時請勿惡意批評或人身攻擊。
                </div>
                <form id="MessageForm">
                    <div class="form-group">
                        <label for="MessageTitle" class="col-form-label">標題(必填): </label>
                        <input type="text" class="form-control" id="MessageTitle" placeholder="標題" required>
                    </div>
                    <div class="form-group">
                        <label for="MessageType">類型(必填):</label>
                        <select class="form-control" id="MessageType" required>
                            <option value="0">宿舍</option>
                            <option value="1">租屋</option>
                            <option value="2">學生活動</option>
                            <option value="3">社團</option>
                            <option value="4">獎助學金</option>
                            <option value="5">急難救助</option>
                            <option value="6">助學</option>
                            <option value="7">貸款</option>
                            <option value="8">工讀以及校內外安全</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="MessageName" class="col-form-label">暱稱(必填，對外以暱稱顯示):</label>
                        <input type="text" class="form-control" id="MessageName" placeholder="暱稱:(對外以暱稱顯示)" required>
                    </div>
                    <div class="form-group">
                        <label for="MessageEmail" class="col-form-label">信箱(必填):</label>
                        <input type="email" class="form-control" id="MessageEmail" placeholder="信箱" required>
                    </div>
                    <div class="form-group">
                        <label for="MessageCaptcha" class="col-form-label">
                            驗證碼(必填):
                            <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img myMOUSE" data-refresh-config="default" data-toggle="tooltip" data-placement="top" title="點選此處，更新驗證碼"">
                        </label>
                        <input type="text" class="form-control" id="MessageCaptcha" placeholder="驗證碼" required>
                    </div>
                    <div class="form-group">
                        <label for="MessageText" class="col-form-label">內容:</label>
                        <textarea class="form-control" id="MessageText"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" form="MessageForm" class="btn btn-primary">送出留言</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="ResponseModel" tabindex="-1" role="dialog" aria-labelledby="ResponseModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ResponseModelLabel">留言</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning" role="alert">
                    善意提醒：本留言版為提供同學討論學生相關事務之公開園地，為讓大家有一個優質的交流空間，請大家留言時請勿惡意批評或人身攻擊。
                </div>
                <form id="ResponseForm">
                    <div class="form-group">
                        <label for="ResponseName" class="col-form-label">暱稱(必填，對外以暱稱顯示):</label>
                        <input type="text" class="form-control" id="ResponseName" placeholder="暱稱:(對外以暱稱顯示)" required>
                    </div>
                    <div class="form-group">
                        <label for="ResponseEmail" class="col-form-label">信箱(必填):</label>
                        <input type="email" class="form-control" id="ResponseEmail" placeholder="信箱" required>
                    </div>
                    <div class="form-group">
                        <label for="ResponseCaptcha" class="col-form-label">
                            驗證碼(必填):
                            <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img myMOUSE" data-refresh-config="default" data-toggle="tooltip" data-placement="top" title="點選此處，更新驗證碼"">
                        </label>
                        <input type="text" class="form-control" id="ResponseCaptcha" placeholder="驗證碼" required>
                    </div>
                    <div class="form-group">
                        <label for="ResponseText" class="col-form-label">內容:</label>
                        <textarea class="form-control" id="ResponseText"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" form="ResponseForm" class="btn btn-primary">送出留言</button>
            </div>
        </div>
    </div>
</div>
@endsection