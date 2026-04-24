<x-app-layout>
    <x-slot name="title">Articles — Blog TP</x-slot>

    <div class="page-header">
        <div>
            <h1>Articles</h1>
            <p>{{ $articles->count() }} article(s) publié(s)</p>
        </div>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nouvel article
        </a>
    </div>

    @forelse($articles as $article)
        <article style="border: 1px solid var(--border); margin-bottom: 1.5rem; display: flex; gap: 0; overflow: hidden;">
            @if($article->image)
                <div style="width: 220px; min-height: 160px; flex-shrink: 0; overflow: hidden;">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="couverture"
                         style="width: 100%; height: 100%; object-fit: cover; display: block;">
                </div>
            @endif
            <div style="padding: 1.5rem 2rem; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.8rem;">
                    <span style="font-size: 0.72rem; letter-spacing: 2px; text-transform: uppercase; color: var(--gold); border: 1px solid var(--gold-dim); padding: 0.2rem 0.6rem;">
                        {{ $article->type->name }}
                    </span>
                        <span style="font-size: 0.78rem; color: var(--muted);">
                        {{ $article->created_at->format('d M Y') }}
                    </span>
                    </div>
                    <h2 style="font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 400; margin-bottom: 0.6rem;">
                        {{ $article->title }}
                    </h2>
                    <p style="color: var(--muted); font-size: 0.9rem;">
                        {{ Str::limit($article->content, 120) }}
                    </p>
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 1.2rem; padding-top: 1rem; border-top: 1px solid var(--border);">
                <span style="font-size: 0.8rem; color: var(--muted);">
                    Par <strong style="color: var(--text);">{{ $article->user->name }}</strong>
                </span>
                    <div style="display: flex; gap: 0.8rem;">
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-outline" style="padding: 0.4rem 1rem;">
                            Lire
                        </a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-outline" style="padding: 0.4rem 1rem;">
                            Modifier
                        </a>
                        <form method="POST" action="{{ route('articles.destroy', $article) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 0.4rem 1rem;"
                                    onclick="return confirm('Supprimer cet article ?')">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    @empty
        <div style="text-align: center; padding: 5rem 2rem; border: 1px dashed var(--border);">
            <p style="font-family: 'Playfair Display', serif; font-size: 1.3rem; color: var(--muted); font-style: italic;">
                Aucun article publié pour le moment.
            </p>
            <a href="{{ route('articles.create') }}" class="btn btn-primary" style="margin-top: 1.5rem;">
                Publier le premier article
            </a>
        </div>
    @endforelse
</x-app-layout>
