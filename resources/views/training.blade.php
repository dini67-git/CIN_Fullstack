@extends('base')

@section('title', 'Formations')

@section('content')
    <div class="training">
        <div class="training-items pt-4">
            <div id="training-items" class="d-flex flex-column gap-2 trainingd-items-scrollspy text-center">
                @foreach ($formations as $formation)
                    <a class="rounded" href="#card{{ $formation->id }}">Num {{ $formation->id }}</a>
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
                                <span>Prix: {{ $formation->prix }} €</span>
                                <a href="{{ route('formations.show', $formation) }}">Inscrivez-vous</a>
                                <button class="btn">Envoyez un mail</button>
                            </div>
                        </div>
                        <div class="card-infos">
                            <div class="infos-head">
                                <h3>{{ $formation->titre }}</h3>
                                <time class="date">{{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }}</time>
                                <h4>Durée: {{ \Carbon\Carbon::parse(time: $formation->date_fin)->diffInMonths($formation->date_debut) }} Mois</h4>
                            </div>
                            <p>{{ $formation->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
