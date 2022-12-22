@extends('layouts.main')

@section('conteudo')
  <h1 class="text-3xl p-4 shadow-md font-bold text-center">Página Principal</h1>
  <div class="flex flex-col justify-between mt-2 xl:flex-row">
    {{-- <div class="border rounded-md m-1">{!! $chart1->container() !!}</div>
    <div class="border rounded-md m-1">{!! $chart2->container() !!}</div>
    <div class="border rounded-md m-1">{!! $chart3->container() !!}</div> --}}
    <div class="border rounded-md m-1">{!! $chart4->container() !!}</div>
  </div>

  {{-- {{ $chart1->script() }}
  {{ $chart2->script() }}
  {{ $chart3->script() }} --}}
  {{ $chart4->script() }}

  @push('more-scripts')
    {{-- <script src="{{ArielMejiaDev\LarapexCharts\LarapexChart::cdn()}}"></script> --}}
    <script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>
  @endpush
@endsection
