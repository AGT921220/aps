@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span>
                        Concursos
                    </span>
                </div>

                <div class="card-body" style="overflow-x:scroll">

                {{-- fin card body --}}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection



<style>
.cita_text{
    font-size: 0.7em !important;
}
.cita_content,.cita_confirm{
    font-size: 10px !important;
    display: flex !important;
    margin: 5px 5px;
    margin: 1em;
    text-align: center;
    justify-content: center !important;
}

thead tr th,tbody tr td{
    text-align: center;
}
.actions_table{
    display: flex;
    justify-content: center;
}

</style>
<input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
<script src="{{ asset('js/citas.js') }}" defer></script>
