@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container my-5">
    <div class="genBox mBottom">
        <h1 class="text-center mb-4">Edit Your Profile</h1>

        <!-- Display success or error messages -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Profile edit form -->
        <form action="{{ route('editUserProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="row">
                <div class="col-md-4 text-center">
                    <!-- Profile Image -->
                    <div class="mb-3">
                        <img src="{{ $user->image ? asset('user_images/'.$user->image) : asset('user_images/default-avatar.png') }}" 
                             alt="Profile Image" 
                             class="img-fluid rounded-circle border border-3" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Change Profile Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Form Fields -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" readonly>
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="balance" class="form-label">Balance</label>
                        <input type="number" name="balance" id="balance" class="form-control" value="{{ old('balance', $user->balance) }}">
                        @error('balance')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4 py-2">Update Profile</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@include('userLayouts.footer')

<!-- Custom CSS to enhance the layout -->
<style>
    .genBox {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .genBox h1 {
        color: #495057;
        font-size: 2rem;
        font-weight: 600;
    }

    .form-control {
        border-radius: 5px;
        box-shadow: none;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 25px;
        font-size: 1rem;
        border-radius: 5px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
    }

    .text-danger {
        font-size: 0.875rem;
        color: #dc3545;
    }

    .text-center {
        text-align: center;
    }
</style>
