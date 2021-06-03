@extends('layout')

@section('title', isset($user) ?  'Update ' .$user->name : 'Create user');
@section('upper')
    <a type="button" class="btn btn-dark" href="{{route('users.index')}}">Back to Number Book</a>

    <form method="POST"
        @if(isset($user))
          action="{{ route('users.update',$user)}}"
        @else
          action="{{ route('users.store')}}"
        @endif
        class="mt-3">
        @csrf
        @isset($user)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col">
                <input name="name"
                       value="{{ old('name',isset($user) ? $user->name : null) }}"
                       type="text" class="form-control" placeholder="name" aria-label="name">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col">
                <input name="number"
                       value="{{ old('number',isset($user) ? $user->number : null )}}"
                       type="text" class="form-control" placeholder="number" aria-label="number">
                @error('number')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-dark">Update</button>
            </div>
        </div>
    </form>


@endsection
