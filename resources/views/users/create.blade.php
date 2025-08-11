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
                <x-form :action="route('user.store')" post>
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                           <x-input
                                name="name"
                                label="Name"
                                placeholder="Enter the name"
                                value="{{ old('name') }}"
                                required
                           />
                        </div>
                        <div class="col-6 form-group mb-2">
                           <x-input
                                type="email"
                                name="email"
                                label="Email"
                                placeholder="Enter the email"
                                value="{{ old('email') }}"
                                required
                           />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group mb-2">
                           <x-input
                                type="tel"
                                name="phone"
                                label="Phone"
                                placeholder="Enter the phone number"
                                value="{{ old('phone') }}"
                                autocomplete="tel"
                                required
                           />
                        </div>
                        <div class="col-6 form-group mb-2">
                           <x-input
                                type="date"
                                name="date_of_birth"
                                label="DOB"
                                placeholder="Select date"
                                value="{{ old('date_of_birth') }}"
                                required
                           />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           <x-textarea
                                name="address"
                                label="Address"
                                placeholder="Enter the address"
                                value="{{ old('address') }}"
                                required
                           />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2">
                           <x-textarea
                                name="professional_summary"
                                label="Profissional Summary"
                                placeholder="Enter the summary"
                                value="{{ old('professional_summary') }}"
                           />
                        </div>
                    </div>
                    <button type="submit" class="btn primary-btn-outline d-block ms-auto me-auto mt-3">Register</button>
                </x-form>
            </div>
        </div>
    </main>

    <x-users.scripts/>
</x-layouts.body>
