
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
        <h2>List of Test Case </h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Short Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('testStepList.index')}} "><i class="mdi mdi-format-list-bulleted"  aria-hidden="true"></i></a> 
                        <span>1</span>
                    </td>
                    <td>Header</td>
                    <td>John Bill</td>
                    <td>Test header display</td>
                </tr>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('testStepList.index')}} "><i class="mdi mdi-format-list-bulleted"  aria-hidden="true"></i></a> 
                        <span>2</span>
                    </td>
                    <td>Screen 1</td>
                    <td>Bana</td>
                    <td>Test form field in screen 1</td>
                </tr>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('testStepList.index')}} "><i class="mdi mdi-format-list-bulleted"  aria-hidden="true"></i></a> 
                        <span>3</span>
                    </td>
                    <td>Screen 2</td>
                    <td>Bana</td>
                    <td>Test form field in screen 2</td>
                </tr>
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('testStepList.index')}} "><i class="mdi mdi-format-list-bulleted"  aria-hidden="true"></i></a> 
                        <span>4</span>
                    </td>
                    <td>FAQ</td>
                    <td>Chirata</td>
                    <td>Check FAQ content</td>
                </tr>
            </tfoot>
        </table>
        <button class="btn btn-sm" style="background:#006df0; color:white;" data-toggle="modal" data-target="#createModal"><a href=""><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a>Create Test Case</button>
    </div>
    @endsection

           <!-- Modal -->
           <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Test Case</h5>
                    </div>
                    <div class="modal-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">User:</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                                            <option selected>Choose...</option>
                                            <option value="1">Jonh Bill</option>
                                            <option value="2">Bona</option>
                                            <option value="3">Smita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Description:</label>
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
           <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Test Case</h5>
                </div>
                <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                                <div class="col-sm-9">
                                <input type="password" class="form-control" autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">User:</label>
                                <div class="col-sm-9">
                                    <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                                        <option selected>Choose...</option>
                                        <option value="1">Jonh Bill</option>
                                        <option value="2">Bona</option>
                                        <option value="3">Smita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Description:</label>
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




          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Remove Test</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure that you want to remove the test case?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-sm btn-primary">Yes</button>
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
        });
    </script>
</body>