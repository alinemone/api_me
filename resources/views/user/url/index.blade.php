@extends('./user/layouts/app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="toolbar-ui">
                <h1 class="text-dark fs-5 fw-bold">{{__('messages.seo.url')}}</h1>
            </div>
        </div>
    </div>
    <div class="row clearfix">

        <div class="col-md-12">
            <div class="card pb-0">
                <div class="header">
                    <h5>لینک</h5>
                </div>
                <div class="body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="url" id="url" class="form-control" placeholder="لینک" value="">
                                    <div id="errors" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="col-md-3 p-md-2 d-flex justify-content-md-center">
                                <div class="form-group">
                                    <button  class="btn-sm btn-primary-ui" onclick="short_url(document.getElementById('url').value)" title="کوتاه کن"><i class="ri-scissors-2-fill"></i></button>
                                    <button  class="btn-sm btn-primary-ui" onclick="copy('url')"  title="کپی"><i class="ri-file-copy-line"></i></button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

    </div>
@endsection

