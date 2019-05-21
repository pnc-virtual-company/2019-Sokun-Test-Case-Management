
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
    <h2>List of tests in <span style="color:red;" >{{$campaign->name}}</span></h2>
   
    <div style="margin-bottom:15px;">
        <a href="{{route('campaign.index')}}" class="btn" style="background:#006df0; color:white;font-weight:600;" data-toggle="tooltip" data-placement="top" title="Back to campaign"><span style="font-weight:bold;" class="mdi mdi-chevron-left text-white"></span> Back to campaign</a>

        <button class="btn" style="background:#006df0; color:white;font-weight:600; margin-left:5px;"
        data-toggle="modal" data-target="#createModal"><i class="mdi mdi-plus-circle mdi-23px"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Add test case" ></i> Add Test Case
        </button>
    </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th width="74px">Action</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Short Description</th>
                    <th style="width: 108px;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($campaign->testCases as $value)
        

                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$value->id}}" data-name="{{$value->name}}" data-creator="{{$value->creator}}" data-description="{{$value->description}}" ><i class="mdi mdi-pencil text-info"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>
                    
                        <a href="" aria-hidden="true" data-id="{{$value->id}}"  data-name="{{$value->name}}" data-toggle="modal" data-target="#deleteModal" ><i class="mdi mdi-delete text-info" style="color:red;" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>
                        <a href="{{url('testExecution')}}/{{$value->id}}"><i class="mdi mdi-play text-info"  aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Exectute"></i></a>
                        <a href="{{url('testExecution')}}/{{$value->id}}/edit"><i class="mdi  mdi-rewind text-info"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Past Executions"></i></a>
                        <a href="{{url('testStep')}}/{{$value->id}}" ><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Test Steps"></i></a> 
                    </td>
                    <td>{{$value->name}}</td>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                        @if($value->status == 0)
                            <input type="text" value="Not Run" disabled class="form-control" style="width: 130px;"> 
                        @elseif($value->status == 1)
                            <input type="text" value="Passed" disabled class="form-control" style="width: 130px; color:green;"> 
                        @elseif($value->status == 2)
                            <input type="text" value="Failed" disabled class="form-control" style="width: 130px; color:red;"> 
                        @elseif($value->status == 3)
                            <input type="text" value="In Progress" disabled class="form-control" style="width: 130px; color:orange"> 
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
    </div>
    @endsection



      <!--Create Test Case Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Test Case</h5>
            </div>
            <form action="{{action('CampaignListTestController@store')}}" method="POST" autocomplete="off">
            @csrf
            <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                        <div class="col-sm-9">
                            <input type="hidden" value="{{$campaign->id}} " name="campaign_id" class="form-control" >
                            <input type="text" autofocus name="name" class="form-control"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Creator:</label>
                        <div class="col-sm-9">
                            <input type="text"  name="creator" class="form-control" value="{{Auth::user()->name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Description:</label>
                        <div class="col-sm-9">
                            <input type="text" name="description" class="form-control" required>
                        </div>
                    </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span> Create</button>
            </div>
                </form>
        </div>
    </div>
</div>

    {{-- End Create Tests Case Modal  --}}

   {{-- Update Create Tests Case Modal  --}}
   <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Test Case</h5>
        </div>
        <form id="updateForm" method="POST" action="" autocomplete="off">
            @csrf
            @method('PATCH')
        <div class="modal-body">
               
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Name:</label>
                        <div class="col-sm-9">
                                <input type="hidden" value="{{$campaign->id}} " name="campaign_id" class="form-control">
                                <input type="text" name="name" value="" id="name" class="form-control" autofocus required>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Creator:</label>
                            <div class="col-sm-9">
                                <input type="text"  name="creator" class="form-control" value="{{Auth::user()->name}}" disabled>
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Description:</label>
                        <div class="col-sm-9">
                        <input type="text" name="description" id="description" value="" class="form-control" required>
                        </div>
                    </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
            <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi mdi-restore"></span> Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>
      {{-- End Update Tests Case Modal --}}


      {{-- Delete  Modal  --}}
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Remove Test</h5>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to remove campaign ?</p>
                        
                        <p id="deleteTitle"></p>
                    </div>
                    <form action="" id="deleteData" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" value="{{$campaign->id}}" name="campaign_id" class="form-control">
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" style="font-width: 600px;"><span class="mdi mdi-close-circle" ></span> Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" style="font-width: 600px;"><span class="mdi  mdi-checkbox-marked-circle-outline"></span> Yes</button>
                     
                    </div>
                </form>
                </div>
            </div>
        </div>

    {{-- Delete modal --}}
    <script src="{{asset('js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}} "></script>
    <script src="{{asset('js/dataTables.bootstrap.min.js')}} "></script>
    <script src="{{asset('js/dataTables.colReorder.min.js')}} "></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                colReorder: true
            });
            // create test case
            $('#updateModal').on('show.bs.modal',function (event){
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var creator = button.data('creator')    
            var description = button.data('description')
            var id = button.data('id')
            var modal = $(this)

            // modal.find('#name').attr('value',testcaseId)
            modal.find('#name').attr('value',name)
            modal.find('#creator').attr('value',creator)
            modal.find('#description').attr('value',description)

            var url ="{{url('campaignListTest')}}/"+ id;
            console.log(id)
            $('#updateForm').attr('action',url);   
            });
        });

        $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('#deleteTitle').attr('value',name)

            var url ="{{url('campaignListTest')}}/"+id;
            $('#deleteData').attr('action',url);   
    })
    </script>
</body> 