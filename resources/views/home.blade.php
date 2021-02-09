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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date de disponibilité') }}</label>

                            <div class="col-md-6">
                                <input id="date" name="date" type="date" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="form-check-input" class="col-md-4 col-form-label text-md-right">{{ __('Période de jeux') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="matin" value="Matin">
                                  <label class="form-check-label" for="matin">Matin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="jour" value="Journée">
                                  <label class="form-check-label" for="jour">Journée</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Votre numéro de téléphone') }}</label>

                            <div class="col-md-6">
                                <input id="number" name="number" type="tel" class="form-control" placeholder="01 23 45 67 89" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Votre nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" name="nom" type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('Votre prénom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" name="prenom" type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lieuOptions" class="col-md-4 col-form-label text-md-right">{{ __('Golf où vous pouvez jouer') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="lieuOptions" id="caen" value="CAEN">
                                  <label class="form-check-label" for="caen">CAEN</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="lieuOptions" id="houlgate" value="HOULGATE">
                                  <label class="form-check-label" for="houlgate">HOULGATE</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="lieuOptions" id="cabourg" value="CABOURG">
                                  <label class="form-check-label" for="cabourg">CABOURG</label>
                                </div>
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

                    <!--@foreach($myavailabilities as $availability)
                        <div class="card mt-4">
                          <div class="card-body">
                            <h5 class="card-title">{{ $availability->date }} ({{ $availability->temps }})</h5>
                            <p<a href="/{{ $availability->id }}/delete">Supprimer</a></p>
                          </div>
                        </div>
                    @endforeach-->

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
                    <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Nom</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Téléphone</th>
                      <th scope="col">Date</th>
                      <th scope="col">Période</th>
                      <th scope="col">Lieu</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($availabilities as $availability)
                        @if (strcmp(date('Y-m-d'), $availability->date) < 0)
                        <tr>
                          <td>{{ $availability->nom }}</td>
                          <td>{{ $availability->prenom }}</td>
                          <td>{{ $availability->numero }}</td>
                          <td>{{ $availability->date }}</td>
                          <td>{{ $availability->temps }}</td>
                          <td>{{ $availability->lieu }}</td>
                        </tr>
                        @endif
                     @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
