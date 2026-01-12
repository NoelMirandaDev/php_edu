<x-layout>
    <x-bread-crumbs class="mb-4"
        :links="['Jobs' => '#']" />
    @forelse ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    View Details
                </x-link-button>
            </div>
        </x-job-card>
    @empty
        <div class="text-2xl text-bold text-slate-700">No jobs found.</div>
    @endforelse
</x-layout>
