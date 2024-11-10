@extends('dashboard')




@section('content')


<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="float: left;">
                        <h2>All Post</h2>
                    </div>
                    <div style="float:right">
                        <a class="btn btn-dark" href="{{route('post.create')}}">Add Post</a>

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
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Tag</th>
                                <th>Gallery</th>
                                <th>Meta title</th>
                                <th>Meta Description</th>
                                <th>Category name</th>
                                <th>Subcategory name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post )
                            <tr>

                            <td>{{$post->id}}</td>
                            <td>{{$post->address}}</td>
                            <td>{{$post->phone}}</td>
                            <td>{{$post->email}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{ str_replace(['<p>', '</p>'], '', $post->short_description) }}</td>

                            <td>{{$post->description}}</td>
                            <td><img src="{{ asset($post->image) }}" alt="" style="height: 50px; width: auto;"></td>
                            <td>
                                <ol>
                                    @foreach (is_string($post->tag) ? explode(',', $post->tag) : json_decode($post->tag) as $tag)
                                        <li>{{ $tag }}</li>
                                    @endforeach
                                </ol>
                            </td>

                            <td>
                                @php
                                    $galleryImages = explode(',', $post->gallery);
                                @endphp

                                @foreach($galleryImages as $image)
                                    <img
                                        src="{{ asset($image) }}"
                                        alt="Gallery Image"
                                        style="height: 50px; width: auto; margin-right: 5px; cursor: pointer;"
                                        onclick="enlargeImage(this)">
                                @endforeach
                            </td>

                            <td>{{$post->meta_title}}</td>

                            <td>{{ str_replace(['<p>', '</p>'], '', $post->meta_description) }}</td>

                            <td>{{$post->category->name ?? null}}  </td>
                            <td>{{$post->subcategory->name ?? null}}</td>


                            <td>

                             <a class="btn btn-success mb-2" href="{{route('post.edit',$post->id)}}">Edit</a>


                            <form action="{{route('post.delete',$post->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this Post?')"; >
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



<script>
    function enlargeImage(imageElement) {
        // Toggle between 50px and 100px on click
        if (imageElement.style.height === '50px') {
            imageElement.style.height = '100px';
        } else {
            imageElement.style.height = '50px';
        }
    }
</script>

@endsection
