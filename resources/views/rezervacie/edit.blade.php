@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Upraviť rezerváciu
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
            <form method="post" action="{{ route('rezervacie.update', $rezervacia->id ) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label>Meno:</label>
                    <input type="text" class="form-control" name="meno" value="{{ $rezervacia->meno }}"/>
                </div>
                <div class="form-group">
                    <label>Priezvisko:</label>
                    <input type="text" class="form-control" name="priezvisko" value="{{ $rezervacia->priezvisko }}"/>
                </div>
                <div class="form-group">
                    <label>Rezervácia od:</label>
                    <input type="date" class="form-control" name="od" value="{{ $rezervacia->od }}"/>
                </div>
                <div class="form-group">
                    <label>Rezervácia do:</label>
                    <input type="date" class="form-control" name="do" value="{{ $rezervacia->do }}"/>
                </div>
                <div class="form-group">
                    <label>Počet osôb:</label>
                    <input type="text" class="form-control" name="osoby" value="{{ $rezervacia->osoby }}"/>
                </div>
                <button type="submit" class="btn btn-primary">Upraviť rezerváciu</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

    </script>
@endsection
