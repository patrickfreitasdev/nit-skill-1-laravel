<x-layouts.body title="Home Page">

    <main id="internal-main" class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Members</h1>
                    @if(user()?->isAdmin())
                        <a href="{{route('user.create')}}" class="btn primary-btn-outline btn-register">Register member</a>
                    @elseif(!user())
                        <a href="{{route('login')}}" class="btn primary-btn-outline btn-register">Login</a>
                    @endif
                </div>
            </div>
        </div>

     <x-home.form/>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            @if(user()?->isAdmin())
                                <th scope="col">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                       @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td class="email">{{ $user->email }}</td>
                            <td>{{ $user->getYearOfBirthAttribute() }}</td>
                            @if(user()?->isAdmin())
                                <td>
                                    <div class="d-flex gap-2 align-items-center justify-content-center">
                                        <a class="btn-action" href="{{ route('user.edit', $user->id) }}">
                                            <span class="visually-hidden">Edit user details</span>
                                            <i class="lni lni-pencil-1"></i>
                                        </a>
                                        <a class="btn-action btn-action--delete" href="#" onclick="return confirm('Are you sure you want to delete this user?')">
                                            <span class="visually-hidden">Delete user</span>
                                            <i class="lni lni-trash-3"></i>
                                        </a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                       @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @if($users->hasPages())
            <div class="row">
                <div class="col-12 mt-2 mb-2">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        @endif

    </main>

</x-layouts.body>
