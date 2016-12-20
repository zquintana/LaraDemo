@extends('layouts.middle_column')

@section('title', 'Album Edit')

@section('page')
    <form action="{{ route('album.update', $album->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <label>Band</label>
                    <select name="band_id" class="form-control">
                        @foreach($bands as $band)
                            @if($album->band->id == $band->id)
                                <option value="{{ $band->id }}" selected="selected">{{ $band->name }}</option>
                            @else
                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $album->name }}">
                </div>
                <div class="form-group">
                    <label>Recorded Date</label>
                    <input type="date" name="recorded_date" class="form-control" value="{{ $album->recorded_date }}">
                </div>
                <div class="form-group">
                    <label>Release Date</label>
                    <input type="date" name="release_date" class="form-control" value="{{ $album->release_date }}">
                </div>
                <div class="form-group">
                    <label>Number of Tracks</label>
                    <input type="number" name="number_of_tracks" class="form-control" value="{{ $album->number_of_tracks }}">
                </div>
                <div class="form-group">
                    <label>Label</label>
                    <input type="text" name="label" class="form-control" value="{{ $album->label }}">
                </div>
                <div class="form-group">
                    <label>Producer</label>
                    <input type="text" name="producer" class="form-control" value="{{ $album->producer }}">
                </div>
                <div class="form-group">
                    <label>Genre</label>
                    <input type="text" name="genre" class="form-control" value="{{ $album->genre }}">
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