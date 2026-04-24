<x-app-layout>
    <x-slot name="title">Catégories — Blog TP</x-slot>

    <div class="page-header">
        <div>
            <h1>Catégories</h1>
            <p>{{ $types->count() }} catégorie(s) disponible(s)</p>
        </div>
        <a href="{{ route('types.create') }}" class="btn btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nouvelle catégorie
        </a>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1rem;">
        @forelse($types as $type)
            <div style="background: var(--surface); border: 1px solid var(--border); padding: 1.5rem;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <h2 style="font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 400;">
                        {{ $type->name }}
                    </h2>
                    <span style="font-size: 0.75rem; color: var(--gold); border: 1px solid var(--gold-dim); padding: 0.15rem 0.5rem;">
                    {{ $type->articles_count }} article(s)
                </span>
                </div>
                <div style="display: flex; gap: 0.8rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                    <a href="{{ route('types.edit', $type) }}" class="btn btn-outline" style="padding: 0.35rem 0.9rem; font-size: 0.78rem;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Modifier
                    </a>
                    <form method="POST" action="{{ route('types.destroy', $type) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 0.35rem 0.9rem; font-size: 0.78rem;"
                                onclick="return confirm('Supprimer cette catégorie ?')">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 4rem; border: 1px dashed var(--border);">
                <p style="font-family: 'Playfair Display', serif; font-size: 1.2rem; color: var(--muted); font-style: italic;">
                    Aucune catégorie créée.
                </p>
                <a href="{{ route('types.create') }}" class="btn btn-primary" style="margin-top: 1.5rem;">
                    Créer la première catégorie
                </a>
            </div>
        @endforelse
    </div>
</x-app-layout>
