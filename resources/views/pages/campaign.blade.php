
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
        <h2>List of Campaign </h2>
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
                <tr>
                    <td>
                        <a href=""><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('campaignListTest.index')}} "><i class="mdi mdi-format-align-left"  aria-hidden="true"></i></a> 
                        <span>1</span>
                    </td>
                    <td>Version1</td>
                    <td>20/12/2020</td>
                    <td>25/12/2020</td>
                    <td>Test Primary Component</td>
                </tr>
                <tr>
                    <td>
                        <a href=""><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('campaignListTest.index')}} "><i class="mdi mdi-format-align-left"  aria-hidden="true"></i></a> 
                        <span>2</span>
                    </td>
                    <td>Version2</td>
                    <td>20/12/2020</td>
                    <td>25/12/2020</td>
                    <td>Second Priorty Test</td>
                </tr>
                <tr>
                    <td>
                        <a href=""><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                        <a href="" aria-hidden="true" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete md-18 text-danger"></i></a>
                        <a href="{{route('campaignListTest.index')}} "><i class="mdi mdi-format-align-left"  aria-hidden="true"></i></a> 
                        <span>3</span>
                    </td>
                    <td>Version3</td>
                    <td>20/12/2020</td>
                    <td>25/12/2020</td>
                    <td>Finalize V2 Test</td>
                </tr>
            </tfoot>
        </table>
        <button class="btn btn-sm" style="background:#006df0; color:white;"><a href=""><i class="mdi mdi-plus-circle"  aria-hidden="true"></i></a>Create Campaign</button>
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
        });
    </script>
</body>