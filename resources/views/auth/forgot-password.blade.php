<x-guest-layout>
    {{-- Card Header --}}
    <div class="auth-card-header">
        <h1 class="auth-card-title">Reset password</h1>
        <p class="auth-card-desc">Enter your email and we'll send you a reset link</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="auth-session-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
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
                />
            </div>
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        {{-- Submit --}}
        <button type="submit" class="auth-submit-btn" style="margin-top: 0.5rem;">
            <span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
                Send Reset Link
            </span>
        </button>

        <div style="text-align: center; margin-top: 1.25rem;">
            <a class="auth-forgot-link" href="{{ route('login') }}">← Back to sign in</a>
        </div>
    </form>
</x-guest-layout>
