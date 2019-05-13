
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
<body>
    <div class="container-fluid">
        <h2>List of Campaign </h2>
        <button class="btn" style="background:#006df0; color:white;margin-bottom:20px; font-weight:600;" data-toggle="modal" data-target="#createModal"><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a> Create Campaign</button>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
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
                        <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$item->id}}" data-name="{{$item->name}}" data-startdate="{{$item->start_date}}" data-enddate="{{$item->end_date}}" data-description="{{$item->description}}"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                    <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}" data-title="{{$item->name}}"><i class="mdi mdi-delete text-info" style="color:red;"></i></a>
                        <a href="{{route('campaignListTest.show',$item->id)}} "><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true"></i></a> 
                        <span>{{$item->id}}</span>
                    </td>
                <td>{{$item->name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->description}}</td> 
                    <td>
                        @if($item->status == 0)
                            <input type="text" value="Not Run" disabled class="form-control" style="width: 130px;"> 
                        @elseif($item->status == 1)
                            <input type="text" value="Passed" disabled class="form-control" style="width: 130px;"> 
                        @elseif($item->status == 2)
                            <input type="text" value="Failed" disabled class="form-control" style="width: 130px;"> 
                        @elseif($item->status == 3)
                            <input type="text" value="In Progress" disabled class="form-control" style="width: 130px;"> 
                        @endif
                    </td> 
                </tr>                                
            </tbody>
            @endforeach
        </table>
        
    </div>
    @endsection
     <!-- create Modal -->
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
                                    <input type="text" class="form-control"  name="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="#" class="col-sm-3 "  style="margin-top: 10px;" >Start Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="datepicker" name="start_date" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="#" class="col-sm-3 " style="margin-top: 10px;" >End Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="datepicker2" name="end_date" class="form-control">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                                <div class="col-sm-9">
                                    <input type="text" name="description" class="form-control">
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

             <!-- Update Modal -->
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
                                    <input type="text" value="" class="form-control"  name="name" id="name" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="#" class="col-sm-3 "  style="margin-top: 10px;" >Start Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="" id="start_date" name="start_date" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="#" class="col-sm-3 " style="margin-top: 10px;" >End Date:</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="" id="end_date" name="end_date" class="form-control">
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                                <div class="col-sm-9">
                                    <input type="text" value="" name="description" id="description" class="form-control">
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



          <!-- Delete Modal -->
          <div  class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Campaign</h5>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to remove campaign ?</h5><p id="title" style="color:red;"></p>
                </div>
              <form  id="fDelete" action="" method="POST" autocomplete="off">
                  @csrf
                @method('DELETE')
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span> OK</button>
                </div>
            </form>
              </div>
            </div>
          </div>
    
              <!-- Modal -->
     


    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}} "></script>
    <script src="{{asset('js/dataTables.colReorder.min.js')}} "></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                colReorder: true
            });
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
            $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap'
        });
            $('.start_date').datepicker({
            uiLibrary: 'bootstrap'
        });
            $('.end_date').datepicker({
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
    </script>
</body>