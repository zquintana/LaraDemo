@extends('layouts.single_column')

@section('title', 'Albums')

@section('page')
    <div class="filter">
        <form>
            <div class="form-group">
                <label>Band</label>
                <select name="band" class="form-control">
                    @foreach($bands as $band)
                        @if ($band->id == request()->request->getInt('band'))
                            <option value="{{ $band->id }}" selected="selected">{{ $band->name }}</option>
                        @else
                            <option value="{{ $band->id }}">{{ $band->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-default">
                Go
            </button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>@sortablelink('name')</th>
            <th>@sortablelink('recorded_date')</th>
            <th>@sortablelink('release_date')</th>
            <th>@sortablelink('genre')</th>
            <th>@sortablelink('band_id')</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->recorded_date }}</td>
                <td>{{ $album->release_date }}</td>
                <td>{{ $album->genre }}</td>
                <td>{{ $album->band->name }}</td>
                <td>
                    <a href="{{ route('album.edit', $album->id) }}" class="btn btn-default btn-xs">
                        Edit
                    </a>
                    <form action="{{ route('album.destroy', $album->id) }}" class="form-inline" method="post">
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

    {!! $albums->appends(\Request::except('page'))->render() !!}
@endsection