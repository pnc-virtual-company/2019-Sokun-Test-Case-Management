<head>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
        <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
        <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
    
    </head>
<body>
        @extends('layouts.app')
        @section('content') 
        <br><br>
        <br><br><br>  
    <div class="container-fluid">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <i class="btn btn-success">edit</i> <i class="btn btn-danger   ">delete</i> 
                    </td>
                    <td><i class="mdi mdi-format-align-left"  aria-hidden="true"></i></td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                        <td> <i class="btn btn-success">edit</i> <i class="btn btn-danger   ">delete</i> 
                        </td>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                        <td> <i class="btn btn-success">edit</i> <i class="btn btn-danger   ">delete</i> 
                        </td>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                </tr>
                <tr>
                        <td> <i class="btn btn-success">edit</i> <i class="btn btn-danger   ">delete</i> 
                        </td>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                </tr>
            </tfoot>
        </table>
    </div>
    @endsection
    <script src="{{asset('js/jquery-1.12.4.min.js')}} "></script>
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