<x-guest-layout>
    {{-- Card Header --}}
    <div class="auth-card-header">
        <h1 class="auth-card-title">Welcome back</h1>
        <p class="auth-card-desc">Sign in to your admin dashboard</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="auth-session-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

        {{-- Email --}}
        <div class="auth-form-group">
            <label for="email">Email Address</label>
            <div class="input-wrapper">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="3" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                </svg>
                <input
                    id="email"
                    class="auth-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="admin@langtangsouthlga.ng"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Password --}}
        <div class="auth-form-group">
            <label for="password">Password</label>
            <div class="input-wrapper">
                <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" />
                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                </svg>
                <input
                    id="password"
                    class="auth-input"
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                    autocomplete="current-password"
                />
                <button type="button" class="password-toggle" aria-label="Toggle password visibility">
                    <svg class="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    <svg class="eye-closed" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                        <path d="M10.733 5.076a10.744 10.744 0 0 1 11.205 6.575 1 1 0 0 1 0 .696 10.747 10.747 0 0 1-1.444 2.49" />
                        <path d="M14.084 14.158a3 3 0 0 1-4.242-4.242" />
                        <path d="M17.479 17.499a10.75 10.75 0 0 1-15.417-5.151 1 1 0 0 1 0-.696 10.75 10.75 0 0 1 4.446-5.143" />
                        <path d="m2 2 20 20" />
                    </svg>
                </button>
            </div>
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Remember me + Forgot password --}}
        <div class="auth-checkbox-row">
            <label class="auth-checkbox-label" for="remember_me">
                <input id="remember_me" type="checkbox" name="remember">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a class="auth-forgot-link" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        {{-- Submit --}}
        <button type="submit" class="auth-submit-btn" id="login-submit">
            <span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                    <polyline points="10 17 15 12 10 7" />
                    <line x1="15" y1="12" x2="3" y2="12" />
                </svg>
                Sign In
            </span>
        </button>
    </form>
</x-guest-layout>
