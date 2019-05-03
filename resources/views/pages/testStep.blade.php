
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
<body>
    <div class="container-fluid">
        <h2>List of test step </h2>
        <button class="btn" style="background:#006df0; color:white;margin-bottom:20px;" data-toggle="modal" data-target="#createModal"><a href="#createModal"><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a>Create Test Step</button>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Expected Results</th>
                </tr>
            </thead>
            
            
            <tbody>
                    @foreach ($testCase->testSteps as $item)    
                <tr>
                    <td>
                    <a href="#" id="editData" data-id="{{$item->id}}" data-name="{{$item->name}}" data-action="{{$item->action}}" data-expectedresult="{{$item->expected_result}}" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-id="{{$item->id}}" data-title="{{$item->name}}" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete text-info"></i></a>
                        <span>{{ $item->id }}</span>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->action }}</td>
                    <td>{{ $item->expected_result }}</td>
                </tr>               
                @endforeach
            </tfoot>
        </table>
    </div>
    @endsection
     <!-- create Modal -->
     <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Create New Test Step</h5>
                </div>
                <form action="{{action('testStepController@store')}} " method="POST">
                    @csrf
                    <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                                <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Action:</label>
                                <div class="col-sm-9">
                                <input type="text" name="action" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Exspected Result:</label>
                                <div class="col-sm-9">
                                <input type="text" name="expected_result" class="form-control" autofocus>
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

      <!--End Create Test Step Modal -->

          <!--Delete Test Step Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Remove Test</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure that you want to remove the test from compaign?</p>
                        <p id="mPostTitle" ></p>
                    </div>
                    <form action="" id="mDelete" method="POST">
                        @csrf
                        @method('DELETE')
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-sm btn-primary">Yes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

    <!-- update test step Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Test Step</h5>
                </div>
                <form action="" method="POST" id="editForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                                <div class="col-sm-9">
                                <input type="text" value="" name="name" id="name" class="form-control" autofocus>
                                <p id="TestStep"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Action:</label>
                                <div class="col-sm-9">
                                <input type="text" value="" name="action" id="action" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Exspected Result:</label>
                                <div class="col-sm-9">
                                <input type="text" value="" name="expected_result" id="expected_result" class="form-control" autofocus>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

          {{-- end update test step modal --}}

    <script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}} "></script>
    <script src="{{asset('js/dataTables.colReorder.min.js')}} "></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                colReorder: true
            });


        });
        $('#deleteModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var postTitle = button.data('title')
        var id = button.data('id')
        var modal = $(this)
        modal.find('#mPostTitle').text(postTitle)
        var url ="{{url('testStep')}}/"+id;
        $('#mDelete').attr('action',url);   
    })

    $('#updateModal').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var postTitle = button.data('name')
        var action = button.data('action')
        var  = button.data('expectedresult')
        var id = button.data('id')expectedresult
        var modal = $(this)
        modal.find('#name').attr('value',postTitle)
        modal.find('#action').attr('value',action)
        modal.find('#expected_result').attr('value',expectedresult)
        var url ="{{url('testStep')}}/"+id;
        $('#editForm').attr('action',url);   
    })
    </script>
</body>