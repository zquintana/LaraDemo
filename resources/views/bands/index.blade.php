@extends('layouts.single_column')

@section('title', 'Bands')

@section('page')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('still_active', 'Active')</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bands as $band)
                <tr>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->still_active ? 'YES' : 'NO' }}</td>
                    <td>
                        <a href="{{ route('band.edit', $band->id) }}" class="btn btn-default btn-xs">
                            Edit
                        </a>
                        <form action="{{ route('band.destroy', $band->id) }}" class="form-inline" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-warning btn-xs">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $bands->appends(\Request::except('page'))->render() !!}
@endsection