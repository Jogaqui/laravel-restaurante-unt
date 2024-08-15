@extends('marketing.plantillaM')

@section('titulo', 'cupones')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">EDICIÓN DE CUPONES</h3>

        <div class="form-group">
            <label for="coupon_code">Código</label>
            <input type="text" name="coupon_code" id="coupon_code" class="form-control" readonly
                value="{{ $cupon->coupon_code }}">
        </div>

        <div class="form-group">
            <label for="coupon_value">Valor (%)</label>
            <input type="number" name="coupon_value" id="coupon_value" class="form-control" readonly
                value="{{ $cupon->coupon_value }}">
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('marketing.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
