<x-app-layout>
    <x-slot name="title">Nouvelle catégorie — Blog TP</x-slot>

    <div class="page-header">
        <div>
            <h1>Nouvelle catégorie</h1>
            <p>Ajoutez une nouvelle catégorie d'articles</p>
        </div>
        <a href="{{ route('types.index') }}" class="btn btn-outline">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            Retour
        </a>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('types.store') }}">
            @csrf

            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex : Tutoriel, Actualité..." required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Créer la catégorie
            </button>
        </form>
    </div>
</x-app-layout>
