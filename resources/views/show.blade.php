@extends('layout')

@section('title','User ' .$user->name)

@section('upper')
    <a type="button" class="btn btn-dark" href="{{route('users.index')}}">Back to Number Book</a>
    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">id: {{$user->id}}</li>
            <li class="list-group-item">name: {{$user->name}}</li>
            <li class="list-group-item">number: {{$user->number}}</li>
            <li class="list-group-item">create: {{$user->created_at->format('d/m/y H:i:s')}}</li>
            <li class="list-group-item">update: {{$user->updated_at->format('d/m/y H:i:s')}}</li>
        </ul>
    </div>
    <form method="POST" action="{{route('users.destroy',$user)}}">
        <a type="button" class="btn btn-outline-dark mt-3 " href="{{route('users.edit', $user) }}">Edit</a>
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-dark mt-3" type="submit">Delete</button>
    </form>
@endsection
