<script src="{{ asset('js/app.js') }}"></script>
@extends('layouts.app')

@section('content')
    <div class="container-fluid"><br>
        <div class="row ">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <!-- pie chart-->
                <div class="panel panel-default">
                    <div class="panel-heading bg-dark">
                        <h2> Campaign Status</h2>
                    </div>
                    <div class="panel-body bg-info">
                        <select id="campaign" name="campaign" style="width: 250px;height:50px; background:blue;color:white; font-weight:500px;" class="optionCampaign form-control " id="sel1">
                            @foreach ($campaign as $value)
                                <option value="{{$value->id}} ">{{$value->name}} </option>
                            @endforeach
                        </select>
                        <div class="flot-chart">
                            <canvas id="pie-chart"  width="500px" height="400px"></canvas>
                        </div>
                    </div>
                </div>
                <!--end pie chart-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <!--  bar Chart-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Number of passed tests</h2>
                        
                    </div>
                    <div class="panel-body">
                        <p>The number of passed test in each campaign</p>
                        <div class="flot-chart">
                            <canvas id="bar-chart"  width="516px" height="423px"></canvas>
                        </div>
                    </div>
                </div>
                <!-- End bar Chart-->
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>

    $(function(){
         
        function initPieChart(datas){
            //Pie Chart
            new Chart(document.getElementById("pie-chart"), {
                type: 'pie',
                data: {   
                    labels: ["Passed", "Failed", "Not Run"],
                    datasets: [{
                    backgroundColor: ["#255CEF", "#E74722","#F39544"],
                    data: datas,
                    }],
                },
                options: {
                    title: {
                    display: true,
                    text: 'Test included in campaign'
                    }
                }
            });
        }


        
        function initBarChart(barTitle, barData){

            
            // Bar Chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                                
                    labels: barTitle,
                    datasets: [
                    {
                        
                        backgroundColor: "#255CEF",
                        data: barData
                    }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                    display: true,
                    text: 'The number of tests'
                }
            }
        });
        }

        $("#campaign").change(function(){
            setupPieChart();
        });

        function setupPieChart(){
            var id = $('#campaign option:selected').val();   
            var url = "{{ url('/campaigndata')}}";

            $.ajax({
                type: "POST",
                url: url,
                data: {_token: "{{csrf_token()}}",id:id},
                success: function(data) {
                    // console.log(JSON.stringify(data))
                    initPieChart(data['pie']);

                },
                error: function(data) {
                    alert('error');
                }
                
            });
        }

        setupPieChart();
        var barTitle = {!!json_encode($barTitle)!!};
        var barData = {!!json_encode($barData)!!};
        initBarChart(barTitle, barData); 


    });
    </script>
@endpush