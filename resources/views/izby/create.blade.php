@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Pridať izbu
        </div>
        <div class="card-body">
            <div id="jscheck">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
            </div>
            <form method="post" action="{{ route('izby.store') }}"
                  enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Typ izby</label>
                    <input type="text" class="form-control" required name="izba">
                </div>
                <div>
                    <label>Popis</label>
                    <input type="text" class="form-control" required name="popis">
                </div>
                <div>
                    <label>Pridať obrázok</label>
                    <input type="file" class="form-control" required name="obrazok">
                </div>
                <div class="post_button">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>

@endsection
