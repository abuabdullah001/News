@extends('dashboard')




@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-9 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div style="float: left;">
                    <h2>All category list</h2>
                    </div>
                    <div style="float:right">
                        <a class="btn btn-dark" href="{{route('category.create')}}">Add new Car</a>

                    </div>

                </div>
                <div class="card-body">



                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Category id</th>
                                <th>Category name</th>
                                <th>Order by</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $category )
                            <tr>

                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->order_by}}</td>



                            <td>

                          <a class="btn btn-success mb-2" href="{{route('category.edit',$category->id)}}">Edit</a>


                            <form action="{{route('category.delete',$category->id)}}" method="post" >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            </td>



                        </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

</div>






@endsection
