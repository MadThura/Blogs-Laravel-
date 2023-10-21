@php
    $comments = $blog->comments()->latest()->paginate(4);
@endphp
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div class="card-body p-4">
                <div class="form-outline mb-4">
                    <form action="/blogs/{{$blog->slug}}/comments" method="POST">
                        @csrf
                        <input name="body" type="text" id="addANote" class="form-control" placeholder="Type comment..." />
                        @error('body')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input type="submit" value="Submit" class="btn btn-primary mt-1">
                    </form>
                </div>

                @foreach ($comments as $comment)
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div class="d-flex flex-row align-items-center">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHoAAAB6CAMAAABHh7fWAAAAV1BMVEX///8AAADJycm7u7tfX1/u7u6/v79GRkb4+Ph1dXXc3Nzp6ekLCwumpqZkZGSNjY2Xl5fPz88lJSWsrKyenp45OTl+fn7V1dWEhIRSUlLi4uJNTU0fHx81hcoyAAABtElEQVRoge2YW3KDMAxFIwMBEwjkRZ77X2dJ08wEsEghktqPezZwhvG1rMtiAQAAAAAAAAAA/BOy3Lk8s/eu6pS+SeuVqTjx9IJP7MxRQR2KyMpc0oCdjXk5NBMtLcyXkJnoYqBeh9VrffMmbCbaqKuZjzb47NWWU2+1R4vjzEROWb3j1dp3u+bVtbL6xKtPyuo9r94rqyNerf2G5Lw6V1ZnKWdO1RcWNuLaAW8XlCJsLgxWlcCicKfUNzMPiMGb2ZIdhuaD0VKcXfvmq906XnXNlZm4JX9ZxL32LOmTRVWcpnEV/UH1AUCdxJVV431Tlc6w4rb3yndHije6Ycee98d+1BfH4TeTKNaVJw0nvtMonrpjC9eDm1r3GdnBnyjt4sF49fEaZjZfXWJ5M1vp+4hvaSM1r49w7RupWkNEy1cyxUwkeb9/GbEnglEL/h8cQ+zfId8uOcRa56SMPZBK2nm6+ixjPk43E8m8oNV70RCZLhQolu85SJhz5jfCOIVEEZuR7zsSGZ911DKHPXGIPpEYprd56q2AelbK2px9bs7mmYkExribyedmAAAAAAAAAABgEl/8ew7PgBLrugAAAABJRU5ErkJggg==" alt="avatar" width="25" height="25" />
                                <p class="small mb-0 ms-2">{{$comment->user->name}}</p>
                            </div>
                            <div>{{$comment->created_at->format('D-M-Y')}}</div>
                        </div>
                        <p>{{$comment->body}}</p>
                    </div>
                </div>
                @endforeach
                {{$comments->links()}}
            </div>
        </div>
    </div>
</div>