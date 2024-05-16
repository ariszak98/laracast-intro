<h2>{{ $job->title }}</h2>
<p>Job active on our website!</p>
<p><a href="{{ url('/job' . $job->id) }}">View job</a></p>