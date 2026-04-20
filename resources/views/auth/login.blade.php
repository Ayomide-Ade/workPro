<x-layout title="Login - KareVault Internship">

    <div class="auth-page">
        
        <div class="auth-glow-green"></div>

        <div class="auth-nav-light">
            <a href="/"><img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="auth-logo-img"></a>
            <a href="/register" class="btn btn-success px-5 py-2 text-[14px]">Apply Now &rarr;</a>
        </div>

        <div class="auth-content-wrap">
            <div class="auth-card-light">
                
                <h1 class="auth-title">Welcome back</h1>
                <p class="auth-subtitle">Log in to check your application status.</p>

                @if(session('error'))
                    <div class="flash-error">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="flash-success">{{ session('success') }}</div>
                @endif

                <form action="/login" method="POST" novalidate>
                    @csrf
                    
                    <div class="mb-5">
                        <label class="form-label-light" for="email">Email Address</label>
                        <input class="form-input-light" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@email.com" required autofocus />
                        @error('email')<p class="form-error-text ">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="mb-6">
                        <label class="form-label-light" for="password">Password</label>
                        <input class="form-input-light" type="password" id="password" name="password" placeholder="Your password" required />
                        @error('password')<p class="form-error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="flex items-center gap-2.5 mb-8">
                        <input type="checkbox" id="show_password" class="form-checkbox-light" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password';" />
                        <label for="show_password" class="form-checkbox-label">Show password</label>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-full py-3.5 text-[16px]">
                        Log In
                    </button>
                </form>

                <p class="auth-footer-text">
                    Don't have an account? 
                    <a href="/register" class="auth-footer-link">Apply now</a>
                </p>
                
            </div>
        </div>
    </div>

</x-layout>