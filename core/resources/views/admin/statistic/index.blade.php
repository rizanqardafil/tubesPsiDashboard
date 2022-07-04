@extends('admin.layout')
@section('content')

<div class="page-header">
    <h4 class="page-title">Statistic</h4>
    <ul class="breadcrumbs">
        <li class="nav-home"> <a href="{{route('admin.dashboard')}}">
                <i class="flaticon-home"></i>
            </a></li>
        <li class="separator"><i class="flaticon-right-arrow"></i></li>
        <li class="nav-item"><a href="#">Statistic</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-6">
        <div clas s="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <h4 class="card-title">Grafik Pendapatan</h4>
                        </div>
                        <p class="card-category">
                            Grafik Penjualan Setiap Bulannya
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <label for="cars">Select Chart Style</label><select name="chart"
                                        onchange="myFunction()" class="form-control" id="chart" style="width:120px;">
                                        <option value="column">Column</option>
                                        <option value="line">Line</option>
                                        <option value="bar">Bar</option>
                                    </select>
                                    <div id="container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="row row-card-no-pd">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-hearder">
                        <div class="card-head-row">
                            <h4 class="card-title">Grafik Order</h4>
                        </div>
                        <p class="card-category">Grafik Order Setiap Bulannya</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <label for="cars">Select Chart (Orders)</label>
                                    <select name="chartTotal" onchange="totalFunction()" class="form-control"
                                        id="chartTotal" style="width:120px;">
                                        <option value="column">Column</option>
                                        <option value="line">Line</option>
                                        <option value="bar">Bar</option>
                                    </select>
                                    <div id="tampilan"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src=" https://code.highcharts.com/highcharts.js">
</script>


<script>
function myFunction() {
    var chartType = document.getElementById("chart").value;
    var datas = <?php echo json_encode($datas) ?>;
    Highcharts.chart('container', {
        chart: {
            type: chartType
        },
        title: {
            text: "Pendapatan"
        },
        xAxis: {
            categories: ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
                'september',
                'october', 'november', 'desember'
            ]
        },
        yAxis: {
            title: {
                text: "Total Pendapatan"
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pendapatan',
            data: datas
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    })
    chart.render();
}
</script>



<script src="https://code.highcharts.com/highcharts.js"></script>


<script>
function totalFunction() {
    var chartType = document.getElementById("chartTotal").value;
    var array = <?php echo json_encode($array) ?>;
    Highcharts.chart('tampilan', {
        chart: {
            type: chartType
        },
        title: {
            text: "Order barang"
        },
        xAxis: {
            categories: ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
                'september',
                'october', 'november', 'desember'
            ]
        },
        yAxis: {
            title: {
                text: "Total Order"
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Total Order',
            data: array
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    })
    chart.render();
}
</script>





@endsection