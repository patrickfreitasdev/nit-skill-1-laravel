<div class="row mb-4 mt-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <form action="{{route('events.index')}}" class="d-flex gap-2 align-items-end" style="width: 100%;">
                <div class="form-group">
                    <label for="location" class="form-label">Location</label>
                    <input name="location" type="text" class="form-control" id="location" placeholder="Enter the location" value="{{ request('location') }}">
                </div>
                <div class="form-group">
                    <label for="date" class="form-label">Date</label>
                    <input name="date" type="date" class="form-control" id="date" placeholder="Select date" value="{{ request('date') }}">
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn primary-btn-outline btn-filter">Filter</button>
                    <a href="{{ route('events.index') }}" class="btn btn-clear">Clear</a>
                </div>
            </form>
        </div>
    </div>
</div>
