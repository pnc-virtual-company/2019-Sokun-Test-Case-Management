
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
    @include('sweetalert::alert')
<body>
    <div class="container-fluid">
        <h2>List of Campaigns </h2>
        <button class="btn" style="background:#006df0; color:white;margin-bottom:15px; font-weight:600;" data-toggle="modal" data-target="#createModal" ><i class="mdi mdi-plus-circle"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="create campaign"></i></a> Create Campaign</button>
        @if (Session::has('message'))

            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="48px">Action</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Short Description</th>
                    <th style="width: 108px;">Status</th>
                </tr>
            </thead>
            @foreach ($campaign as $item)
                
            <tbody>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$item->id}}" data-name="{{$item->name}}" data-startdate="{{$item->start_date}}" data-enddate="{{$item->end_date}}" data-description="{{$item->description}}" ><i class="mdi mdi-pencil text-info"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}" data-title="{{$item->name}}"><i class="mdi mdi-delete text-info" style="color:red;" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        <a href="{{route('campaignListTest.show',$item->id)}} "><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="List of Tests"></i></a> 
                    </td>
                <td>{{$item->name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->description}}</td> 
                    <td>
                        @if($item->status == 0)
                            <input type="text" value="Not Run" disabled class="form-control" style="width: 130px; color:grey;"> 
                        @elseif($item->status == 1)
                            <input type="text" value="Passed" disabled class="form-control" style="width: 130px; color:green;"> 
                        @elseif($item->status == 2)
                            <input type="text" value="Failed" disabled class="form-control" style="width: 130px; color:red;"> 
                        @elseif($item->status == 3)
                            <input type="text" value="In Progress" disabled class="form-control" style="width: 130px; color:orange;"> 
                        @endif
                    </td> 
                </tr>                                
            </tbody>
            @endforeach
        </table>
        
    </div>
    @endsection
<!--Start create campaign modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Campagin</h5>
                </div>
            <form action="{{action('CampaignController@store')}}" method="POST" autocomplete="off">
            {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;" >Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 "  style="margin-top: 10px;" >Start Date:</label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker" name="start_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 " style="margin-top: 10px;" >End Date:</label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker2" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" required>
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
<!-- The end create campaign modal -->
<!-- Start update campaign modal-->
<div  class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Campagin</h5>
                </div>
            <form action="" method="POST" id="updateForm" autocomplete="off">
            @csrf
            @method('PATCH')
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" value="" class="form-control"  name="name" id="name" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 "  style="margin-top: 10px;" >Start Date:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="" id="start_date" name="start_date"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="#" class="col-sm-3 " style="margin-top: 10px;" >End Date:</label>
                        <div class="col-sm-9">
                                <input type="date" value="" id="end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                        <div class="col-sm-9">
                            <input type="text" value="" name="description" id="description" class="form-control" required>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi mdi-restore"></span> Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- The end update campaign modal -->
<!--Start delete campaign  modal -->
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
<!--The end delete modal -->
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

        $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var startdate = button.data('startdate')
        var enddate = button.data('enddate')
        var description = button.data('description')
        var modal = $(this)
        modal.find('#name').attr('value',name)
       
        modal.find('#start_date').attr('value',startdate)
        modal.find('#end_date').attr('value',enddate)
        modal.find('#description').attr('value',description)
        var url = "{{url('campaign')}}/"+id;
        $('#updateForm').attr('action',url);
        });


        $('#deleteModal').on('show.bs.modal',function(event){
        var button=$(event.relatedTarget)
        var id =button.data('id')
        var title =button.data('title')
        var modal=$(this)
        modal.find('#title').text(title)
        var url = "{{url('campaign/')}}/"+id;
        $("#fDelete").attr('action',url);
  });

 
document.getElementById('start_date').value = moment().format('YYYY-MM-DD');
document.getElementById('end_date').value = moment().format('YYYY-MM-DD');
    </script>
</body>