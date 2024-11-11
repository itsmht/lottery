@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container my-5">
    <!-- Modern Styled Card Container -->
    <div class="card shadow-lg rounded-4">
        <div class="card-body">
            <h1 class="text-center mb-4 text-primary">Edit Your Profile</h1>

            <!-- Display success or error messages -->
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Profile Edit Form -->
            <form action="{{ route('editUserProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="row">
                    <!-- Left Column for Profile Image -->
                    <div class="col-md-4 text-center">
                        <div class="profile-image-container mb-3">
                            <img src="{{ $user->image ? asset('user_images/'.$user->image) : asset('user_images/default-avatar.png') }}" 
                                 alt="Profile Image" 
                                 class="img-fluid rounded-circle border border-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label text-muted">Change Profile Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column for Form Fields -->
                    <div class="col-md-8">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" readonly>
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <input type="hidden" name="balance" id="balance" class="form-control" value="{{ old('balance', $user->balance) }}">
                            @error('balance')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2">Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('userLayouts.footer')

<!-- Custom Styles -->
<style>
    /* Modern Card Style */
    .card {
        background: linear-gradient(to bottom right, #f8f9fa, #e2e8f0);
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 40px;
    }

    /* Form Label */
    .form-label {
        font-weight: 600;
        font-size: 1rem;
        color: #495057;
    }

    /* Form Inputs */
    .form-control {
        border-radius: 8px;
        box-shadow: none;
        border: 1px solid #ced4da;
        padding: 0.75rem;
    }

    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.25rem rgba(38, 143, 255, 0.25);
    }

    /* Button */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 12px 25px;
        font-size: 1.1rem;
        border-radius: 50px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* Profile Image */
    .profile-image-container {
        width: 150px;
        height: 150px;
        margin: 0 auto;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #007bff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .text-center {
        text-align: center;
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

    .card-body h1 {
        color: #495057;
        font-size: 2rem;
        font-weight: 600;
    }

    /* Ensure Consistent Vertical Alignment */
    .form-group {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .form-group .form-control {
        width: 100%;
    }

    /* Prevent Label and Input Misalignment */
    .form-group label {
        margin-bottom: 8px;
    }

    /* Responsive design adjustments */
    @media (max-width: 768px) {
        .form-control {
            font-size: 0.9rem;
        }
    }
</style>
