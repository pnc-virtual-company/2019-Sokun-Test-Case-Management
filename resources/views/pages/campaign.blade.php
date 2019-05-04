
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
<body>
    <div class="container-fluid">
        <h2>List of Campaign </h2>
        <button class="btn" style="background:#006df0; color:white;margin-bottom:20px;" data-toggle="modal" data-target="#createModal"><a href=""><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a>Create Campaign</button>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Short Description</th>
                </tr>
            </thead>
            @foreach ($campaign as $item)
                
          
            <tbody>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$item->id}}" data-name="{{$item->name}}" data-startdate="{{$item->start_date}}" data-enddate="{{$item->end_date}}" data-description="{{$item->description}}"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal" data-id="{{$item->id}}" data-title="{{$item->name}}"><i class="mdi mdi-delete text-info"></i></a>
                        <a href="{{route('campaignListTest.show',$item->id)}} "><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true"></i></a> 
                        <span>{{$item->id}}</span>
                    </td>
                <td>{{$item->name}}</td>
                    <td>{{$item->start_date}}</td>
                    <td>{{$item->end_date}}</td>
                    <td>{{$item->description}}</td> 
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
                <form action="{{action('CampaignController@store')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
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
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
                <form action="" method="POST" id="updateForm">
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
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
                  <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure to delete this campaign!!</p>
                   <small id="title"></small>
                </div>
              <form  id="fDelete" action="" method="POST">
                  @csrf
                @method('DELETE')
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">OK</button>
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