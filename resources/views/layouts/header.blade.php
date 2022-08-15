<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="/">NGOPI DIMANE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div>
            <select class="form-select" onchange="cari(this.value)">
                <option class="selected" value="">---Pilih---</option>
                @foreach ($list as $l)
                    <option value="{{ $l->id }}">{{ $l->Title }}</option>
                @endforeach
            </select>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/data') ? 'active' : '' }}" href="/data">Persebaran Data</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
