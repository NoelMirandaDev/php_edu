<x-layout>
    @forelse ($jobs as $job)
        <x-card class="mb-4">
            {{ $job->title }}
        </x-card>
    @empty
        <div class="text-2xl text-bold text-slate-700">No jobs found.</div>
    @endforelse
</x-layout>
