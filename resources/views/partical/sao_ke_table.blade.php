<table id="" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Date</th>
            <th scope="col">Money</th>
            <th style="font-size:12px" scope="col">Note</th>
            <th style="font-size:12px" scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        @if (count($logs) == 0)
            <tr>
                <td colspan="4">Không có dữ liệu!</td>
            </tr>
        @else
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $loop->index + 1 + $logs->perPage() * ($logs->currentPage() - 1) }}</td>
                    <td>{{ $log->date }}</td>
                    <td>{{ number_format($log->money, 0, ',', '.') }}</td>
                    <td class="col-8">{{ $log->note }}</td>
                    <td>{{ $log->username }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@if (!empty($logs))
    <nav class="history__paginate" aria-label="Page navigation history">
        <div class="d-flex justify-content-center">
            {{ $logs->onEachSide(1)->links() }}
        </div>
    </nav>
@endif
