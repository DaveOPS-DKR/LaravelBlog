<x-app-layout>
    <x-slot name="title">Modifier — {{ $type->name }}</x-slot>

    <div class="page-header">
        <div>
            <h1>Modifier la catégorie</h1>
            <p>{{ $type->name }}</p>
        </div>
        <a href="{{ route('types.index') }}" class="btn btn-outline">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            Retour
        </a>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('types.update', $type) }}">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Nom de la catégorie</label>
                <input type="text" name="name" value="{{ old('name', $type->name) }}" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Enregistrer
            </button>
        </form>
    </div>
</x-app-layout>
