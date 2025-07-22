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
                <form>
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" required
                               placeholder="Enter the event title"/>
                        <span class="text-danger login-error d-block mt-1 mb-1">Something went wrong</span>
                    </div>
                    <div class="form-group mb-2 d-flex gap-2">
                        <div class="flex-fill">
                            <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date" placeholder="Select date">
                        </div>
                        <div class="flex-fill">
                            <label for="time" class="form-label">Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="time" placeholder="Select date">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="location" placeholder="Enter the event location"/>
                    </div>
                    <div class="form-group mb-2">
                        <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                        <select id="category" name="category" class="form-select" aria-label="Select a category">
                            <option selected>Select the category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Event image</label>
                        <input type="file" name="image" id="image" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Event description <span
                                class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" rows="3"
                                  placeholder="Enter the event description"></textarea>
                    </div>

                    <button type="submit" class="btn primary-btn-outline d-block ms-auto me-auto mt-3">Register</button>
                </form>
            </div>
        </div>
    </main>


</x-layouts.body>
