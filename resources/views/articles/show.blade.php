<x-app-layout>
    <x-slot name="title">{{ $article->title }} — Blog TP</x-slot>

    <div style="max-width: 780px; margin: 0 auto;">

        <div style="margin-bottom: 2rem;">
            <a href="{{ route('articles.index') }}" class="btn btn-outline" style="padding: 0.4rem 1rem;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                Retour
            </a>
        </div>

        <div style="margin-bottom: 1.2rem; display: flex; align-items: center; gap: 1rem;">
            <span style="font-size: 0.72rem; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); border: 1px solid var(--gold-dim); padding: 0.2rem 0.6rem;">
                {{ $article->type->name }}
            </span>
            <span style="font-size: 0.8rem; color: var(--muted);">
                {{ $article->created_at->format('d M Y') }}
            </span>
        </div>

        <h1 style="font-family: 'Playfair Display', serif; font-size: 2.6rem; font-weight: 400; line-height: 1.2; margin-bottom: 1rem;">
            {{ $article->title }}
        </h1>

        <p style="font-size: 0.85rem; color: var(--muted); margin-bottom: 2rem;">
            Par <strong style="color: var(--text);">{{ $article->user->name }}</strong>
        </p>

        @if($article->image)
            <div style="margin-bottom: 2.5rem; overflow: hidden; max-height: 420px;">
                <img src="{{ asset('storage/' . $article->image) }}" alt="couverture"
                     style="width: 100%; object-fit: cover; display: block;">
            </div>
        @endif

        <div style="border-top: 1px solid var(--border); padding-top: 2rem; font-size: 1rem; line-height: 1.9; color: var(--text);">
            {!! nl2br(e($article->content)) !!}
        </div>

        <div style="margin-top: 3rem; padding-top: 1.5rem; border-top: 1px solid var(--border); display: flex; gap: 1rem;">
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                Modifier
            </a>
            <form method="POST" action="{{ route('articles.destroy', $article) }}">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Supprimer cet article ?')">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></svg>
                    Supprimer
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
