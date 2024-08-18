@if ($showToolbar)
    <p class="mr-10 font-bold text-white bg-green-800  rounded px-3">Total tasks :  {{count( $tasks?? 'No tasks') }}</p>
    <x-task-status :status="request()->get('status')"/>
@else
    <a  href="{{route('tasks.index')}}" class="my-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All Tasks</a>
@endif
