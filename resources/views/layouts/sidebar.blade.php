<style>
    .countMessage {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: red;
        color: white;
        width: 16px;
        height: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-size: 8px;
    }
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="{{ url('/') }}" target="_blank">
            <img src="{{ asset('dashboard') }}/img/logo-ct-dark.png" class="navbar-brand-img" width="26"
                height="26" alt="main_logo">
            <span class="ms-1 text-sm text-dark">{{ auth()->user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.categories.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                    href="{{ route('admin.categories.index') }}">
                    <i class="material-symbols-rounded opacity-5">category</i>
                    <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.books.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                    href="{{ route('admin.books.index') }}">
                    <i class="material-symbols-rounded opacity-5">auto_stories</i>
                    <span class="nav-link-text ms-1">E-Books</span>
                </a>
            </li>
            @php
                $count = 0;
                $transactions = \App\Models\Transaction::where('status', 'pending')->where('is_paid', 0)->count();
                if ($transactions > 0) {
                    $count = $transactions;
                }
            @endphp
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.transactions.*') ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                    href="{{ route('admin.transactions.index') }}">
                    <div class="position-relative d-flex align-items-center justify-content-center">
                        <i class="material-symbols-rounded opacity-5">payments</i>
                        @if ($count > 0)
                            <span class="countMessage">
                                {{ $count }}
                            </span>
                        @endif
                    </div>
                    <span class="nav-link-text ms-1">Transactions</span>
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-dark">
                        <i class="material-symbols-rounded opacity-5 text-danger">login</i>
                        <span class="nav-link-text text-danger ms-1">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
