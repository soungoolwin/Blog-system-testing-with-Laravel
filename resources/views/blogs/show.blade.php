<x-layout>

  <!-- singloe blog section -->
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img
          src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
          class="card-img-top" alt="..." />
        <h3 class="my-3">{{$blog->title}}</h3>
        <div>
          <div>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
          <div class="badge bg-primary">
            <a href="/categories/{{$blog->category->slug}}"><span
                class="text-white">{{$blog->category->name}}</span></a>
          </div>
          <div class="text_secondary">{{$blog->created_at->diffForHumans()}}</div>
        </div>
        <p class="lh-md mt-3">
          {{$blog->body}}
        </p>
      </div>
    </div>
  </div>

  @auth
  <x-comment-form :blog="$blog" />
  @endauth

  @guest
  <div class="text-center">
    <p>Please <a href="/login">Login </a>to write comment.</p>
  </div>
  @endguest

  <x-comment :comments="$blog->comments" />
  <x-subscribe />
  <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />

</x-layout>