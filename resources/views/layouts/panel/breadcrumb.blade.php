<div class="row">
    <div class="col-6">
        <div class="float-start">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield("title")</li>
                </ol>
            </nav>
        </div>
    </div>
    @if (trim($__env->yieldContent('link')))
        <div class="col-6">
            <div class="float-end">
                <a href="@yield("link")" class="btn btn-primary btn-sm">
                    @yield("name-link")
                </a>
            </div>
        </div>
    @endif
</div>
