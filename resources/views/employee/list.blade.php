@extends('layouts.app')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-4 col-xs-3">
                <h4 class="page-title">Employee</h4>
            </div>
            <div class="col-sm-8 col-xs-9 text-right m-b-20">
                <a href="#" class="btn btn-primary rounded pull-right" data-toggle="modal" data-target="#add_Employee"><i
                        class="fa fa-plus"></i> Add Employee</a>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>First Name </th>
                                <th>Last Name </th>
                                <th>Email </th>
                                <th>Cell number</th>
                                <th>Position</th>
                                <!-- <th>Picture </th> -->
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <td class="First_Name{{$employee->id}}">{{$employee->First_Name}}</td>
                                <td class="Last_Name{{$employee->id}}">{{$employee->Last_Name}}</td>
                                <td class="Email{{$employee->id}}">{{$employee->email}}</td>
                                <td class="Cell_number{{$employee->id}}">{{$employee->Cell_number}}</td>
                                <td class="Position{{$employee->id}}">{{$employee->Position}}</td>
                                <p class="Password{{$employee->id}}"  style="display:none">{{$employee->password}}</p>
                                <!-- <td class="Picture{{$employee->id}}">{{$employee->Picture}}</td> -->
                                <td>
                                    <div class="dropdown action-label">
                                        <?php 
                                            $status = $employee->Status;

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
                                                <a href="{{ route('active_employee') }}" onclick="event.preventDefault(); document.getElementById('employee_active{{$employee->id}}').submit();"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                
                                                <form id="employee_active{{$employee->id}}" action="{{ route('active_employee') }}" method="POST" class="d-none">
                                                    @csrf
                                                     <input class="form-control delete_id" required type="hidden" name="employee_active" value="{{$employee->id}}">
                                                </form>

                                            </li>
                                            <li><a href="{{ route('inactive_employee') }}" onclick="event.preventDefault(); document.getElementById('employee_inactive{{$employee->id}}').submit();"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                            <form id="employee_inactive{{$employee->id}}" action="{{ route('inactive_employee') }}" method="POST" class="d-none">
                                                    @csrf
                                                    <input class="form-control delete_id" required type="hidden" name="employee_inactive" value="{{$employee->id}}">
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
                                            <li><a href="#" data-toggle="modal" class="edit_employee_details" data-id="{{$employee->id}}" data-target="#edit_employee"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a></li>
                                            <li><a href="#" data-toggle="modal" data-id="{{$employee->id}}" class="delete_employee_detail" data-target="#delete_employee"><i
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
<div id="add_Employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee</h4>
            </div>
            <div class="modal-body">
                <div class="m-b-30">
                    <form method="POST" action="{{ route('create_Employee') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="first_name">
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
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="email" name="Email">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cell number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control floating" required type="text" name="Cell_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Position <span class="text-danger">*</span></label>
                                    <select class="select floating" required name="Position"> 
                                        <option value="Manager">Manager</option>
                                        <option value="Senior Accountant">Senior Accountant</option>
                                        <option value="Junior Accountant">Junior Accountant</option>
                                        <option value="Chartered Accountant">Chartered Accountant</option>
                                        <option value="Book Keeper">Book Keeper</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Password <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Password">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Picture <span class="text-danger">*</span></label>
                                    <input class="form-control" required type="text" name="Picture">
                                </div>
                            </div> -->
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Create Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Employee</h4>
            </div>
            <div class="modal-body">
                <div class="m-b-30">
                <form method="POST" action="{{ route('edit_employee') }}">
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
                                    <label class="control-label">Email <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Email" required type="email" name="edit_Email">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cell_number <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control edit_Cell_number floating" required type="text" name="edit_Cell_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Position <span class="text-danger">*</span></label>
                                    <select class="select floating edit_Position" required name="edit_Position"> 
                                        <option value="Manager">Manager</option>
                                        <option value="Senior Accountant">Senior Accountant</option>
                                        <option value="Junior Accountant">Junior Accountant</option>
                                        <option value="Chartered Accountant">Chartered Accountant</option>
                                        <option value="Book Keeper">Book Keeper</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Picture <span class="text-danger">*</span></label>
                                    <input class="form-control edit_Picture" required type="text" name="edit_Picture">
                                </div>
                            </div> -->
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary">Edit Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="delete_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-md">
            <div class="modal-header">
                <h4 class="modal-title">Delete Employee</h4>
            </div>
            <div class="modal-body card-box">
                <p>Are you sure want to delete this?</p>
                <form id="delete_employee" action="{{ route('delete_employee') }}" method="POST" class="d-none">
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
        $(".edit_employee_details").click(function () {
            $id = $(this).data('id');
            $First_Name = $(".First_Name"+$id).text();
            $Last_Name = $(".Last_Name"+$id).text();
            $Email = $(".Email"+$id).text();
            $Cell_number = $(".Cell_number"+$id).text();
            $Position = $(".Position"+$id).text();
            $Password = $(".Password"+$id).text();
            // $Picture = $(".Picture"+$id).text();
            $(".edit_id").val($id);
            $(".edit_first_name").val($First_Name);
            $(".edit_last_name").val($Last_Name);
            $(".edit_Email").val($Email);
            $(".edit_Cell_number").val($Cell_number);
            $(".edit_Position").val($Position);
            // $(".edit_Picture").val($Picture);
            
        });
        $(".delete_employee_detail").click(function () {
            $id = $(this).data('id');
            $(".delete_id").val($id);
        });
    });
</script>
@endsection