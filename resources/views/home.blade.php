<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        @forelse ($chirps as $chirp)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <h1>{{ $chirp->user->name ?? "Anonymous" }}</h1>
                    <p>{{ $chirp['message'] }}</p>
                    <p>{{ $chirp->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @empty
            <div class="text-center mt-8">
                <p class="text-gray-500">No chirps yet. Be the first to chirp!</p>
            </div>
        @endforelse
    </div>
</x-layout>