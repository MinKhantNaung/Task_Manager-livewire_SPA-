<div>
    <div class="text-white px-3 py-2 text-2xl flex justify-between">
        @foreach ($tasksByStatus as $status)
            <div class="text-center bg-fuchsia-500 p-2 rounded">
                <p>{{ $status->count }}</p>
                <p>{{ $status->status }}</p>
            </div>
        @endforeach
    </div>
</div>
