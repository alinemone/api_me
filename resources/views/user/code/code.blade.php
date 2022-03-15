@extends('./user/layout/app')

@section('content')
    <div class="row" onload="get_code()">
        <div class="col-12">
            <div class="toolbar-ui">
                <h1 class="text-dark fs-5 fw-bold">{{__('messages.seo.code')}}</h1>
            </div>
        </div>
    </div>
    <div class="row clearfix">

        <div class="col-md-4">
            <div class="card pb-0">
                <div class="header">
                    <h5>کد ملی فیک</h5>
                </div>
                <div class="body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="code" id="code" readonly="readonly" class="form-control" placeholder="کد ملی" value="">
                                </div>
                            </div>
                            <div class="col-md-3 p-md-2 d-flex justify-content-md-center">
                                <div class="form-group">
                                    <button  class="btn-sm btn-primary-ui" onclick="get_code()" title="جدید"><i class="ri-restart-line"></i></button>
                                    <button  class="btn-sm btn-primary-ui" onclick="copy()"  title="کپی"><i class="ri-file-copy-line"></i></button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        @include('./user/code/check_code')
        @include('./user/code/check_city_code')

    </div>
@endsection

