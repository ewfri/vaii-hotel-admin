<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Upraviť zamestnanca
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
                    </div><br/>
                @endif
            </div>
            <form id="formular" method="post" action="{{ route('zamestnanci.update',$zamestnanci->id )}}">
                <div class="form-group">
                    @csrf
                    <label>Meno:</label>
                    <input disabled type="text" class="form-control" name="meno" value="{{ $zamestnanci->meno }}"/>
                </div>
                <div class=" form-group">
                    <label>Priezvisko:</label>
                    <input disabled type="text" class="form-control" name="priezvisko" value="{{ $zamestnanci->priezvisko }}"/>
                </div>
                <div class=" form-group">
                    <label>email:</label>
                    <input required type="text" class="form-control" name="email" value="{{ $zamestnanci->email }}"/>
                </div>
                <div class=" form-group">
                    <label>telefon:</label>
                    <input required type="text" class="form-control" name="telefon" value="{{ $zamestnanci->telefon }}"/>
                </div>
                <div class=" form-group">
                    <label>zamestnany do:</label>
                    <input disabled type="date" class="form-control" name="zamestnany_od" value="{{ $zamestnanci->zamestnany_od }}"/>
                </div>
                <div class=" form-group">
                    <label>zamestnany od:</label>
                    <input type="date" class="form-control" name="zamestnany_do" value="{{ $zamestnanci->zamestnany_do }}"/>
                </div>
                <div class=" form-group">
                    <label>oddelenie:</label>
                    <select disabled id="oddelenie" name="oddelenie_id">
                        @foreach($oddelenia as $oddelenie)
                            <option
                            @if($zamestnanci->oddelenie_id == $oddelenie->id)
                            selected
                           @endif
                           value="{{$oddelenie->id}}">{{$oddelenie->nazov_oddelenia}}</option>

                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Upraviť zamestnanca</button>
            </form>
        </div>
    </div>
@endsection
