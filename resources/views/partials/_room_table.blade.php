<div class="card mt-4">
    <div class="card-header">
        <h4>{{ $title ?? 'Table' }}</h4>
        @if(isset($createRoute))
            <a href="{{ $createRoute }}" class="btn btn-primary btn-sm float-end">Create New</a>
        @endif
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    @foreach($headers as $header)
                        <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($rows as $row)
                    <tr>
                        @foreach($row['fields'] as $field)
                            <td>{{ $field }}</td>
                        @endforeach
                        <td>
                            <a href="{{ $row['edit'] }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ $row['delete'] }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($headers) + 1 }}" class="text-center">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
