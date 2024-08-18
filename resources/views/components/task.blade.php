<div class="container mx-auto mt-10 p-6 bg-white shadow-2xl rounded-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-4">

        <div class="p-6 bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Card Header -->
            <div class="flex items-center justify-between">
                <a href="#" class="text-xl font-bold text-gray-800 hover:underline">{{ $task->title }}</a>
                <span class="text-sm text-gray-600">{{ $task->status }}</span>
            </div>
            <!-- Card Body -->
            <p class="mt-2 text-gray-600">{{ $task->description }}</p>
            <!-- Card Footer -->
            <div class="mt-4 flex items-center justify-between">
                <div class="flex space-x-4">
                    <span class="text-sm text-gray-500">Create Date: <span class="font-semibold">{{ $task->create_date->format('Y-m-d') }}</span></span>
                    <span class="text-sm text-gray-500">Due Date: <span class="font-semibold">{{ $task->due_date->format('Y-m-d') }}</span></span>
                </div>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    View Details
                </button>
            </div>
        </div>

</div>
