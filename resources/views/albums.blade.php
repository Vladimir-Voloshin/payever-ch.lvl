<!-- resources/views/tasks.blade.php -->

@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>
                <!-- Bootstrap Boilerplate... -->
            
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
            
                    <!-- New Album Form -->
                    <form action="{{ url('album') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
            
                    <!-- Album Name -->
                        <div class="form-group">
                            <label for="album" class="col-sm-3 control-label">Album</label>
            
                            <div class="col-sm-6">
                                <input type="text" name="album_name" id="album-name" class="form-control">
                            </div>
                        </div>
            
                        <!-- Add Album Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Album
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Current Albums -->
            @if (count($albums) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Albums
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped albums-table">
                            <thead>
                                <th>Album</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($albums as $album)
                                <tr>
                                    <td class="table-text"><div>{{ $album->album_name }}</div></td>

                                    <!-- Album Delete Button -->
                                    <td>
                                        <form action="{{ url('album/'.$album->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            
        </div>
    </div>

    <!-- TODO: Current Tasks -->
@endsection