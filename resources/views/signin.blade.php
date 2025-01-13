@extends('baseadm')

@section('title', 'signin')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100">
        <div class="col-lg-6 mx-auto">
          <h2 class="text-center mb-4">Inscription</h2>
          <div class="auto-form-wrapper">
            <form action="{{ route('signin') }}" method="POST" class="form-sample">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                          <input type="text" name="firstname" class="form-control" value="{{ old('nom') }}"/>
                          @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prénom</label>
                        <div class="col-sm-9">
                          <input type="text" name="lastname" class="form-control" value="{{ old('prénom') }}" />
                          @error('lastname'
                          )
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sexe</label>
                        <div class="col-sm-9">
                          <select name="sexe" class="form-control">
                            <option value="">Sélectionner</option>
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date de naissance</label>
                        <div class="col-sm-9">
                          <input type="date" name="birthday" class="form-control" placeholder="jour/mois/année" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Filière</label>
                        <div class="col-sm-9">
                          <select name="filiere" class="form-control">
                            <option value="">Sélectionner une filière</option>
                            <option value="MPCI">MCPI</option>
                            <option value="SVT">SVT</option>
                            <option value="SEG">SEG</option>
                            <option value="LM">LM</option>
                          </select>
                          @error('filiere')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>

                  </div>

                  <p class="card-description"> Adresses </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                          @error('email')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Téléphone</label>
                        <div class="col-sm-9">
                          <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" />
                          @error('telephone')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" name="password" class="form-control" />
                          @error('password')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Confirmer mot de passe</label>
                        <div class="col-sm-9">
                          <input type="password" name="password_confirmation" class="form-control" />

                        </div>
                      </div>
                    </div>
                  </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary submit-btn btn-block">S'inscrire</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Avez-vous déjà un compte ?</span>
                <a href="{{ route('login') }}" class="text-black text-small">Se connecter</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
@endsection
