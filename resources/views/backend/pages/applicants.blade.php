@extends('backend.layouts.template')
@push('admin_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        table.dataTable.no-footer {
            border-bottom: 2px solid #F2F2F2;
        }

        .nav-tabs .nav-link.active {
            background-color: #17a2b8;
            /* Bootstrap's bg-info color */
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="new-applicants-tab" data-bs-toggle="tab"
                                data-bs-target="#new-applicants" type="button" role="tab"
                                aria-controls="new-applicants" aria-selected="true">New Applicants</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="shortlist-applicants-tab" data-bs-toggle="tab"
                                data-bs-target="#shortlist-applicants" type="button" role="tab"
                                aria-controls="shortlist-applicants" aria-selected="true">ShortList Applicants</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="previous-tab" data-bs-toggle="tab" data-bs-target="#previous"
                                type="button" role="tab" aria-controls="previous" aria-selected="false">Previous
                                Applicants</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="new-applicants" role="tabpanel"
                            aria-labelledby="new-applicants-tab">
                            <div class="py-5" style="overflow-x:auto;">
                                <table id="newTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Action</th>
                                            <th>Name (bn)</th>
                                            <th>Name (en)</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Apply <br>Date</th>
                                            <th>DOB</th>
                                            <th>Education <br>Qualification</th>
                                            <th>Present <br>Occupation</th>
                                            <th>Work <br>Place</th>
                                            <th>Application <br>Type</th>
                                            <th>Tranning</th>
                                            <th>Applicant <br>Photo</th>
                                            <th>District</th>
                                            <th>Upazila</th>
                                            <th>Present <br>Address</th>
                                            <th>Permanent <br>Address</th>
                                            <th>University <br>Type</th>
                                            <th>University <br>Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newApplicants as $newApp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="">
                                                    <a href="{{ route('applicant.status', ['status' => 'delete', 'id' => $newApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Permanent Delete" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this applicant?');"><i
                                                            class="fa fa-trash"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'seen', 'id' => $newApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Applicant Seen"
                                                        class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'shortlist', 'id' => $newApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Shortlist" class="btn btn-sm btn-success"><i
                                                            class="fa fa-check"></i></a>
                                                </td>
                                                <td>{{ $newApp->bn_name ?? '' }}</td>
                                                <td>{{ $newApp->en_name ?? '' }}</td>
                                                <td>{{ $newApp->mobile ?? '' }}</td>
                                                <td>{{ $newApp->email ?? '' }}</td>
                                                <td>{{ Carbon\Carbon::parse($newApp->created_at)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($newApp->date_of_barth)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ $newApp->edu_qualification ?? '' }}</td>
                                                <td>{{ $newApp->present_address ?? '' }}</td>
                                                <td>{{ $newApp->work_place ?? '' }}</td>
                                                <td>{{ $newApp->application_type ?? '' }}</td>
                                                <td>{{ $newApp->journalism_tranning ?? '' }}</td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <img style="width:32px;"
                                                        src="{{ asset('/storage/assets/images/applicants/' . $newApp->applicant_photo) }}"
                                                        alt="photo">
                                                </td>
                                                <td>{{ $newApp->district->bn_name ?? '' }}</td>
                                                <td>{{ $newApp->upazila->bn_name ?? '' }}</td>
                                                <td>{{ $newApp->present_address ?? '' }}</td>
                                                <td>{{ $newApp->permanent_address ?? '' }}</td>
                                                <td>{{ $newApp->university_type ?? '' }}</td>
                                                <td>{{ $newApp->university_name ?? '' }}</td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shortlist-applicants" role="tabpanel"
                            aria-labelledby="shortlist-applicants-tab">
                            <div class="py-5" style="overflow-x:auto;">
                                <table id="shortlistTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Action</th>
                                            <th>Name (bn)</th>
                                            <th>Name (en)</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Apply <br>Date</th>
                                            <th>DOB</th>
                                            <th>Education <br>Qualification</th>
                                            <th>Present <br>Occupation</th>
                                            <th>Work <br>Place</th>
                                            <th>Application <br>Type</th>
                                            <th>Tranning</th>
                                            <th>Applicant <br>Photo</th>
                                            <th>District</th>
                                            <th>Upazila</th>
                                            <th>Present <br>Address</th>
                                            <th>Permanent <br>Address</th>
                                            <th>University <br>Type</th>
                                            <th>University <br>Name</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($shortApplicants as $shortApp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="">
                                                    <a href="{{ route('applicant.status', ['status' => 'delete', 'id' => $shortApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Permanent Delete" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this applicant?');"><i
                                                            class="fa fa-trash"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'seen', 'id' => $shortApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Applicant Seen"
                                                        class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'unshortlist', 'id' => $shortApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Unshortlist" class="btn btn-sm btn-success"><i
                                                            class="fa fa-close"></i></a>
                                                </td>
                                                <td>{{ $shortApp->bn_name ?? '' }}</td>
                                                <td>{{ $shortApp->en_name ?? '' }}</td>
                                                <td>{{ $shortApp->mobile ?? '' }}</td>
                                                <td>{{ $shortApp->email ?? '' }}</td>
                                                <td>{{ Carbon\Carbon::parse($shortApp->created_at)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($shortApp->date_of_barth)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ $shortApp->edu_qualification ?? '' }}</td>
                                                <td>{{ $shortApp->present_address ?? '' }}</td>
                                                <td>{{ $shortApp->work_place ?? '' }}</td>
                                                <td>{{ $shortApp->application_type ?? '' }}</td>
                                                <td>{{ $shortApp->journalism_tranning ?? '' }}</td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <img style="width:32px;"
                                                        src="{{ asset('/storage/assets/images/applicants/' . $shortApp->applicant_photo) }}"
                                                        alt="photo">
                                                </td>
                                                <td>{{ $shortApp->district->bn_name ?? '' }}</td>
                                                <td>{{ $shortApp->upazila->bn_name ?? '' }}</td>
                                                <td>{{ $shortApp->present_address ?? '' }}</td>
                                                <td>{{ $shortApp->permanent_address ?? '' }}</td>
                                                <td>{{ $shortApp->university_type ?? '' }}</td>
                                                <td>{{ $shortApp->university_name ?? '' }}</td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous" role="tabpanel" aria-labelledby="previous-tab">
                            <div class="py-5" style="overflow-x:auto;">
                                <table id="prevTable" class="table table-striped table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Action</th>
                                            <th>Name (bn)</th>
                                            <th>Name (en)</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Apply <br>Date</th>
                                            <th>DOB</th>
                                            <th>Education <br>Qualification</th>
                                            <th>Present <br>Occupation</th>
                                            <th>Work <br>Place</th>
                                            <th>Application <br>Type</th>
                                            <th>Tranning</th>
                                            <th>Applicant <br>Photo</th>
                                            <th>District</th>
                                            <th>Upazila</th>
                                            <th>Present <br>Address</th>
                                            <th>Permanent <br>Address</th>
                                            <th>University <br>Type</th>
                                            <th>University <br>Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($prevApplicants as $prevApp)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="">
                                                    <a href="{{ route('applicant.status', ['status' => 'delete', 'id' => $prevApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Permanent Delete" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this applicant?');"><i
                                                            class="fa fa-trash"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'unseen', 'id' => $prevApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Applicant Unseen"
                                                        class="btn btn-sm btn-info"><i class="fa fa-eye-slash"></i></a>
                                                    <a href="{{ route('applicant.status', ['status' => 'shortlist', 'id' => $prevApp->id]) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Applicant Shortlist" class="btn btn-sm btn-success"><i
                                                            class="fa fa-check"></i></a>
                                                </td>
                                                <td>{{ $prevApp->bn_name ?? '' }}</td>
                                                <td>{{ $prevApp->en_name ?? '' }}</td>
                                                <td>{{ $prevApp->mobile ?? '' }}</td>
                                                <td>{{ $prevApp->email ?? '' }}</td>
                                                <td>{{ Carbon\Carbon::parse($prevApp->created_at)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ Carbon\Carbon::parse($prevApp->date_of_barth)->format('Y-m-d') ?? '' }}
                                                </td>
                                                <td>{{ $prevApp->edu_qualification ?? '' }}</td>
                                                <td>{{ $prevApp->present_address ?? '' }}</td>
                                                <td>{{ $prevApp->work_place ?? '' }}</td>
                                                <td>{{ $prevApp->application_type ?? '' }}</td>
                                                <td>{{ $prevApp->journalism_tranning ?? '' }}</td>
                                                <td class="d-flex justify-content-center align-items-center">
                                                    <img style="width:32px;"
                                                        src="{{ asset('/storage/assets/images/applicants/' . $prevApp->applicant_photo) }}"
                                                        alt="photo">
                                                </td>
                                                <td>{{ $prevApp->district->bn_name ?? '' }}</td>
                                                <td>{{ $prevApp->upazila->bn_name ?? '' }}</td>
                                                <td>{{ $prevApp->present_address ?? '' }}</td>
                                                <td>{{ $prevApp->permanent_address ?? '' }}</td>
                                                <td>{{ $prevApp->university_type ?? '' }}</td>
                                                <td>{{ $prevApp->university_name ?? '' }}</td>


                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('admin_js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        $(document).ready(function() {
            $('#newTable').DataTable({
                "pageLength": 20,
                "lengthMenu": [10, 20, 50, 100]
            });
            $('#shortlistTable').DataTable({
                "pageLength": 20,
                "lengthMenu": [10, 20, 50, 100]
            });
            $('#prevTable').DataTable({
                "pageLength": 20,
                "lengthMenu": [10, 20, 50, 100]
            });
        });
    </script>
@endpush
