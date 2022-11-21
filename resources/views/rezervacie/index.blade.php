<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
    <a href="/rezervacie/create" class="btn btn-success" style="margin-left:20px">Vytvoriť rezerváciu</a>
    <div class="uper" style="margin: 10px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>meno</td>
                <td>priezvisko</td>
                <td>od</td>
                <td>do</td>
                <td>pocet osob</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($rezervacie as $rezervacia)
                <tr>
                    <td>{{$rezervacia->id}}</td>
                    <td>{{$rezervacia->meno}}</td>
                    <td>{{$rezervacia->priezvisko}}</td>
                    <td>{{$rezervacia->od}}</td>
                    <td>{{$rezervacia->do}}</td>
                    <td>{{$rezervacia->osoby}}</td>
                    <td><a href="{{ route('rezervacie.edit', $rezervacia->id)}}" class="btn btn-primary">Upraviť</a></td>
                    <td>
                        <form action="{{ route('rezervacie.destroy', $rezervacia->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Vymazať</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <script type="text/javascript">
                let elems = document.getElementsByClassName('btn-danger');
                let confirmIt = function (e) {
                    if (!confirm('Naozaj chcete danú rezerváciu vymazať?')) e.preventDefault();
                };
                for (let i = 0, l = elems.length; i < l; i++) {
                    elems[i].addEventListener('click', confirmIt, false);
                }
            </script>
@endsection
