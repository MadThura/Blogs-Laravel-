<x-layout>

    <!-- singloe blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg" class="card-img-top" alt="..." />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div>
                    <div>
                        @auth
                        <form action="/blogs/{{$blog->slug}}/handle-subscription" method="POST">
                            @csrf
                            @if(auth()->user()->isSubscribed($blog))
                            <button class="btn btn-danger" type="submit">Unsubscribe</button>
                            @else
                            <button class="btn btn-warning" type="submit">Subscribe</button>
                            @endif
                        </form>
                        @endauth
                    </div>
                    <div>Author - <a href="/users/{{$blog->user->username}}">{{$blog->user->name}}</a></div>
                    <div><a href="/?category={{$blog->category->slug}}">
                            <span class="badge bg-primary">{{$blog->category->name}}</span>
                        </a></div>
                    <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
                </div>
                <p class="lh-md mt-3">
                    {{$blog->body}}
                </p>
            </div>
        </div>
    </div>
    <x-comment_section :blog="$blog" />

    <x-subscribe />
    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>