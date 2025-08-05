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

       <x-events.filter/>

        <div class="row">
            <div class="col-lg-12">
                <div class="about-title text-center">
                    <h2 class="title fw-bold">Events</h2>
                </div>
            </div>
        </div>
            @empty($events->all())
                <div class="alert alert-dark mt-5" role="alert">
                    No events found.
                </div>
            @endempty

        <div class="row mt-4 mb-4">
            @forEach($events as $event)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="event-card">
                        <div class="feature-image">
                            @if(user())
                                <x-form :action="route('events.destroy', $event)" delete onsubmit="return confirm('Are you sure you want to delete this event?')">
                                    <button type="submit">
                                        <i class="lni lni-trash-3"></i>
                                        <span class="visually-hidden">Delete event</span>
                                    </button>
                                </x-form>
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

        @if($events->hasPages())
            <div class="row">
                <div class="col-12 mt-2 mb-2">
                    {{ $events->withQueryString()->links() }}
                </div>
            </div>
        @endif

    </main>


</x-layouts.body>
