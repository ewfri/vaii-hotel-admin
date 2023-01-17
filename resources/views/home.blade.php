@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <a href="/admin/rezervacie/" class="btn btn-dark">Spravovať rezervácie</a>
                <a href="/admin/izby/" class="btn btn-dark">Spravovať izby</a>
                <a href="/admin/spravy/" class="btn btn-dark">Správy</a>
                <a href="/admin/zamestnanci/" class="btn btn-dark">Zamestnanci</a>
            </div>

        </div>
    </div>
</div>
@endsection
