@extends('./user/layouts/app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="toolbar-ui">
                <h1 class="text-dark fs-5 fw-bold">{{__('messages.plans.user.index')}}</h1>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        @foreach($plans as $plan)
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="body">
                    <div class="row clearfix">
                        <div class="col">
                            <h5 class="mb-2">{{ $plan->price }} تومان</h5>
                            <small class="text-muted">{{$plan->name}}</small>
                            <br>
                            <small class="text-muted">{{$plan->description}}</small>
                        </div>
                        <div class="col-12">
                            <div class="row d-flex justify-content-end">
                                <form action="{{route('user.order.buy',[$plan->id])}}" method="POST" class="text-left">
                                    @csrf
                                    <a href="" style=" text-align: left; ">
                                        <button type="submit" class="btn btn-sm btn-default ac-btn-ui" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="خرید" aria-label="خرید">
                                            <i class="ri-shopping-basket-fill"></i>
                                        </button>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

