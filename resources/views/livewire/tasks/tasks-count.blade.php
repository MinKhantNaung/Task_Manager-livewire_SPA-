<div>
    <div class="px-3 py-2 text-2xl flex justify-between">
        @foreach ($tasksByStatus as $status)
            <div class="text-center p-2 rounded">
                <p class="rounded-full border border-orange-700">{{ $status->count }}</p>
                <p>{{ $status->status }}</p>
            </div>
        @endforeach
    </div>
</div>
