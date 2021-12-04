@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">Clients</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_client"><i
                        class="fa fa-plus"></i> Add Client</a>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>Company_name</th>
                                <th>Business_number</th>
                                <th>first_name</th>
                                <th>last_name</th>
                                <th>Phone_number</th>
                                <th>Cell_number</th>
                                <th>Carriers</th>
                                <th>HST_number</th>
                                <th>Website</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>
                                    <a href="client-profile.html" class="avatar">G</a>
                                    <h2><a href="client-profile.html">Global Technologies</a></h2>
                                </td>
                                <td>CLT-0001</td>
                                <td>first_name</td>
                                <td>last_name</td>
                                <td>Phone_number</td>
                                <td>Cell_number</td>
                                <td>Carriers</td>
                                <td>HST_number</td>
                                <td>Website</td>
                                <td>
                                    <div class="dropdown action-label">
                                        <a class="btn btn-white btn-sm rounded dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-dot-circle-o text-success"></i> Active
                                            <i class="caret"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" data-target="#edit_client"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#delete_client"><i
                                                        class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr> -->
                            @foreach ($clients as $client)
                            <tr>
                                <td>
                                    <!-- <a href="client-profile.html" class="avatar">G</a> -->
                                    <h2><a href="client-profile.html" class="Company_name{{$client->id}}">{{$client->Company_name}}</a></h2>
                                </td>
                                <td class="Business_number{{$client->id}}">{{$client->Business_number}}</td>
                                <td class="first_name{{$client->id}}">{{$client->first_name}}</td>
                                <td class="last_name{{$client->id}}">{{$client->last_name}}</td>
                                <td class="Phone_number{{$client->id}}">{{$client->Phone_number}}</td>
                                <td class="Cell_number{{$client->id}}">{{$client->Cell_number}}</td>
                                <td class="Carriers{{$client->id}}">{{$client->Carriers}}</td>
                                <td class="HST_number{{$client->id}}">{{$client->HST_number}}</td>
                                <td class="Website{{$client->id}}">{{$client->Website}}</td>
                                <td>
                                    <div class="dropdown action-label">
                                        <?php 
                                            $status = $client->Status;

                                        ?>
                                        @if($status == 0)
                                        <a class="btn btn-white btn-sm rounded dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-success"></i> Active
                                            <i class="caret"></i>
                                        </a>
                                        @else
                                        <a class="btn btn-white btn-sm rounded dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fa fa-dot-circle-o text-danger"></i> Inactive
                                            <i class="caret"></i>
                                        </a>
                                        @endif

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('active_client') }}" onclick="event.preventDefault(); document.getElementById('client_active{{$client->id}}').submit();"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                
                                                <form id="client_active{{$client->id}}" action="{{ route('active_client') }}" method="POST" class="d-none">
                                                    @csrf
                                                     <input class="form-control delete_id" required type="hidden" name="client_active" value="{{$client->id}}">
                                                </form>

                                            </li>
                                            <li><a href="{{ route('inactive_client') }}" onclick="event.preventDefault(); document.getElementById('client_inactive{{$client->id}}').submit();"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            <form id="client_inactive{{$client->id}}" action="{{ route('inactive_client') }}" method="POST" class="d-none">
                                                    @csrf
                                                    <input class="form-control delete_id" required type="hidden" name="client_inactive" value="{{$client->id}}">
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#" data-toggle="modal" class="edit_client_details" data-id="{{$client->id}}" data-target="#edit_client"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-id="{{$client->id}}" class="delete_client_detail" data-target="#delete_client"><i
                                                        class="fa fa-trash-o m-r-5"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="add_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Add Client</h4>
            </div>
            <div class="modal-body">
                <div class="m-b-30">
                    <form method="POST" action="{{ route('create_client') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="first_name">
                                    @error('first_name')
                                    <strong class="invalid-feedback d-block">{{ $message 
												}}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company_name <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Company_name">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Business_number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control floating" required type="text" name="Business_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phone_number <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Phone_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cell_number <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Cell_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Carriers <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Carriers">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">HST_number</label>
                                    <input class="form-control" type="text" name="HST_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Website</label>
                                    <input class="form-control" type="text" name="Website">
                                </div>
                            </div>

                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Create Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Client</h4>
            </div>
            <div class="modal-body">
                <div class="m-b-30">
                <form method="POST" action="{{ route('edit_client') }}">
                        @csrf
                        <input class="form-control edit_id" required type="hidden"name="edit_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control edit_first_name" required type="text"name="edit_first_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name <span class="text-danger">*</span></label>
                                    <input class="form-control edit_last_name" required type="text" name="edit_last_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Company_name <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Company_name" required type="text" name="edit_Company_name">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Business_number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control edit_Business_number floating" required type="text" name="edit_Business_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phone_number <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Phone_number" required type="text" name="edit_Phone_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cell_number <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Cell_number" required type="text" name="edit_Cell_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Carriers <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Carriers" required type="text" name="edit_Carriers">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">HST_number</label>
                                    <input class="form-control edit_HST_number" type="text" name="edit_HST_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Website</label>
                                    <input class="form-control edit_Website" type="text" name="edit_Website">
                                </div>
                            </div>

                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Edit Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete_client" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Client</h4>
            </div>
            <div class="modal-body card-box">
                <p>Are you sure want to delete this?</p>
                <form id="delete_client" action="{{ route('delete_client') }}" method="POST" class="d-none">
                                        @csrf
                <div class="m-t-20"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                        <input class="form-control delete_id" required type="hidden"name="delete_id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".edit_client_details").click(function () {
            $id = $(this).data('id');
            $Company_name = $(".Company_name"+$id).text();
            $Business_number = $(".Business_number"+$id).text();
            $first_name = $(".first_name"+$id).text();
            $last_name = $(".last_name"+$id).text();
            $Phone_number = $(".Phone_number"+$id).text();
            $Cell_number = $(".Cell_number"+$id).text();
            $Carriers = $(".Carriers"+$id).text();
            $HST_number = $(".HST_number"+$id).text();
            $Website = $(".Website"+$id).text();
            $(".edit_id").val($id);
            $(".edit_first_name").val($first_name);
            $(".edit_last_name").val($last_name);
            $(".edit_Company_name").val($Company_name);
            $(".edit_Business_number").val($Business_number);
            $(".edit_Phone_number").val($Phone_number);
            $(".edit_Cell_number").val($Cell_number);
            $(".edit_Carriers").val($Carriers);
            $(".edit_HST_number").val($HST_number);
            $(".edit_Website").val($Website);
            
        });
        $(".delete_client_detail").click(function () {
            $id = $(this).data('id');
            $(".delete_id").val($id);
        });
    });
</script>
@endsection