<script src="{{ asset('js/app.js') }}"></script>
@extends('layouts.app')

@section('content')

    <div class="container-fluid ">
      
        <div class="textrow row">

        </div>
        <div class="rowPie row">
            <div class="piechart form-group">
                    <h3>Campaign status</h3>
                    <select class="option form-control " id="sel1">
                        <option>Version 1</option>
                        <option>Version 2</option>
                        <option>Version 3</option>
                        <option>Version 4</option>
                    </select>
                </div>
                <div class="piechart col-lg-12">
                   
                    <canvas id="pie-chart" width="500px" height="400px"></canvas>    
                </div>
               
        </div>
        <div class="rowBar row">
                <div class="barchart col-lg-12"> <br>
                        <h3> The result that pass</h3>           
                        <canvas id="bar-chart" width="400px" height="300px"></canvas>
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
                    backgroundColor: ["#074719", "#91210b","#8e7c05"],
                    data: [10,20,30],
                    
                    

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
                        backgroundColor: ["#ffffff","#3e95cd", "#8e5ea2","#3cba9f"],
                        data: [0,10,20,30]
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
