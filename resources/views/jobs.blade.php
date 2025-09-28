<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-4">Available Jobs</h1>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg font-bold">{{ $job->title }}</h2>
                <p>{{ $job->description }}</p>
                <p class="text-sm text-gray-600">Employer: {{ $job->employer->name }}</p>
            </div>
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>

</body>
</html>
