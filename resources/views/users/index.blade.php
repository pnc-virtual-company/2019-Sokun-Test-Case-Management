
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
    @include('sweetalert::alert')
    <div class="container">
        <div class="row justify-content-center">
            <h2>List of users</h2>
            <button class="btn" style="background:#006df0; color:white;margin-bottom:20px; font-weight:600;" data-toggle="modal" data-target="#createModal"><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a> Add User</button>
            <a  href="{{url('users/export')}}" download>
            <button class="btn" style="background:#006df0; color:white;margin-bottom:20px; font-weight:600;" ><i class="mdi mdi-plus-circle"  aria-hidden="true"></i> @lang('Export to Excel')</button></a>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>@lang('ID')</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Email')</th>
                        <th>@lang('Roles')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                            <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                            <a href="" aria-hidden="true" data-toggle="modal" data-target="#showModal" title="@lang('view')" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}"><i class="mdi mdi-eye clickable text-success"></i></a>
                            
                            <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal" data-id="{{$user->id}}" data-title="{{$user->name}}"><i class="mdi mdi-delete text-info" style="color:red;"></i></a>
                               
                                <span>{{ $user->id }}</span>
                            </td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td>{{ $user->roles->pluck('name')->implode(', ') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
     <!-- create user modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                </div>
                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                @csrf
                   {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control"  id="email"  value="{{ old('email') }}" name="email" autofocus required>
                        </div>
                        </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Password:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control"  id="password" name="password" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Roles:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="roles" name="roles[]" >
                                @foreach ($roles as $role)            
                                    <option value="{{ $role->id }}" @if (!empty(old('roles'))) @if(in_array($role->id, old('roles'))) selected @endif @endif>{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span> Create</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- the end of create user modal -->
    <!-- start update usere modal -->
    <div  class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                <div class="modal-body">   
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" value="{{$user->name}}" name="name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control"  id="email"  value="{{$user->email}}" name="email" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="roles[]" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Roles:</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="roles" name="roles[]" multiple size="3" >
                                @foreach ($roles as $role)            
                                    <option value="{{ $role->id }}" @if (!empty(old('roles'))) @if(in_array($role->id, old('roles'))) selected @endif @endif>{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span>update</button> 
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- the end of update user by modal -->
    <!-- strat show user by use modal -->
    <div  class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Show User</h5> 
                    
                </div>
                <div class="modal-body">
                
                <img src="{{asset('storage/images/'.Auth::user()->avatar)}}" style="width:130px; height:130px; float:left; border-radius:50%; margin-right:25px;"  alt="Photo cannot find">
                       <br>
                       
                        <div class="form-group">
                        <p>@lang('User details')</p>
                            <label for="name">@lang('Name'): {{$user->name}}</label><br>
                            <label for="email">@lang('Email') : {{$user->email}}</label>
                            <br>
                            <label for="roles[]">Roles :</label>
                        </div>
                        <div class="form-group">
                                <a class="btn btn-info text-center" href="{{url('users')}}">@lang('Back to list')</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- the end show user by use modal -->
    <!-- start delete user by modal -->
<div  class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
                <div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>	
				<h4 class="modal-title">Are you sure?</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<p>Do you really want to delete these records? This process cannot be undone.</p>
			</div>
            <form  id="fDelete" action="" method="POST" autocomplete="off">
            @csrf
            @method('DELETE')
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-danger">Delete</button>
			</div>
            </form>
		</div>
	</div>
</div>     
    <!-- the end of delete user by use modal -->

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}} "></script>
    <script src="{{asset('js/dataTables.colReorder.min.js')}} "></script>
    <script>
      $(document).ready(function () {
            flatpickr("#start_date", {
                dateFormat: "d/m/Y",
            });
            flatpickr("#end_date", {
                dateFormat: "d/m/Y",
            });
            $('#example').DataTable({
                colReorder: true
            });
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
            $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap'
        });
            
        });

    //    update user modal 
        $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var password = button.data('password')

        var modal = $(this)
        modal.find('#name').attr('value',name)
        modal.find('#email').attr('value',email)
        modal.find('#password').attr('value',password)
        
       var url = "{{url('users')}}/"+id;
        $('#updateForm').attr('action',url);
        });

    // show use modal
        $('#showModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var password = button.data('passwod')
        var modal = $(this)
        modal.find('#name').attr('value',name)
        modal.find('#email').attr('value',email)
        modal.find('#password').attr('value',password)
        var url = "{{url('users')}}/"+id;
        $('#showForm').attr('action',url);
        });

   // delete user modal
        $('#deleteModal').on('show.bs.modal',function(event){
        var button=$(event.relatedTarget)
        var id =button.data('id')
        var title =button.data('title')
        var modal=$(this)
        modal.find('#title').text(title)
        var url = "{{url('users')}}/"+id;
        $("#fDelete").attr('action',url);
  });

    </script>
</body>