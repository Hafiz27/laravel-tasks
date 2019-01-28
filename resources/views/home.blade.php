@extends('layout')
@section('content')

<form action="{{route('todo.create')}}" method="post">
    @csrf
    <div class="row"> 
        <div class="col-sm-12"><h2 class="card-header">Add </h2></div>
        <div class="col-sm-12"><input type="text" class="form-control form-group" name="title" value="{{old('title')}}">
            <p>{{$errors->first('title')}}</p>
        </div>

        <div class="col-sm-12"><textarea class="form-control form-group" name="content">{{old('content')}}</textarea>
            <p>{{$errors->first('content')}}</p></div>
        <div class="col-sm-12"><input type="submit" value="Submit"></div>
    </div>
</form>
<div class="row">
    <p>{{session()->get('message')}}</p>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Options</th>
            </tr>
            @foreach($list as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->content}}</td>
                <td>
                    <form action="{{route('todo.delete',$item->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Del">
                    </form>
                </td>

            </tr>
            @endforeach
        </thead>
    </table>
</div>
@endsection
