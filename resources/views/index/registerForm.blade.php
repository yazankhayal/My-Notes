<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="col-md-12 mb-20 text-center">
        <h5 class="h5-xl">Try for free register, no credit card required.</h5>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   placeholder="Your Name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   placeholder="Your Email"
                   value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <input id="password" type="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Your Password"
                   name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <input id="password-confirm" type="password" class="form-control"
                   placeholder="Your Confirmation Password"
                   name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-md btn-theme theme-hover submit">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
