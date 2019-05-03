<script src="{{ asset('js/app.js') }}"></script>
@extends('layouts.app')

@section('content')

    <div class="container-fluid"><br>
            <div class="row ">
                    <div class="col-lg-6 ">
                        <!-- pie chart-->
                        <div class="panel panel-default">
                            <div class="panel-heading bg-dark">
                               <h2> Campaign Status</h2>
                            </div>
                            <div class="panel-body bg-info">
                                <select style="width: 195px;height:50px; background:blue;color:white; font-weight:500px;" class="optionCampaign form-control " id="sel1">
                                    <option>Version 1</option>
                                    <option>Version 2</option>
                                    <option>Version 3</option>
                                </select>
                                <div class="flot-chart">
                                    <canvas id="pie-chart"  width="500px" height="400px"></canvas>
                                </div>
                            </div>
                        </div>
                          <!--end pie chart-->
                    </div>
                    <div class="col-lg-6">
                         <!--  bar Chart-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <h2>Number of passed test</h2>
                            </div>
                            <div class="panel-body">
                                   <p>The result of number passed test of  campaign</p>
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
     
        $(function() {
            //Pie Chart
            new Chart(document.getElementById("pie-chart"), {
                type: 'pie',

                data: {
                   
                    labels: ["Passed", "Failed", "Not Run"],
                    datasets: [{
                    // label: "Population (millions)",
                    backgroundColor: ["#255CEF", "#E74722","#F39544"],
                    data: [40,25,30],
                    }],
                    value: [10,20,30],
                    // labels: ["Passed", "Failed", "Not Run"]
                },
                options: {
                    title: {
                    display: true,
                    text: 'Test included in campaign'
                    }
                }
            });
        
        });
            // Bar Chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["version 01", "Version 02", "Version 03"],
                    datasets: [
                    {
                        label: "hello",
                        backgroundColor: ["#f39544", "#E74722","#255CEF"],
                        data: [1,10,20,30,40]
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



        </script>
@endpush