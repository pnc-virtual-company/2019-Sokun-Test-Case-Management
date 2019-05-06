
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('css/colReorder.bootstrap.min.css')}} ">
@extends('layouts.app')
    @section('content')
        
<body>
    <div class="container-fluid">
        <h2>List of test in Campaign Version1</h2>
            <button class="btn" style="background:#006df0; color:white;margin-bottom:20px; font-weight:600;"
                data-toggle="modal" 
                data-target="#createModal"><i class="mdi mdi-plus-circle"  aria-hidden="true"></i> Add Test Case
            </button>
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
                @foreach ($campaign->testCases as $value)
                <tr>
                    <td>
                        <a href="" data-toggle="modal" data-target="#updateModal" data-id="{{$value->id}}" data-name="{{$value->name}}" data-creator="{{$value->creator}}" data-description="{{$value->description}}"><i class="mdi mdi-pencil text-info"  aria-hidden="true"></i></a>
                    
                        <a href="" aria-hidden="true" data-id="{{$value->id}}" data-name="{{$value->name}}" data-toggle="modal" data-target="#deleteModal"><i class="mdi mdi-delete text-info" style="color:red;"></i></a>

                        <a href="{{url('testExecution')}}/{{$value->id}}"><i class="mdi mdi-play text-info"  aria-hidden="true"></i></a>
                        <a href=""><i class="mdi  mdi-rewind text-info"  aria-hidden="true"></i></a>
                        <a href="{{url('testStep')}}/{{$value->id}}"><i class="mdi mdi-format-list-bulleted text-info"  aria-hidden="true"></i></a> 
                    <span>{{$value->id}}</span>
                    </td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->creator}}</td>
                    <td>{{$value->description}}</td>
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
                            <input type="hidden" value="{{$campaign->id}} " name="campaign_id" class="form-control">
                            <input type="text" name="name" class="form-control" autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Creator:</label>
                        <div class="col-sm-9">
                            <input type="text" name="creator" class="form-control" required>
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
              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
                        <input type="text" name="name" value="" id="name" class="form-control" autofocus>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Creator:</label>
                        <div class="col-sm-9">
                            <input type="text" name="creator" id="creator" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label" style="margin-top: 10px;">Description:</label>
                        <div class="col-sm-9">
                        <input type="text" name="description" id="description" value="" class="form-control">
                        </div>
                    </div>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
                        
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary">Yes</button>
                     
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