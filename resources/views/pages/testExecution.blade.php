    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
    
@extends('layouts.app')
    @section('content')
<body>
    <form action="{{route('testExecution.update',$testExecution->id)}} " method="POST">
        @csrf
        @method("PATCH")
    <div class="container-fluid">
        <h2>List of Test Case Steps </h2>
        <h4>Execution of test <span style="color:red;">{{$testExecution->name}}</span> in Campaign <span style="color:red;  ">{{$campaign->name}}</span></h4>
    <a href="{{url('campaignListTest')}}/{{$testExecution->campaign_id}}" class="btn" style="background:#006df0; color:white;font-weight:600;" data-toggle="tooltip" data-placement="top" title="back to campaign tests"><span class="mdi mdi-chevron-left text-white" style="font-weight:600;"></span> Back to campaign tests</a>
        <button  type="submit" class="btn pull-right" style="background:#006df0;color:white; font-weight:600;"><span class="mdi mdi-content-save"></span> Save</button><br><br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                    <th>Expected Result</th>
                    <th style="123px;">Execution Date</th>
                    <th>Status</th>
                    <th>Actual Resultt</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testExecution->testSteps as $value)
                @if ($value->status != 1)
                    
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->action}} </td>
                    <td>{{$value->expected_result}}</td>
                    <td>
                    <input type="hidden" name="id[]" value="{{$value->id}}">
                        <input id="datepicker" width="200px"/ autocomplete="off" value="{{$value->executed_date}} " name="executed_date[]" required>
                    </td>
                    <td>
                        <select class="custom-select my-1 mr-sm-2 form-control" id="inlineFormCustomSelectPref" name="status[]">
                            @if($value->status == 0)
                                <option value="0" selected>Not run</option>
                                <option value="1">Passed</option>
                                <option value="2">Failed</option>

                            @elseif($value->status == 1)
                                <option value="0">Not run</option>
                                <option value="1" selected>Passed</option>
                                <option value="2">Failed</option>
                            @else
                                <option value="0">Not run</option>
                                <option value="1">Passed</option>
                                <option value="2" selected>Failed</option>
                            @endif
                        </select>
                    </td>
                    <td> 
                        <input id="froala-editor" width="200px"/ autocomplete="off" value="{{$value->actual_result}}" class="form-control" name="actual_result[]" required>

                    </td>
                </tr>                 
                @endif
                @endforeach
            </tfoot>
        </table>
    </div>
    </form>
    @endsection

    <!--Delete Modal -->
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
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span> Yes</button>
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
            $('.datepicker').datepicker({
            uiLibrary: 'bootstrap',
            format: 'dd/mm/yyyy'
        });

        new FroalaEditor('div#froala-editor', {
            toolbarInline: true,
            charCounterCount: false
        })
    });
    </script>
</body>