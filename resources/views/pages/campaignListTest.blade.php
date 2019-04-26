
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
        <h2>List of test in Campaign </h2>
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
                        <a href=""><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('testExecution.index')}} "><i class="mdi mdi-play text-info"  aria-hidden="true"></i></a>
                        <a href=""><i class="mdi  mdi-step-backward text-info"  aria-hidden="true"></i></a>
                        <span>1</span>
                    </td>
                    <td>Header</td>
                    <td>John Bill</td>
                    <td>Test header display</td>
                </tr>
                <tr>
                    <td>
                        <a href=""><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href=""><i class="mdi mdi-play text-info"  aria-hidden="true"></i></a>
                        <a href=""><i class="mdi mdi-step-backward text-info"  aria-hidden="true"></i></a>
                        <span>2</span>
                    </td>
                    <td>Screen 1 Form</td>
                    <td>Bonna Sue</td>
                    <td>Test From Field in screen 1</td>
                </tr>
            </tfoot>
        </table>
        <button class="btn btn-sm" style="background:#006df0; color:white;" data-toggle="modal" data-target="#exampleModal"><a href=""><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a>Add Test Case</button>
    </div>
    @endsection



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Test Case</h5>
            </div>
            <div class="modal-body">
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                    <option selected>Choose...</option>
                    <option value="1">Bill</option>
                    <option value="2">Bonna</option>
                    <option value="3">Smita</option>
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-sm btn-primary">Add</button>
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
                    <p>Are you sure that you want to remove the test from compaign?</p>
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