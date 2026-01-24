<x-layout>
    <x-bread-crumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job class="mb-4">
        <p class="text-sm text-slate-500 mb-4">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $job->employer->company_name }} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @forelse ($job->employer->jobs as $suggestionJob)
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobs.show', $suggestionJob) }}">
                                {{ $suggestionJob->title }}
                            </a>
                        </div>
                        <div class="text-xs">
                            {{$suggestionJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($suggestionJob->salary) }}
                    </div>
                </div>

            @empty
                <div class="text-sm text-slate-500">
                    Currently, there is no other jobs from this employer.
                </div>
            @endforelse
        </div>

    </x-card>
</x-layout>
