<x-layouts.body title="Login">

    <main id="internal-main" class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center fs-3">Login to your account</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form id="login-form" role="form">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                        <span class="text-danger login-error d-block mt-1 mb-1">Something went wrong</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter password">
                        <span class="text-danger login-error d-block mt-1 mb-1">Something went wrong</span>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn primary-btn-outline">Login</button>
                    </div>
                </form>
            </div>
        </div>


    </main>

</x-layouts.body>
