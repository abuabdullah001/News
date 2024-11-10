@extends('dashboard')




@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div style="float: left;">
                        <h2>All subcategory</h2>
                    </div>
                    <div style="float:right">
                        <a class="btn btn-dark" href="{{route('subcategory.create')}}">Add subcategory</a>

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

                                <th>id</th>
                                <th>Category name</th>
                                <th>Subcategory name</th>
                                <th>Order by</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($subcategories as $subcategory )
                            <tr>


                            <td>{{$subcategory->id}}</td>
                            <td>
                                {{$subcategory->category->name ?? null}}
                            </td>
                            <td>{{$subcategory->name}}</td>

                            <td>{{$subcategory->order_by}}</td>



                            <td>

                            <a class="btn btn-success mb-2" href="{{route('subcategory.edit',$subcategory->id)}}">Edit</a>


                            <form action="{{route('subcategory.delete',$subcategory->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this subcategory?')"; >
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" >Delete</button>
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
