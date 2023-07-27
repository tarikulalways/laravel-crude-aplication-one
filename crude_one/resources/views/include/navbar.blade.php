<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">CRUDE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('create.category') }}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.subcategory') }}">Sub Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create.product') }}">Product</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
