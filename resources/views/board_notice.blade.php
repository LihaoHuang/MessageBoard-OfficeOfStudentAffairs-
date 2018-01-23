@extends('layouts.master')

@section('title', '留言板')

@section('content')
    <!-- Page Content -->
    <div class="container" style="">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="my-4">學生事務處
                    <small valign="center" align="center" valign="center">留言須知</small>
                </h1>
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    若留言涉及本校師長，請注意語詞的使用，謹守師生禮儀分際，若有不當或不敬的字眼，則刪除
                </div>
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    如涉及人身攻擊、公然侮辱、誹謗、偽造文書等，懲處方式除依照本校校規辦理外，相關刑事及民事責任則由發表人自負法律責任。
                </div>
                <!-- Blog Post -->
                <div class="card border-info article">
                    <div class="card border-light post">
                        <div class="card-header" style="font-weight: bold">
                            使用者使用本留言版發表文章時，必須遵循以下規範：
                        </div>
                        <div class="card-body">
                            <p class="card-text">1.　為鼓勵積極正面之意見，培養全校師生為自己言論負責的態度，鼓勵以真實姓名或 固定匿名名稱留言。且不得冒充他人。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">2.	應為自己所張貼的每一篇文章負責，並禁止利用留言板做為傳送或發表具威脅性、猥褻性、攻擊性的資料及文章。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">3.	應避免在公眾討論區討論私人事務。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">4.	應尊重他人的權益及隱私，委婉用詞以避免造成誤解及糾紛。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">5.	應遵守其它相關的法律規章，如涉及人身攻擊、公然侮辱、誹謗、偽造文書等，發表人應自負法律責任。</p>
                        </div>
                    </div>
                </div>

                <div class="card border-info article">
                    <div class="card border-light post">
                        <div class="card-header" style="font-weight: bold">
                            管理人員須尊重使用者發表的文章，但涉及下列事項者管理者有權刪除其文章：
                        </div>
                        <div class="card-body">
                            <p class="card-text">1.	涉及人身攻擊、漫罵或發佈不實言論之文章。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">2.	灌水之文章。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">3.	文章內容中所牽涉之當事人要求刪除之文章。</p>
                            <div class="dotted_line" style="border-top:1px dashed #cccccc;height: 1px;overflow:hidden"></div>
                            <p class="card-text">4.	違反本注意事項所訂定之使用者使用規範之文章。</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            @include('layouts.partials.sidebar')

        </div>
        <!-- /.row -->
    </div>
    <!-- Container END-->
@endsection