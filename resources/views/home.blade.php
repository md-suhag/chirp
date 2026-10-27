<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        @foreach ($chirps as $chirp)
                <div class="card bg-base-100 shadow mt-8">
                    <div class="card-body">
                        <h1>{{ $chirp['author'] }}</h1>
                        <p>{{ $chirp['message'] }}</p>
                        <p>{{ $chirp['time'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>