@props(['blog'])
<section class="container">
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="/blogs/{{$blog->slug}}/comments" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea name="commentBody" id="" class="form-control border border-0" cols="10" rows="5"
                        placeholder="Say Somethings" required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-wrapper>
        <x-error name="commentBody" />
    </div>
</section>