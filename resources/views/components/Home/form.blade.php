<div class="row mb-4 mt-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <form class="d-flex gap-2 align-items-end" style="width: 100%;" action="{{route('home.index')}}">
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter full name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div>
                    <button type="submit" class="btn primary-btn-outline btn-filter">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>
