@extends('app')

@section('content')
<div class="container">
    <div class="card-header">
        <h4>POSTS
            <a href="{{ url('news/create') }}" class="btn btn-success float-end">Add News</a>
        </h4>
    </div>
    @if(session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">status</th>
            <th scope="col">created at</th>
            <th scope="col">update at</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @foreach($news as $item)
                <tr>
                  <td>{{$item->id}}</td>
                  <td>{{$item->title}}</td>
                  <td>{{$item->description}}</td>
                  <td>{{$item->status}}</td>
                  <td>{{$item->created_at}}</td>
                  <td>{{$item->updated_at}}</td>
                  <td>
                    <a href="" class="btn btn-primary">View</a>
                    <a href="{{url('news/edit/' . $item->id)}}" class="btn btn-warning">Edit</a>

                    <form action="{{url('news/delete/'.$item->id)}}" method="NEWS">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Та энэ мэдээ ыг устгахдаа итгэлтэй байна уу?')">DELETE</button>
                    </form>

                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>

@endsection
