@extends('main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
            <div id="container1" style="min-height: 450px;"></div>
        </div>
        <div class="col-12 col-md-6">
            <div id="container2" style="min-height: 450px;"></div>
        </div>
    </div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Highcharts.chart('container1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jumlah Mahasiswa Universitas MDP'
                },
                subtitle: {
                    text: 'Sumber: Aplikasi Akademik'
                },
                xAxis: {
                    categories: [
                        @foreach ($prodiData as $item)
                            '{{ $item->nama_prodi }}',
                        @endforeach
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Jurusan'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Mahasiswa'
                    }
                },
                tooltip: {
                    valueSuffix: ' mahasiswa'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Mahasiswa',
                    data: [
                        @foreach ($prodiData as $item)
                            {{ $item->TotalMahasiswa }},
                        @endforeach
                    ]
                }]
            });

            Highcharts.chart('container2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Jumlah Mahasiswa per Angkatan'
                },
                subtitle: {
                    text: 'Sumber: Aplikasi Akademik'
                },
                xAxis: {
                    categories: [
                        @foreach ($angkatanData as $item)
                            '{{ $item->angkatan }}',
                        @endforeach
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Angkatan'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Mahasiswa'
                    }
                },
                tooltip: {
                    valueSuffix: ' mahasiswa'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Mahasiswa',
                    data: [
                        @foreach ($angkatanData as $item)
                            {{ $item->total }},
                        @endforeach
                    ]
                }]
            });
        });
    </script>
@endsection

@section('footer')
    <p>Raden</p>
@endsection
