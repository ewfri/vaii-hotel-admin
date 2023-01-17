@extends('layouts.app')


@section('content')
    <a href="/admin/izby/create" class="btn btn-success" style="margin-left:20px">Vytvoriť nový typ izby</a>
    <div class="uper" style="margin: 10px">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Image id</th>
                <th scope="col">Image</th>
                <th scope="col">description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($izby as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>
                        <img alt="img" src="{{ url('img/'.$data->obrazok) }}"
                             style="height: 100px; width: 150px;">
                    </td>
                    <td>{{$data->popis}}</td>
                    <td><a href="{{ route('izby.edit', $data->id)}}" class="btn btn-primary">Upraviť</a></td>
                    <td>
                        <form action="{{ route('izby.destroy', $data->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Vymazať</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script> src="/js/delete_prevent.js"></script>
@endsection
