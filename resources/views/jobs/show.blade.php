<x-layout>
    <x-slot:heading>{{$job['title']}}</x-slot:heading>
    <h1 class="font-bold text-sm text-blue-500">{{$job->employer->name}}</h1>

    <p class="text-lg">This jobs pays {{$job['salary']}} per year</p>

    @can('edit', $job)
        <p class="mt-6">
            <x-button href="/jobs/{{$job['id']}}/edit">Edit Job</x-button>
        </p>
    @endcan
</x-layout>
