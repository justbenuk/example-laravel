<x-layout>
    <x-slot:heading>{{$job['title']}}</x-slot:heading>
    <div class="text-lg">
        <p>{{$job['description']}}</p>
        <p>This jobs pays {{$job['salary']}} per year</p>
    </div>
</x-layout>
