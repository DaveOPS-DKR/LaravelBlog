<x-app-layout>
    <x-slot name="title">Nouvel article — Blog TP</x-slot>

    <div class="page-header">
        <div>
            <h1>Nouvel article</h1>
            <p>Rédigez et publiez un nouvel article</p>
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn-outline">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            Retour
        </a>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title') }}" placeholder="Titre de l'article" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="type_id" required>
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Contenu</label>
                <textarea name="content" placeholder="Rédigez votre article ici..." required>{{ old('content') }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Image de couverture</label>
                <div class="file-input-wrapper">
                    <input type="file" name="image" accept="image/*">
                    <div class="file-input-label">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        <span>Cliquez pour choisir une image</span>
                        <span style="font-size:0.75rem;">JPG, PNG — max 2 Mo</span>
                    </div>
                </div>
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Publier l'article
            </button>
        </form>
    </div>
</x-app-layout>
