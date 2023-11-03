<x-layout>
    <section class="px-4 py-5 my-5 text-left">
        <div class="container">
            <form action="/blogs/{{$blog->slug}}/comments/{{$comment->id}}/update" method="POST">
                @method('PATCH')
                @csrf
                <label for="">Update comment here</label>
                <textarea name="body" class="form-control" id="" cols="30" rows="10" style="resize: none;">{{$comment->body}}</textarea>
                @error('body')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <button type="submit" class="btn btn-primary my-3">Update</button>
            </form>
        </div>
    </section>
</x-layout>