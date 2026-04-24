<x-app-layout>
    <x-slot name="title">Modifier — {{ $article->title }}</x-slot>

    <div class="page-header">
        <div>
            <h1>Modifier l'article</h1>
            <p>{{ $article->title }}</p>
        </div>
        <a href="{{ route('articles.index') }}" class="btn btn-outline">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
            Retour
        </a>
    </div>

    <div class="form-card">
        <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="type_id" required>
                    <option value="">-- Choisir une catégorie --</option>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $article->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Contenu</label>
                <textarea name="content" required>{{ old('content', $article->content) }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label>Image de couverture</label>
                @if($article->image)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="actuelle"
                             style="height: 120px; object-fit: cover; border: 1px solid var(--border);">
                        <p style="font-size: 0.78rem; color: var(--muted); margin-top: 0.4rem;">Image actuelle</p>
                    </div>
                @endif
                <div class="file-input-wrapper">
                    <input type="file" name="image" accept="image/*">
                    <div class="file-input-label">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        <span>Choisir une nouvelle image</span>
                        <span style="font-size:0.75rem;">Laisser vide pour conserver l'image actuelle</span>
                    </div>
                </div>
                @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Enregistrer les modifications
            </button>
        </form>
    </div>
</x-app-layout>
