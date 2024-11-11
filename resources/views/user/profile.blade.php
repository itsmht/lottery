@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container">
    <div class="genBox mBottom">
        <h1>Edit Profile</h1>

        <!-- Display success or error messages -->
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <!-- Form to edit user profile -->
        <form action="{{ route('editUserProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST') <!-- Specify that this is a POST request -->

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" readonly>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="balance">Balance</label>
                <input type="number" name="balance" id="balance" class="form-control" value="{{ old('balance', $user->balance) }}">
                @error('balance')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Profile Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                @if($user->image)
                    <div>
                        <p>Current Image:</p>
                        <img src="{{ asset('user_images/'.$user->image) }}" alt="Profile Image" width="100">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>

@include('userLayouts.footer')
