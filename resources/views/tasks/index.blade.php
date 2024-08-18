
<x-layout>

    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-2 font-serif text-3xl rounded bg-green-600 px-2 w-36">
            All Tasks
        </div>
        <div class="mt-6 text-gray-500">

            Task management is the process of effectively and efficiently tracking, managing, and executing the life cycle of a task or many tasks within a project, from inception to execution. The purpose of task management is to improve the decision-making, communication, efficiency, and effectiveness of a task or project

        </div>
        <div class="mt-8  flex hover:inline-flex">

            <x-toolbar show-toolbar="{{$showToolbar}}" :tasks="$tasks"/>

            <div class="ml-4">
                <form>
                        <select class="bg-green-800 text-white rounded"   name="order_by" onchange="this.form.submit()">

                            <option value="title" {{ $orderBy == 'title' ? 'selected' : '' }}>Sort>Title</option>
                            <option value="id" {{ $orderBy == 'id' ? 'selected' : '' }}>Sort>ID</option>
                            <option value="due_date" {{ $orderBy == 'due_date' ? 'selected' : '' }}>Sort>DueDate</option>
                        </select>
                </form>
            </div>

            <!-- Order direction toggle -->
            <div class="ml-4">
                <a href="?order_by={{ $orderBy }}&order_direction={{ $orderDirection == 'asc' ? 'desc' : 'asc' }}" class="text-gray-500 hover:text-gray-700">
                    {{ $orderDirection == 'asc' ? 'Descending' : 'Ascending' }}
                </a>
            </div>




        </div>


    <style>
        /* Custom calendar popup styles */
        .calendar-popup {
            width: 200px; /* Adjust width */
            height: 150px; /* Adjust height */
            display: none; /* Hide by default */
            position: absolute;
            left: 0;
            bottom: 100%; /* Position above the icon */
            margin-bottom: 0.5rem; /* Space between icon and popup */
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 0.375rem; /* Rounded corners */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 0.5rem;
            z-index: 10;
            overflow: auto; /* Handle overflow */

        }

        .calendar-popup.show {

            display: block; /* Show on hover */
        }
    </style>

    <div class="container  mx-auto mt-10 p-6 bg-slate-300 shadow-lg rounded-lg overflow-hidden grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($tasks as $task)
            <div class="p-6 bg-white shadow-2xl rounded-lg overflow-hidden relative">
                <!-- Card Header -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('tasks.show',$task) }}" class="text-xl font-bold text-gray-800 hover:underline">{{$task->id}}.{{ $task->title }}</a>
                    <span class="text-sm py-1 rounded px-3
    {{ $task->status == 'completed' ? 'text-green-500 font-bold':
       ($task->status == 'pending' ? 'text-yellow-500 font-bold' :
       ($task->status == 'cancelled' ? 'text-red-500 font-bold' : ''))
    }}">{{ $task->status }}</span>
                </div>
                <!-- Card Body -->
                <p class="mt-2 text-gray-600">{{ $task->description }}</p>
                <!-- Card Footer -->
                <div class="mt-4 flex items-center justify-between">
                    <div class="flex space-x-4 items-center">
                        <!-- Create Date -->
                        <div class="relative flex items-center text-sm text-gray-500 group">
                            <i class="fas fa-calendar-alt text-lg text-green-800 mr-2 cursor-pointer"></i>
                            <div class="calendar-popup group-hover:block">
                                <div class="text-xs font-bold mb-1 bg-green-200 text-green-800 p-1 rounded">Create Date</div>
                                <div class="text-xs">{{ $task->create_date->format('Y-m-d') }}</div>
                                <!-- Basic Calendar View -->
                                <div class="mt-1">
                                    <div class="grid grid-cols-7 gap-0.5 text-center">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <div class="w-4 h-4 flex items-center justify-center text-xs border rounded {{ ($i == $task->create_date->day) ? 'bg-green-200 text-green-800 font-bold' : 'bg-white' }}">
                                                {{ $i }}
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Due Date -->
                        <div class="relative flex items-center text-sm text-gray-500 group">
                            <i class="fas fa-calendar-alt text-lg text-red-700 mr-2 cursor-pointer"></i>
                            <div class="calendar-popup group-hover:block">
                                <div class="text-xs font-bold mb-1 bg-red-200 text-red-800 p-1 rounded">Due Date</div>
                                <div class="text-xs">{{ $task->due_date->format('Y-m-d') }}</div>
                                <!-- Basic Calendar View -->
                                <div class="mt-1">
                                    <div class="grid grid-cols-7 gap-0.5 text-center">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <div class="w-4 h-4 flex items-center justify-center text-xs border rounded {{ ($i == $task->due_date->day) ? 'bg-red-200 text-red-800 font-bold' : 'bg-white' }}">
                                                {{ $i }}
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('tasks.update', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex-1">
                            @if($task->status == 'cancelled')
                                <input type="hidden" name="status" value="pending">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mark as pending</button>
                            @elseif($task->status == 'pending')
                                <input type="hidden" name="status" value="completed">
                                <button type="submit" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mark as completed</button>
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Mark as cancelled</button>
                            @elseif($task->status == 'completed')
                                <input type="hidden" name="status" value="pending">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mark as pending</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

        @endforeach
            <div class="w-48">
                {{ $tasks->onEachSide(5)->links() }}
            </div>
    </div>


</x-layout>


