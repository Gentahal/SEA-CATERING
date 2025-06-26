<x-guest-layout>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Welcome Back 👋</h2>
                <p>Login to your SEA Catering account</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            autocomplete="username" class="form-input" placeholder="Enter your email" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="form-error" />
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="form-input" placeholder="Enter your password" />
                        <button type="button" class="password-toggle">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="form-error" />
                </div>

                <div class="form-group flex items-center justify-between">
                    <label class="text-sm text-gray-700 flex items-center space-x-2">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 rounded border-gray-300 text-primary-600">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="auth-link text-sm">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <div class="form-actions">
                    <button type="submit" class="auth-button">
                        Sign In <i class="fas fa-sign-in-alt ms-2"></i>
                    </button>
                </div>

                <div class="auth-footer">
                    <p>Don't have an account? <a href="{{ route('register') }}" class="auth-link">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    {{-- Include the same style from register --}}
    <style>
        :root {
            --primary-color: #2a9d8f;
            --secondary-color: #264653;
            --accent-color: #e9c46a;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --light-gray: #e9ecef;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fefefe;
            padding: 2rem;
        }

        .auth-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            max-width: 100%;
            width: 600px;
        }

        @media (max-width: 640px) {
            .auth-card {
                width: 90%;
            }
        }


        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-header h2 {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .auth-header p {
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--secondary-color);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: var(--gray-color);
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid var(--light-gray);
            border-radius: 8px;
            font-size: 0.95rem;
            background-color: #fefefe;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            background: none;
            border: none;
            color: var(--gray-color);
            cursor: pointer;
            font-size: 0.95rem;
        }

        .form-error {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }

        .auth-button {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .auth-button:hover {
            background-color: #21867a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(42, 157, 143, 0.2);
        }

        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.95rem;
            color: var(--gray-color);
        }

        .auth-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .auth-link:hover {
            color: #21867a;
            text-decoration: underline;
        }
    </style>

    <script>
        document.querySelectorAll('.password-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });
    </script>
</x-guest-layout>