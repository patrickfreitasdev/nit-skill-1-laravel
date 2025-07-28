<x-layouts.body title="Create User">
    <main id="internal-main" class="container mt-5 pb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Create a new user</h1>
                    <a href="{{route('home.index')}}" class="btn primary-btn-outline btn-register">Return</a>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="col-12">
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                            <label for="name" class="form-label">Full name <span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                required
                                placeholder="Enter the full name"
                                value="{{ old('name') }}"
                            />
                            @error('name')
                                <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter the email"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input
                                type="tel"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="Enter the phone number"
                                value="{{ old('phone') }}"
                            />
                            @error('phone')
                                <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label for="date" class="form-label">DOB <span class="text-danger">*</span></label>
                            <input
                                type="date"
                                class="form-control"
                                id="date"
                                name="date_of_birth"
                                placeholder="Select date"
                                value="{{ old('date_of_birth') }}"
                                required
                            >
                            @error('date_of_birth')
                                <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control"
                                id="address"
                                name="address"
                                rows="3"
                                placeholder="Enter the address"
                            >{{ old('address') }}</textarea>
                            @error('address')
                                <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                            <label for="profissional_summary" class="form-label">Profissional Summary</label>
                            <textarea
                                class="form-control"
                                id="profissional_summary"
                                name="profissional_summary"
                                rows="3"
                                placeholder="Enter the summary"
                            >{{ old('profissional_summary') }}</textarea>
                            @error('profissional_summary')
                            <span class="text-danger login-error d-block mt-1 mb-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn primary-btn-outline d-block ms-auto me-auto mt-3">Register</button>
                </form>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            const input = document.querySelector("#phone");
            window.intlTelInput(input, {
                loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.1/build/js/utils.js"),
            });
        </script>
    @endpush
</x-layouts.body>
