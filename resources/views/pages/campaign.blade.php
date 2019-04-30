
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
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
            <tbody>
                    @foreach ($data as $value)
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete text-info"></i></a>
                        <a href="{{route('campaignListTest.index')}} "><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true"></i></a> 
                        <span></span>
                    </td>
                <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->start_date}}</td>
                    <td>{{$value->end_date}}</td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->status}}</td>
                    
                </tr>
               
            </tfoot>
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
                <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-5">
                                                
                                                <label for="#" class="col-sm-6" style="margin-right:10%;margin-top:10%" >Start:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" id="datepicker" width="170px">
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="inputPassword" class="col-sm-6" style="margin-left:50%;margin-top:10%">End:</label>
                                            </div>
                                            <div class="col-md-7">
                                            <input type="text" id="datepicker2" width="170px">
                                        </div>
                                        </div>
                                    </div>
                                   
                                    
                                    </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control">
                                </div>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-sm btn-primary">Create</button>
                </div>
              </div>
            </div>
          </div>



      <!-- Modal -->

          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Remove Test</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure that you want to remove the test from compaign?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-sm btn-primary">Yes</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Modal -->
     <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Update List Of Campaign</h5>
            </div>
            <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                                
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            
                                            <label for="inputPassword" class="col-sm-6" style="margin-right:10%;margin-top:10%" >Start:</label>
                                        </div>
                                        <div class="col-md-7">
                                        <input id="datepicker" width="170px" autofocus  >
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="inputPassword" class="col-sm-6" style="margin-left:50%;margin-top:10%">End:</label>
                                        </div>
                                        <div class="col-md-7">
                                        <input id="datepicker2" width="170px" autofocus  >
                                    </div>
                                    </div>
                                </div>
                               
                                
                                </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px; ">Description:</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control">
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-sm btn-primary">Update</button>
            </div>
          </div>
        </div>
      </div>




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
        });
    </script>
</body>