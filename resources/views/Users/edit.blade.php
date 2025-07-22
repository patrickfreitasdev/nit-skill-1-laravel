<x-layouts.body title="Edit user {{$user->name}}">
    <main id="internal-main" class="container mt-5 pb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Editing user {{ $user->id }}</h1>
                    <a href="{{ route('home.index') }}" class="btn primary-btn-outline btn-register">Return</a>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="col-12">
                <form>
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                            <label for="fname" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="fname"
                                required
                                value="First Name"
                                placeholder="Enter the first name"
                            />
                            <span class="text-danger login-error d-block mt-1 mb-1">Something went wrong</span>
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label for="lname" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="lname"
                                value="Last Name"
                                placeholder="Enter the last name"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                            <label for="lname" class="form-label">Email <span class="text-danger">*</span></label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                value="user@email.com"
                                placeholder="Enter the email"
                            />
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label for="date" class="form-label">DOB <span class="text-danger">*</span></label>
                            <input value="2018-07-22" type="date" class="form-control" id="date" placeholder="Select date">
                        </div>
                    </div>
                    <button type="submit" class="btn primary-btn-outline d-block ms-auto me-auto mt-3">Save Changes</button>
                </form>
            </div>
        </div>
    </main>
</x-layouts.body>
