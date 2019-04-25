
@extends('layouts.app')

@section('content')
{{-- line chart --}}
    <link rel="stylesheet" href="">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <div class="container-fluid">
            <div class="row">
               <div class=" linechart col-lg-12">
                        <h1>Charts with ChartJS</h1>
                        <p>Good looking charts canbe generated with ChartJS. Please visit their website for more information:
                            <a target="_blank" href="http://www.chartjs.org/">http://www.chartjs.org/</a></p>
                        
                        <h2>Pie chart</h2>
                        
                        <canvas id="pie-chart" width="800" height="450"></canvas>

                        <h2>Bar chart</h2>
                        
                        <canvas id="bar-chart" width="800" height="450"></canvas>
                                        
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
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                    data: [2478,5267,734,784,433]
                    }]
                },
                options: {
                    title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                    }
                }
            });
        
        });
            // Bar Chart
            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                        data: [2478,5267,734,784,433]
                    }
                    ]
                },
                options: {
                    legend: { display: false },
                    title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                    }
                }
            });
        </script>
@endpush
