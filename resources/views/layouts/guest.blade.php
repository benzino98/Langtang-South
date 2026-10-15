<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Login — {{ config('app.name', 'Langtang South LGA') }}</title>
        <meta name="description" content="Secure admin portal for Langtang South Local Government Council">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* ── Base ──────────────────────────────────── */
            :root {
                --green-primary: #0A5C42;
                --green-light: #0F835F;
                --green-dark: #063B2A;
                --gold: #D4AF37;
                --gold-light: #E5C665;
            }

            * { box-sizing: border-box; }

            body.guest-body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Inter', system-ui, sans-serif;
                background: #F8FAFC;
                overflow-x: hidden;
            }

            /* ── Split Layout ─────────────────────────── */
            .auth-wrapper {
                display: flex;
                min-height: 100vh;
            }

            /* ── Left Panel (Brand side) ──────────────── */
            .auth-brand-panel {
                display: none;
                position: relative;
                width: 50%;
                background: linear-gradient(160deg, var(--green-dark) 0%, var(--green-primary) 40%, var(--green-light) 100%);
                overflow: hidden;
                flex-shrink: 0;
            }

            @media (min-width: 1024px) {
                .auth-brand-panel { display: flex; }
            }

            /* Animated background shapes */
            .auth-brand-panel::before,
            .auth-brand-panel::after {
                content: '';
                position: absolute;
                border-radius: 50%;
                opacity: 0.08;
                background: white;
            }

            .auth-brand-panel::before {
                width: 600px;
                height: 600px;
                top: -200px;
                right: -150px;
                animation: float-slow 20s ease-in-out infinite;
            }

            .auth-brand-panel::after {
                width: 400px;
                height: 400px;
                bottom: -100px;
                left: -100px;
                animation: float-slow 15s ease-in-out infinite reverse;
            }

            @keyframes float-slow {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                33% { transform: translate(30px, -30px) rotate(5deg); }
                66% { transform: translate(-20px, 20px) rotate(-3deg); }
            }

            .brand-content {
                position: relative;
                z-index: 2;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: flex-start;
                padding: 4rem 3.5rem;
                width: 100%;
                height: 100%;
            }

            /* Decorative floating orbs */
            .orb {
                position: absolute;
                border-radius: 50%;
                background: radial-gradient(circle, rgba(212, 175, 55, 0.15), transparent 70%);
                pointer-events: none;
            }

            .orb-1 {
                width: 300px;
                height: 300px;
                top: 15%;
                right: 10%;
                animation: pulse-orb 8s ease-in-out infinite;
            }

            .orb-2 {
                width: 200px;
                height: 200px;
                bottom: 20%;
                left: 15%;
                animation: pulse-orb 6s ease-in-out infinite 2s;
            }

            .orb-3 {
                width: 150px;
                height: 150px;
                top: 60%;
                right: 25%;
                animation: pulse-orb 10s ease-in-out infinite 4s;
            }

            @keyframes pulse-orb {
                0%, 100% { transform: scale(1); opacity: 0.6; }
                50% { transform: scale(1.2); opacity: 1; }
            }

            /* Brand badge */
            .brand-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                padding: 0.5rem 1rem;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.15);
                border-radius: 9999px;
                font-size: 0.75rem;
                font-weight: 600;
                color: rgba(255, 255, 255, 0.9);
                letter-spacing: 0.08em;
                text-transform: uppercase;
                margin-bottom: 2rem;
            }

            .brand-badge-dot {
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: var(--gold);
                animation: dot-pulse 2s ease-in-out infinite;
            }

            @keyframes dot-pulse {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.5; transform: scale(0.8); }
            }

            .brand-title {
                font-family: 'Poppins', sans-serif;
                font-size: 2.75rem;
                font-weight: 800;
                line-height: 1.15;
                color: white;
                margin: 0 0 1.25rem;
            }

            .brand-title span {
                background: linear-gradient(90deg, var(--gold-light), var(--gold));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .brand-subtitle {
                font-size: 1.05rem;
                line-height: 1.7;
                color: rgba(255, 255, 255, 0.7);
                max-width: 420px;
                margin: 0 0 3rem;
            }

            /* Stats row */
            .brand-stats {
                display: flex;
                gap: 2rem;
            }

            .stat-item {
                text-align: left;
            }

            .stat-value {
                font-family: 'Poppins', sans-serif;
                font-size: 1.75rem;
                font-weight: 700;
                color: var(--gold);
            }

            .stat-label {
                font-size: 0.8rem;
                color: rgba(255, 255, 255, 0.55);
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-top: 0.15rem;
            }

            /* Decorative line */
            .brand-divider {
                width: 60px;
                height: 3px;
                background: linear-gradient(90deg, var(--gold), transparent);
                border-radius: 999px;
                margin-bottom: 2rem;
            }

            /* Bottom attribution */
            .brand-footer {
                position: absolute;
                bottom: 2rem;
                left: 3.5rem;
                z-index: 2;
                font-size: 0.75rem;
                color: rgba(255, 255, 255, 0.35);
            }

            /* ── Right Panel (Form side) ──────────────── */
            .auth-form-panel {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem 1.5rem;
                background: #F8FAFC;
                position: relative;
            }

            @media (min-width: 640px) {
                .auth-form-panel { padding: 3rem 2.5rem; }
            }

            /* Mobile header (shown only on small screens) */
            .mobile-header {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 2rem;
            }

            @media (min-width: 1024px) {
                .mobile-header { display: none; }
            }

            .mobile-logo-icon {
                width: 56px;
                height: 56px;
                background: linear-gradient(135deg, var(--green-primary), var(--green-light));
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                box-shadow: 0 8px 24px rgba(10, 92, 66, 0.2);
            }

            .mobile-logo-icon svg {
                width: 28px;
                height: 28px;
                fill: none;
                stroke: white;
                stroke-width: 2;
            }

            .mobile-title {
                font-family: 'Poppins', sans-serif;
                font-size: 1.25rem;
                font-weight: 700;
                color: var(--green-dark);
                text-align: center;
            }

            /* Auth card */
            .auth-card {
                width: 100%;
                max-width: 420px;
                background: white;
                border-radius: 20px;
                padding: 2.5rem 2rem;
                box-shadow:
                    0 1px 3px rgba(0, 0, 0, 0.04),
                    0 8px 32px rgba(0, 0, 0, 0.06);
                border: 1px solid rgba(0, 0, 0, 0.04);
                animation: card-enter 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
            }

            @media (min-width: 640px) {
                .auth-card { padding: 2.5rem; }
            }

            @keyframes card-enter {
                from {
                    opacity: 0;
                    transform: translateY(20px) scale(0.98);
                }
                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

            .auth-card-header {
                margin-bottom: 2rem;
            }

            .auth-card-title {
                font-family: 'Poppins', sans-serif;
                font-size: 1.5rem;
                font-weight: 700;
                color: #1E293B;
                margin: 0 0 0.35rem;
            }

            .auth-card-desc {
                font-size: 0.875rem;
                color: #94A3B8;
                margin: 0;
            }

            /* Form styles */
            .auth-form-group {
                margin-bottom: 1.25rem;
            }

            .auth-form-group label {
                display: block;
                font-size: 0.8rem;
                font-weight: 600;
                color: #475569;
                margin-bottom: 0.5rem;
                letter-spacing: 0.01em;
            }

            .auth-input {
                width: 100%;
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
                color: #1E293B;
                background: #F8FAFC;
                border: 1.5px solid #E2E8F0;
                border-radius: 12px;
                outline: none;
                transition: all 0.25s ease;
                font-family: 'Inter', sans-serif;
            }

            .auth-input::placeholder {
                color: #CBD5E1;
            }

            .auth-input:focus {
                border-color: var(--green-primary);
                background: white;
                box-shadow: 0 0 0 3px rgba(10, 92, 66, 0.08);
            }

            .auth-input:hover:not(:focus) {
                border-color: #CBD5E1;
            }

            /* Input with icon */
            .input-wrapper {
                position: relative;
            }

            .input-icon {
                position: absolute;
                left: 1rem;
                top: 50%;
                transform: translateY(-50%);
                width: 18px;
                height: 18px;
                color: #94A3B8;
                pointer-events: none;
                transition: color 0.25s ease;
            }

            .input-wrapper:focus-within .input-icon {
                color: var(--green-primary);
            }

            .input-wrapper .auth-input {
                padding-left: 2.75rem;
            }

            /* Password toggle */
            .password-toggle {
                position: absolute;
                right: 0.75rem;
                top: 50%;
                transform: translateY(-50%);
                background: none;
                border: none;
                cursor: pointer;
                color: #94A3B8;
                padding: 0.25rem;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: color 0.2s;
            }

            .password-toggle:hover {
                color: #64748B;
            }

            .password-toggle svg {
                width: 18px;
                height: 18px;
            }

            /* Checkbox */
            .auth-checkbox-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1.75rem;
            }

            .auth-checkbox-label {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                cursor: pointer;
                font-size: 0.8rem;
                color: #64748B;
            }

            .auth-checkbox-label input[type="checkbox"] {
                width: 16px;
                height: 16px;
                border: 1.5px solid #CBD5E1;
                border-radius: 5px;
                cursor: pointer;
                accent-color: var(--green-primary);
            }

            .auth-forgot-link {
                font-size: 0.8rem;
                font-weight: 500;
                color: var(--green-primary);
                text-decoration: none;
                transition: color 0.2s;
            }

            .auth-forgot-link:hover {
                color: var(--green-light);
            }

            /* Submit button */
            .auth-submit-btn {
                width: 100%;
                padding: 0.85rem 1.5rem;
                font-size: 0.9rem;
                font-weight: 600;
                font-family: 'Inter', sans-serif;
                color: white;
                background: linear-gradient(135deg, var(--green-primary) 0%, var(--green-light) 100%);
                border: none;
                border-radius: 12px;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(10, 92, 66, 0.25);
                position: relative;
                overflow: hidden;
            }

            .auth-submit-btn::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(135deg, var(--green-light) 0%, var(--green-primary) 100%);
                opacity: 0;
                transition: opacity 0.3s ease;
                border-radius: inherit;
            }

            .auth-submit-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 20px rgba(10, 92, 66, 0.35);
            }

            .auth-submit-btn:hover::before {
                opacity: 1;
            }

            .auth-submit-btn:active {
                transform: translateY(0);
            }

            .auth-submit-btn span {
                position: relative;
                z-index: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }

            /* Error messages */
            .auth-error {
                font-size: 0.75rem;
                color: #EF4444;
                margin-top: 0.35rem;
            }

            /* Session status */
            .auth-session-status {
                padding: 0.75rem 1rem;
                background: #F0FDF4;
                border: 1px solid #BBF7D0;
                border-radius: 10px;
                font-size: 0.8rem;
                color: #166534;
                margin-bottom: 1.5rem;
            }

            /* Back to home link */
            .back-home {
                margin-top: 2rem;
                font-size: 0.8rem;
                color: #94A3B8;
                text-align: center;
            }

            .back-home a {
                color: var(--green-primary);
                text-decoration: none;
                font-weight: 500;
                transition: color 0.2s;
            }

            .back-home a:hover {
                color: var(--green-light);
            }

            /* Responsive tweaks */
            @media (max-width: 639px) {
                .auth-card {
                    border-radius: 16px;
                    padding: 1.75rem 1.5rem;
                    box-shadow:
                        0 1px 3px rgba(0, 0, 0, 0.03),
                        0 4px 20px rgba(0, 0, 0, 0.04);
                }

                .auth-card-title { font-size: 1.3rem; }
                .brand-stats { gap: 1.5rem; }
            }

            /* Geometric decorative pattern on the brand panel */
            .geo-pattern {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 300px;
                opacity: 0.04;
                background:
                    repeating-linear-gradient(
                        60deg,
                        transparent,
                        transparent 40px,
                        white 40px,
                        white 41px
                    );
                pointer-events: none;
            }
        </style>
    </head>
    <body class="guest-body">
        <div class="auth-wrapper">
            {{-- Left Brand Panel --}}
            <div class="auth-brand-panel">
                <div class="orb orb-1"></div>
                <div class="orb orb-2"></div>
                <div class="orb orb-3"></div>
                <div class="geo-pattern"></div>

                <div class="brand-content">
                    <div class="brand-badge">
                        <span class="brand-badge-dot"></span>
                        Admin Portal
                    </div>

                    <h1 class="brand-title">
                        Langtang South<br>
                        <span>Local Government</span><br>
                        Council
                    </h1>

                    <div class="brand-divider"></div>

                    <p class="brand-subtitle">
                        Secure administrative portal for managing council resources, services, and community programs with transparency and accountability.
                    </p>

                    <div class="brand-stats">
                        <div class="stat-item">
                            <div class="stat-value">10+</div>
                            <div class="stat-label">Departments</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">24/7</div>
                            <div class="stat-label">Availability</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">100%</div>
                            <div class="stat-label">Secure</div>
                        </div>
                    </div>
                </div>

                <div class="brand-footer">
                    &copy; {{ date('Y') }} Langtang South LGA. All rights reserved.
                </div>
            </div>

            {{-- Right Form Panel --}}
            <div class="auth-form-panel">
                {{-- Mobile header --}}
                <div class="mobile-header">
                    <div class="mobile-logo-icon">
                        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" />
                        </svg>
                    </div>
                    <div class="mobile-title">Langtang South LGA</div>
                </div>

                {{-- Auth Card (slot content goes here) --}}
                <div class="auth-card">
                    {{ $slot }}
                </div>

                <div class="back-home">
                    <a href="{{ url('/') }}">← Back to main website</a>
                </div>
            </div>
        </div>

        <script>
            // Password visibility toggle
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.password-toggle').forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const input = this.parentElement.querySelector('input');
                        const eyeOpen = this.querySelector('.eye-open');
                        const eyeClosed = this.querySelector('.eye-closed');
                        if (input.type === 'password') {
                            input.type = 'text';
                            eyeOpen.style.display = 'none';
                            eyeClosed.style.display = 'block';
                        } else {
                            input.type = 'password';
                            eyeOpen.style.display = 'block';
                            eyeClosed.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </body>
</html>
