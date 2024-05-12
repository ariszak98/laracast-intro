<x-layout>
    <x-slot:heading>
        Jobs page
    </x-slot:heading>
    
    <h3>Hello from the Jobs page</h3><br><br>

    <ul>
        @foreach ($jobs as $job)
            <li class="hover:underline hover:text-blue-800">
                <a href="/jobs/{{ $job['id'] }}">
                    <b>{{ $job['title'] }}:</b> Pays {{ $job['salary'] }} per year.
                </a>
            </li>
        @endforeach
    </ul>

</x-layout>