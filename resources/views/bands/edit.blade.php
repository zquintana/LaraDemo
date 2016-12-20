@extends('layouts.middle_column')

@section('title', 'Band Edit')

@section('page')
    <form action="{{ route('band.update', $band->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $band->name }}">
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $band->start_date }}">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="{{ $band->website }}">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="still_active" value="1"{{ $band->still_active ? ' checked="checked"': '' }}>
                        Still active?
                    </label>
                </div>
                <div class="form-group">
                    <strong>Albums</strong>
                    <ul>
                        @foreach($band->albums as $album)
                            <li><a href="{{ route('album.edit', $album->id) }}">{{ $album->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-default">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection