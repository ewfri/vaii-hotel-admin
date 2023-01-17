<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
    <a href="/admin/zamestnanci/create" class="btn btn-success" style="margin-left:20px">Pridať zamestnanca</a>
    <div class="uper" style="margin: 10px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Meno</td>
                <td>Priezvisko</td>
                <td>Oddelenie</td>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $zc)
                <tr>
                    <td>{{$zc->idcko}}</td>
                    <td>{{$zc->meno}}</td>
                    <td>{{$zc->priezvisko}}</td>
                    <td>{{$zc->nazov_oddelenia}}</td>
                    <td><a href="{{ route('zamestnanci.edit', $zc->idcko)}}" class="btn btn-primary">Upraviť</a></td>
                    <td>
                        <form action="{{ route('zamestnanci.destroy', $zc->idcko)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Vymazať</button>
                        </form>
                    </td>
                    <td><a href="{{ route('zamestnanci.show', $zc->idcko)}}" class="btn btn-info">Zobraziť</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="/js/delete_prevent.js"></script>
@endsection
