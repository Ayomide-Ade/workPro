<x-layout title="Apply - KareVault Internship">

    <div class="auth-page py-10 md:py-0">
        
        <div class="auth-glow-green"></div>
        <div class="auth-glow-blue"></div>

        <div class="auth-nav-light">
            <a href="/">
                <img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="auth-logo-img">
            </a>
            <a href="/login" class="btn btn-outline px-5 py-2 text-[14px]">Already applied? Log In</a>
        </div>

        <div class="auth-content-wrap my-8 md:my-12">
            <div class="auth-card-wide">
                
                <h1 class="auth-title">Apply for an Internship</h1>
                <p class="auth-subtitle">Fill in your details below. Your application status will be visible on your dashboard after submission.</p>

                @if($errors->any())
                    <div class="flash-error flex items-start gap-3">
                        <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        <span>Please fix the errors below before continuing.</span>
                    </div>
                @endif

                <form action="/register" method="POST" novalidate>
                    @csrf

                    <div class="form-section-divider">
                        <span class="form-section-text">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Personal Information
                        </span>
                        <div class="form-section-line"></div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label-light" for="name">Full Name</label>
                        <input class="form-input-light" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Amara Okafor" required />
                        @error('name')<p class="form-error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-row-2">
                        <div>
                            <label class="form-label-light" for="email">Email Address</label>
                            <input class="form-input-light" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="you@uni.edu.ng" required />
                            @error('email')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label-light" for="age">Age</label>
                            <input class="form-input-light" type="number" id="age" name="age" value="{{ old('age') }}" placeholder="e.g. 21" min="16" max="40" required />
                            @error('age')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div>
                            <label class="form-label-light" for="password">Password</label>
                            <input class="form-input-light" type="password" id="password" name="password" placeholder="Min. 8 characters" required />
                            @error('password')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label-light" for="password_confirmation">Confirm Password</label>
                            <input class="form-input-light" type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required />
                        </div>
                    </div>

                    <div class="form-section-divider">
                        <span class="form-section-text">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                            Academic Details
                        </span>
                        <div class="form-section-line"></div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label-light" for="school">School / University</label>
                        <input class="form-input-light" type="text" id="school" name="school" value="{{ old('school') }}" placeholder="e.g. University of Lagos" required />
                        @error('school')<p class="form-error-text">{{ $message }}</p>@enderror
                    </div>

                    <div class="form-row-2">
                        <div>
                            <label class="form-label-light" for="department">Department / Course</label>
                            <input class="form-input-light" type="text" id="department" name="department" value="{{ old('department') }}" placeholder="e.g. Computer Science" required />
                            @error('department')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label-light" for="cgpa">CGPA</label>
                            <input class="form-input-light" type="number" id="cgpa" name="cgpa" value="{{ old('cgpa') }}" placeholder="e.g. 4.20" step="0.01" min="0" max="5" required />
                            @error('cgpa')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="form-section-divider">
                        <span class="form-section-text">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Internship Preferences
                        </span>
                        <div class="form-section-line"></div>
                    </div>

                    <div class="form-row-2">
                        <div>
                            <label class="form-label-light" for="state">State of Residency</label>
                            <select class="form-select-light" id="state" name="state" required>
                                <option value="" disabled {{ old('state') ? '' : 'selected' }}>Select your state</option>
                                @foreach($nigerianStates as $state)
                                    <option value="{{ $state }}" {{ old('state') === $state ? 'selected' : '' }}>{{ $state }}</option>
                                @endforeach
                            </select>
                            @error('state')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label-light" for="role_applied_for">Role of Choice</label>
                            <select class="form-select-light" id="role_applied_for" name="role_applied_for" required>
                                <option value="" disabled {{ old('role_applied_for') ? '' : 'selected' }}>Select a role</option>
                                @foreach($availableRoles as $role)
                                    <option value="{{ $role }}" {{ old('role_applied_for') === $role ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role_applied_for')<p class="form-error-text">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-full py-4 mt-6 text-[16px] shadow-theme-md hover:shadow-theme-lg transition-all">
                        Submit Application &rarr;
                    </button>
                </form>

                <p class="auth-footer-text mt-8">
                    Already have an account? 
                    <a href="/login" class="auth-footer-link">Log in here</a>
                </p>
            </div>
        </div>
    </div>

</x-layout>