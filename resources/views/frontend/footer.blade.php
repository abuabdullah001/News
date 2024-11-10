 <!-- Footer Start -->
 <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">


        <div class="col-lg-3 col-md-6 mb-5">
            {{-- <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5> --}}
            <div class="row">
                 <h1 class="" style="margin-top: 120px;margin-start: 30px"> <span style="color: yellow">Bizz</span> <span style="color:#31404B">News</span></h1>
            </div>
        </div>



        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
            @php
            $posts = App\Models\Post::orderBy('created_at', 'desc')->limit(1)->get();
        @endphp

        @foreach ($posts as $post)
            <p class="font-weight-medium" value="$post->id"><i class="fa fa-map-marker-alt mr-2"></i>{{$post->address}}</p>
            <p class="font-weight-medium" value="$post->id"><i class="fa fa-phone-alt mr-2"></i>{{$post->phone}}</p>
            <p class="font-weight-medium" value="$post->id"><i class="fa fa-envelope mr-2"></i>{{$post->email}}</p>
            @endforeach
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
            </div>

        </div>



        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                @php
                    // Get all categories
                    $categories = App\Models\Category::all();
                @endphp

                @foreach ($categories as $category)
                    <a href="{{ route('welcome', $category->id) }}" class="btn btn-sm btn-secondary m-1">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>



        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            <div class="mb-3">
                @php
                    $posts = App\Models\Post::orderBy('created_at', 'desc')->limit(5)->get();
                @endphp

                @foreach ($posts as $post)
                    <div class="mb-3">
                        <!-- Post Title with Link (using a placeholder or direct URL) -->
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="#" value="{{ $post->id }}">
                                {{ $post->title }}
                            </a>
                            <a class="text-body" href="#">
                                <small>{{ $post->created_at->format('M d, Y') }}</small>
                            </a>
                        </div>

                        <!-- Post Description -->
                        <a class="small text-body text-uppercase font-weight-medium" href="#" value="{{ $post->id }}">
                            {{ Str::limit($post->description, 70) }}
                        </a>

                        <!-- Meta Description -->
                        <div class="mt-2">
                            <a class="small text-body text-uppercase font-weight-medium" href="#" value="{{ $post->id }}">
                                {{ Str::limit(strip_tags($post->meta_description), 100) }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>




        </div>


    </div>
</div>


<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Biz News</a> All Rights Reserved.

    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
    Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
</div>
<!-- Footer End -->
