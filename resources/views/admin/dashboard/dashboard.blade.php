@extends('admin.base')
@section('content')
<div class="section-header">
    <h1>Forum</h1>
     <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Backpack</a></div>
        <div class="breadcrumb-item">Forum</div>
    </div>         
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Data User</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Jumlah Data Quest</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Jumlah Data Galeri</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart3"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Jumlah Data Blog</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart4"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                    <h4>Jumlah Data Tour</h4>
                    </div>
                    <div class="card-body">
                    <canvas id="myChart5"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>    
@endsection

@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        var totalData = {!! json_encode($user) !!};
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Data User'],
                datasets: [{
                    label: 'Total Data',
                    data: [totalData],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>


<script>
    var totalData = {!! json_encode($quest) !!};
    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Data Quest'],
            datasets: [{
                label: 'Total Data',
                data: [totalData],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var totalData = {!! json_encode($galeris) !!};
    var ctx = document.getElementById('myChart3').getContext('2d');
    var myChart3 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Data Galeri'],
            datasets: [{
                label: 'Total Data',
                data: [totalData],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var totalData = {!! json_encode($blog) !!};
    var ctx = document.getElementById('myChart4').getContext('2d');
    var myChart4 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Data Blog'],
            datasets: [{
                label: 'Total Data',
                data: [totalData],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>


<script>
    var totalData = {!! json_encode($tour) !!};
    var ctx = document.getElementById('myChart5').getContext('2d');
    var myChart5 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Data Tour'],
            datasets: [{
                label: 'Total Data',
                data: [totalData],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endpush