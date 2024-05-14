<x-layout>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>
    
    <h3>Hello from the Jobs page</h3><br><br>

    <div class="space-y-3">
        @foreach ($jobs as $job)
            
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 hover:border-blue-400 rounded-lg">
                
                <div class="font-bold text-blue-400 text-sm">{{ $job->employer->name }}</div>
                
                <div>
                <b>{{ $job['title'] }}:</b> Pays {{ $job['salary'] }} per year.
                </div>
            </a>
            
        @endforeach
    </div>
    
    <!-- Pagination Links -->
    <!-- Default file: /tailwing.blade.php -->
    <div class="mt-2">
    {{ $jobs->links() }}
    </div>
    <!-- // -->

</x-layout>