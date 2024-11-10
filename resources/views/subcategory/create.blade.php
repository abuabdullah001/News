@extends('dashboard')




@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div style="float: left;">
                        <h2>Subcategory</h2>
                    </div>
                    <div style="float: right">
                        <a class="btn btn-dark" href="{{route('subcategory.index')}}">SubCategory index</a>
                    </div>
                </div>

                <div class="card-body">


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                   <form action="{{route('subcategory.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf


                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="">Subcategory name</label>
                             <input type="text" name="name" class="form-control">
                        </div>


                        <div class="form-group mb-3">
                            <label for="">Order by</label>
                             <input type="integer" name="order_by" class="form-control">
                        </div>



                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>





@endsection





