<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <div class="space-y-4">
        @foreach($jobs as $job)
            <a href='/jobs/{{$job['id']}}' class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
                <div>
                    <strong>{{$job['title']}}:</strong> Pays {{$job['salary']}} per year
                </div>
                <p>Created By {{$job->employer->user->first_name}} {{$job->employer->user->last_name}} on behalf
                    of {{$job->employer->name}}</p>
            </a>
        @endforeach

        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>
