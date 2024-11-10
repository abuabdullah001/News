@extends('dashboard')




@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <div style="float: left;">
                        <h2>Post Add</h2>
                    </div>
                    <div style="float: right">
                        <a class="btn btn-dark" href="{{route('post.index')}}">Post index</a>
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





                   <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Address</label>
                             <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                             <input type="integer" name="phone" class="form-control">
                        </div>


                        <div class="form-group mb-3">
                            <label for="">Email</label>
                             <input type="text" name="email" class="form-control">
                        </div>



                        <div class="form-group mb-3">
                            <label for="">Title</label>
                             <input type="text" name="title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Short description</label>
                             <textarea type="text" name="short_description"  class="form-control editor">  </textarea>
                        </div>


                        <div class="form-group mb-3">
                            <label for=""> Description</label>
                             <textarea type="text" name="description"  class="form-control">  </textarea>
                        </div>


                        <div class="form-group mb-3">
                            <label for=""> Image</label>
                             <input type="file" name="image"  class="form-control">
                        </div>


                        <select class="form-control js-example-tokenizer" name="tag[]" multiple="multiple">
                            <option selected="selected">orange</option>
                            <option>white</option>
                            <option selected="selected">purple</option>
                          </select>


                        <div class="form-group mb-3">
                            <label for=""> Gallery</label>
                             <input type="file" name="gallery[]" class="form-control" multiple>
                        </div>

                        <div class="form-group mb-3">
                            <label for=""> Meta title</label>
                             <input type="text" name="meta_title" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Meta description</label>
                             <textarea type="text" name="meta_description" class="form-control editor"> </textarea>
                        </div>


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
                            <label for="subcategory_id" class="form-label">Select SubCategory</label>
                            <select name="subcategory_id" class="form-control">
                                <option value="">Choose a Subcategory</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{$subcategory->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection





