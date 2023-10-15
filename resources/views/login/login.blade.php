<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Login form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input value="{{old('email')}}" name="email" type="email" class="form-control" id="exampleInputEmail" required>
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword" required>
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <input class="btn btn-primary" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>