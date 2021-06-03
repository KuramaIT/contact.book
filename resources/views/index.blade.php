@extends('layout')

@section('title','NumberBook')
@section('upper')

    <form method="POST" action="{{ route('users.store')}}">
        @csrf
        <div class="row">
            <div class="col">
                <input name="name" type="text" class="form-control" placeholder="name" aria-label="name">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col">
                <input name="number" type="text" class="form-control" placeholder="number" aria-label="number">
                @error('number')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col">
                <button type="submit" class="btn btn-outline-dark">Create</button>
            </div>
        </div>
    </form>


@endsection


@section('content')



    <table class="table table-sm">
        <thead>
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Number</th>
              <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
           <tr>
              <th scope="row">{{$user->id}}</th>
              <td>
                  <a href="{{route('users.show',$user) }}">{{$user->name}}</a>
              </td>
              <td>
                  <a href="{{route('users.show',$user) }}">{{$user->number}}</a>
              </td>
              <td>

                  <form method="POST" action="{{route('users.destroy',$user)}}">
                      <a type="button" class="btn btn-outline-dark" href="{{route('users.edit', $user) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-outline-dark" type="submit">Delete</button>
                  </form>
              </td>
           </tr>
        @endforeach
        </tbody>
    </table>
    {{$users->links()}}
@endsection
