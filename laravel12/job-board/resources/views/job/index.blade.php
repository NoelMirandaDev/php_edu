<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => '#']" />

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex gap-2">
                        <x-text-input name="min_salary" value="" placeholder="From" />
                        <x-text-input name="max_salary" value="" placeholder="To" />
                    </div>
                </div>
                <div>3</div>
                <div>4</div>
            </div>

            <button class="w-full">Filter</button>
        </form>
    </x-card>

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
