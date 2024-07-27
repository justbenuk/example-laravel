<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <ul>
        @foreach($jobs as $job)
            <li><a href='/jobs/{{$job['id']}}'><span
                        class="font-bold underline">{{$job['title']}}: </span>Pays {{$job['salary']}} per year</a>
            </li>
        @endforeach
    </ul>
</x-layout>
