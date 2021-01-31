@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Disponiblités') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="/add">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" name="date" type="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-check-input" class="col-md-4 col-form-label text-md-right">{{ __('Temps') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="matin" value="matin">
                                  <label class="form-check-label" for="matin">Matin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jour" value="jour">
                                  <label class="form-check-label" for="jour">Journée</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="soir" value="soir">
                                  <label class="form-check-label" for="soir">Soir</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone') }}</label>

                            <div class="col-md-6">
                                <input id="number" name="number" type="tel" class="form-control" placeholder="01 23 45 67 89" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Commentaire') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    @foreach($myavailabilities as $availability)
                        <div class="card mt-4">
                          <div class="card-body">
                            <h5 class="card-title">{{ $availability->date }} ({{ $availability->temps }})</h5>
                            <p<a href="/{{ $availability->id }}/delete">Supprimer</a></p>
                          </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Trouver un partenaire de golf') }}</div>
                <div class="card-body">
                    @foreach($availabilities as $availability)
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">{{ $availability->date }} ({{ $availability->temps }})</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ \App\User::find($availability->user_id)->name }} ({{ \App\User::find($availability->user_id)->number }})</h6>
                            <p class="card-text">{{ $availability->description }}</p>
                          </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
