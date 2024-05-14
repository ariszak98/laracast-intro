<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    
    <h2 class="font-bold text-lg" >{{ $job['title'] }}</h2>
    <p>This job pays <u>{{ $job['salary'] }}</u> per year.</p>
    
    <p><a style="color: rgb(90, 211, 255)" href="/jobs">back to jobs</a></p>
  
    

</x-layout>