<x-layouts.body title="Events">

    <main class="container mt-5">
        @if(user())
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('events.create')  }}" class="btn primary-btn-outline btn-register">Register
                            Event</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="row mb-4 mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <form class="d-flex gap-2 align-items-end" style="width: 100%;">
                        <div class="form-group">
                            <label for="name" class="form-label">Location</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter the location">
                        </div>
                        <div class="form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" placeholder="Select date">
                        </div>
                        <div>
                            <button type="submit" class="btn primary-btn-outline btn-filter">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="about-title text-center">
                    <h2 class="title fw-bold">Events</h2>
                </div>
            </div>
        </div>

        <div class="row mt-4 mb-4">
            @forEach($events as $event)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="event-card">
                        <div class="feature-image">
                            @if(user())
                                <fom>
                                    <button type="submit"
                                            onclick="return confirm('Are you sure you want to delete this event?')">
                                        <i class="lni lni-trash-3"></i>
                                        <span class="visually-hidden">Delete event</span>
                                    </button>
                                </fom>
                            @endif

                            @if($event->photo_path)
                                <picture>
                                    <source src="{{ asset('storage/' . $event->photo_path) }}" type="image/jpeg"
                                            srcset="">
                                    <img src="{{ asset('storage/' . $event->photo_path) }}" alt="{{ $event->title }}">
                                </picture>
                            @else
                                <img src="{{asset('img/placeholder.png')}}" alt="Event 1">
                            @endif

                        </div>
                        <div class="details">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            <p class="event-description">{{ $event->description }}</p>
                            <div class="event-meta">
                                <div class="event-meta--date">
                                    <i class="lni lni-calendar-days"></i>
                                    <span>{{ $event->date }}</span>
                                </div>
                                <div class="event-meta--location">
                                    <i class="lni lni-map-marker-1"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                <div class="event-meta--price">
                                    <i class="lni lni-dollar-circle"></i>
                                    @if($event->price > 0)
                                        <span>$ {{ $event->price }}</span>
                                    @else
                                        <span>Free</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <nav id="table-pagination" aria-label="Pagination for the members list"
                     class="d-flex justify-content-end pb-4">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>


    </main>


</x-layouts.body>
