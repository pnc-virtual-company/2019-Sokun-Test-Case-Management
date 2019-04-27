
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
   
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
        <h2>List of Test Case Steps </h2>
        <p>Execution of test XXX in Campaign XXX</p>
        <button class="btn btn-primary pull-right">Save</button><br><br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Expected Result</th>
                    <th>Execution Date</th>
                    <th>Status</th>
                    <th>Actual Reslut</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span>1</span>
                    </td>
                    <td>Logo</td>
                    <td>Check the size of the logo</td>
                    <td>Logo should fit header</td>
                    <td>
                        <input id="datepicker" width="200px"/>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                            <option selected>Choose...</option>
                            <option value="">Passed</option>
                            <option value="">Failed</option>
                            <option value="">Not run</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control"/></td>
                </tr>
                <tr>
                    <td>
                        <span>2</span>
                    </td>
                    <td>Header Title</td>
                    <td>Check the content of header</td>
                    <td>The title in header is "xxxx"</td>
                    <td><input id="datepicker2"/></td>
                    <td>
                            <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref">
                                <option selected>Choose...</option>
                                <option value="">Passed</option>
                                <option value="">Failed</option>
                                <option value="">Not run</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control"/></td>
                </tr>
            </tfoot>
        </table>
    </div>
    @endsection

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
            $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
            $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap'
        });
        });
    </script>
</body>