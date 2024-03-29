<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 m-2 ms-5" href="{{ route('welcome') }}">
            {{-- <img src="{{ asset('assests/Images/logo.gif') }}" width="145" class="d-inline-block ms-5 mt-4"> --}}
            Pastly
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse right" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Products
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('shop', ['category' => $category['slug']]) }}">{{ $category['name'] }}</a>
                            </li>
                        @endforeach
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('shop') }}">More..</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex me-4" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
            <button type="button" class="me-3 btn btn-light position-relative">
                <i class="bi bi-heart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                    1
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
            @livewire('cart-counter')
        </div>
    </div>
</nav>
