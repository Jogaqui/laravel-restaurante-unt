@extends('transporte.plantillaT')

@section('titulo', 'Dashboard')

@section('contenido')
    <div class="container">
        <h1 class="mb-4">Dashboard</h1>

        <div class="row">
            <div class="col-md-6">
                {!! $barChart->html() !!}
            </div>
            <div class="col-md-6">
                {!! $pieChart->html() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! $barChart->script() !!}
    {!! $pieChart->script() !!}
@endsection
