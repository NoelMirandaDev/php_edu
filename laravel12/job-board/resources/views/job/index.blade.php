<x-layout>
    @forelse ($jobs as $job)
        <div>{{ $job->title }}</div>
    @empty
        <div>No jobs found.</div>
    @endforelse
</x-layout>
