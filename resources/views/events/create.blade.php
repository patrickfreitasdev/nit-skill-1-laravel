<x-layouts.body title="Create Event">

    <main id="internal-main" class="container mt-5 pb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Create a new event</h1>
                    <a href="{{ route('events.index')  }}" class="btn primary-btn-outline btn-register">Return</a>
                </div>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="col-12">
                <x-form :action="route('events.store')" post enctype="multipart/form-data" class="mb-3">
                    <div class="form-group mb-2">
                        <x-input name="title" label="Event Title" required placeholder="Enter the event title" />
                    </div>

                    <div class="form-group mb-2">
                        <x-input name="date" type="date" label="Date" required placeholder="Select date" />
                    </div>

                    <div class="form-group mb-2">
                        <x-input name="location" label="Location" required placeholder="Enter the event location" />
                    </div>

                    <div class="form-group mb-2">
                        <x-input name="price" type="number" label="Price" placeholder="Enter the event price" />
                    </div>

                    <div class="form-group mb-3">
                        <x-input name="event_image" type="file" label="Event image" />
                    </div>

                    <div class="form-group mb-3">
                        <x-textarea name="description" label="Event description" required placeholder="Enter the event description" rows="3" />
                    </div>

                    <button type="submit" class="btn primary-btn-outline d-block ms-auto me-auto mt-3">Register</button>
                </x-form>
            </div>
        </div>
    </main>


</x-layouts.body>
