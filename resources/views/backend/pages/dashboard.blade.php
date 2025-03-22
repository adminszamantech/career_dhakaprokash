@extends('backend.layouts.template')
@section('content')
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('/storage/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                    alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total New Applicants <i
                        class="mdi mdi-chart-line mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">{{ $newApplicants }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('/storage/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                    alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total ShortListed Applicants<i
                        class="mdi mdi-bookmark-outline mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">{{ $shortApplicants }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('/storage/assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                    alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Previous Applicants <i
                        class="mdi mdi-diamond mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-5">{{ $prevApplicants }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
