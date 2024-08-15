@extends('marketing.plantillaM')

@section('titulo', 'cupones')

@section('contenido')
    <div class="container">
        <h3 class="mb-4" style="text-align: center">EDICIÓN DE CUPONES</h3>

        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('marketing.update', $cupon->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="coupon_code">Código</label>
                <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{ $cupon->coupon_code }}">
            </div>

            <div class="form-group">
                <label for="coupon_value">Valor (%)</label>
                <input type="number" name="coupon_value" id="coupon_value" class="form-control" value="{{ $cupon->coupon_value }}">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        setTimeout(function() {
            document.querySelector('#mensaje').remove();
        }, 2000);
    </script>
@endsection
