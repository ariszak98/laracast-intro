<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    
    <h2 class="font-bold text-lg" >{{ $job->title }}</h2>
    <p>This job pays <u>{{ $job->salary }}</u> per year.</p>
    

    <p class="mt-6">
        <x-button href="/jobs">Back</x-button>
        @can('edit', $job)
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        @endcan
    </p>
  
    

</x-layout>