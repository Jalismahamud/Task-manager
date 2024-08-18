<div >
    <select id="taskStatus" onChange="filterStatus()" class="bg-green-800 border-gray-500 rounded text-white">
        <option value="all" @if(request()->status == 'all') selected @endif>All Tasks</option>
        <option value="completed" @if(request()->status == 'completed') selected @endif>Completed</option>
        <option value="pending" @if(request()->status == 'pending') selected @endif>Pending</option>
        <option value="cancelled" @if(request()->status == 'cancelled') selected @endif>Cancelled</option>
    </select>

    <script>
        function filterStatus() {
            let status = document.getElementById('taskStatus').value;
            if (status == 'all') {
                location.href = "{{route('tasks.index')}}";
            } else {
                location.href = "{{url('tasks')}}?status=" + status;
            }
        }
    </script>
</div>
