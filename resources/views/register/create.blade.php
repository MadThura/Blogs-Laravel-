<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Register form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input value="{{old('name')}}" name="name" type="text" class="form-control" id="exampleInputName" required>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername" class="form-label">Username</label>
                            <input value="{{old('username')}}" name="username" type="text" class="form-control" id="exampleInputUsername" required>
                            @error('username')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
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