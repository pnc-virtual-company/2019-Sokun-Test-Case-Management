<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
<link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">

<style> 
    .inpt-no-clickable {
        pointer-events: none;
    }
</style>

@extends('layouts.app')
@section('content')
<body>
<form action="{{route('testExecuted.update',$testExecution->id)}} " method="POST">
    @csrf
    @method("PATCH")
<div class="container-fluid">
    <h2>List of Test Case Steps Executed</h2>
    <h4>Execution of test <span style="color:red;">{{$testExecution->name}}</span> in Campaign <span style="color:red;  ">{{$campaign->name}}</span></h4>
<a href="{{url('campaignListTest')}}/{{$testExecution->campaign_id}}" class="btn" style="background:#006df0; color:white;font-weight:600;" data-toggle="tooltip" data-placement="top" title="back to campaign tests"><span class="mdi mdi-chevron-left text-white" style="font-weight:600;"></span> Back to campaign tests</a>
    <button  type="submit" class="btn pull-right" style="background:#006df0;color:white; font-weight:600;"><span class="mdi mdi-content-save"></span> Save</button><br><br>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
                <th>Expected Result</th>
                <th width="110px">Execution Date</th>
                <th width="73px">Status</th>
                <th>Actual Resultt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testExecution->testSteps as $value)             
            <tr>
                <td style="width:130px">{{$value->name}}</td>
                <td width="145px">{{$value->action}} </td>
                <td style="width:165px;">{{$value->expected_result}}</td>
                <td>
                <input type="hidden" name="id[]" value="{{$value->id}}">
                    @if ($value->status == 0 || $value->status == 2) 
                        <input  id="datepicker{{$value->id}}" style="width:115px;" class="form-control" type="text" value="{{$value->executed_date}}" name="executed_date[]">
                    @else
                    <input  style="width:115px;" class="form-control inpt-no-clickable" type="text" value="{{$value->executed_date}}" name="executed_date[]">
                    @endif

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
                    <textarea id="text-editor{{$value->id}}" name="actual_result[]" class="form-control">
                        {{$value->actual_result}}
                    </textarea>
                </td>
            </tr>                 
            @endforeach
        </tfoot>
    </table>
</div>
</form>
@endsection

<script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
<script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}} "></script>
<script src="{{asset('js/dataTables.colReorder.min.js')}} "></script>


<script>
    $(document).ready(function () {
        var id = [{{ $testExecution->testSteps()->pluck('id')->implode(',') }}];
        

        flatpickr("#datepicker", {
            dateFormat: "d/m/Y",
        });
        $('#example').DataTable({
            colReorder: true
        });


        for(var i=0; i< id.length; i++){
        CKEDITOR.replace( 'text-editor'+id[i]);
        $('#datepicker'+id[i]).datepicker({
            uiLibrary: 'bootstrap',
            format: "dd/mm/yyyy"
        });
        }
        
});
</script>
</body>