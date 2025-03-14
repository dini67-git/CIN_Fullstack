@extends('base')

@section('title', 'Formations')

@section('content')
<div class="training">
    <div class="training-items pt-4">
        <div id="training-items" class="d-flex flex-column gap-2 trainingd-items-scrollspy text-center">
            @foreach ($formations as $formation)
            <a class="rounded" href="#card{{ $formation->id }}">Num {{ $loop->iteration }}</a>
            @endforeach
        </div>
    </div>
    <div class="training-items-infos">
        <div data-bs-spy="scroll" data-bs-target="#training-items" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-card" style="position: relative; height: 600px; overflow-y: scroll;" tabindex="0">
            @foreach ($formations as $formation)
            <div id="card{{ $formation->id }}" class="card">
                <div class="card-head">
                    <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}" class="img-fluid">
                    <div class="infos">
                        <span style="color:orangered">Prix: {{ $formation->prix }} Fcfa</span>
                        <!-- Remplacez les liens par un bouton "Plus" -->
                        <a href="{{ route('formations.show', $formation) }}" class="btn btn-primary"> Voir plus</a>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head text-center">
                        <h3>{{ $formation->titre }}</h3>
                        <time class="date"> Debut: {{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}</time>
                        <h4>Durée: {{ \Carbon\Carbon::parse($formation->date_fin)->DiffInMonths($formation->date_debut) }} Mois</h4>
                    </div>
                    <p>{{ Str::limit($formation->description, 100) }}...</p> <!-- Affiche une description tronquée -->
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
