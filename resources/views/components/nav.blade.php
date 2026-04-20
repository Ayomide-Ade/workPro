<header class="kv-nav" id="kv-nav">
    <div class="kv-nav-inner">
        <a href="#hero" class="kv-nav-logo">
            <img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="h-8 w-auto mt-1">
        </a>

        {{-- Desktop Nav Links --}}
        <nav class="kv-nav-links">
            <a href="#about" class="kv-nav-link">About</a>
            <a href="#benefits" class="kv-nav-link">Benefits</a>
            <a href="#how-it-works" class="kv-nav-link">How it Works</a>
            <a href="#roles" class="kv-nav-link">Roles</a>
        </nav>

        {{-- Desktop CTA --}}
        @auth
            <div class="kv-nav-cta hidden md:flex">
                @if(auth()->user()->isAdmin())
                    <a href="/admin/dashboard" class="btn btn-ghost btn-sm">Dashboard</a>
                @else
                    <a href="/dashboard" class="btn btn-ghost btn-sm">Dashboard</a>
                @endif
            </div>
        @else
            <div class="kv-nav-cta hidden md:flex">
                <a href="/login" class="btn btn-success btn-sm">Log In</a>
                <a href="/register" class="btn btn-primary btn-sm">Apply Now →</a>
            </div>
        @endauth

        {{-- Hamburger Button (mobile only) --}}
        <button id="kv-menu-btn" class="md:hidden flex flex-col justify-center items-center w-10 h-10 rounded-lg transition-colors hover:bg-gray-100 gap-[5px]" aria-label="Toggle menu">
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 rounded transition-all duration-300"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 rounded transition-all duration-300"></span>
            <span class="hamburger-line block w-5 h-0.5 bg-gray-700 rounded transition-all duration-300"></span>
        </button>
    </div>

    {{-- Mobile Menu Drawer --}}
    <div id="kv-mobile-menu" class="md:hidden hidden border-t border-gray-100 bg-white/98 backdrop-blur-xl px-5 py-4 flex flex-col gap-1">
        <a href="#about" class="kv-nav-link kv-mobile-link">About</a>
        <a href="#benefits" class="kv-nav-link kv-mobile-link">Benefits</a>
        <a href="#how-it-works" class="kv-nav-link kv-mobile-link">How it Works</a>
        <a href="#roles" class="kv-nav-link kv-mobile-link">Roles</a>

        <div class="border-t border-gray-100 mt-3 pt-3 flex flex-col gap-2">
            @auth
                @if(auth()->user()->isAdmin())
                    <a href="/admin/dashboard" class="btn btn-ghost w-full justify-center">Dashboard</a>
                @else
                    <a href="/dashboard" class="btn btn-ghost w-full justify-center">Dashboard</a>
                @endif
            @else
                <a href="/login" class="btn btn-success w-full justify-center">Log In</a>
                <a href="/register" class="btn btn-primary w-full justify-center">Apply Now →</a>
            @endauth
        </div>
    </div>
</header>

<style>
    .kv-mobile-link {
        display: block;
        width: 100%;
    }
    #kv-menu-btn.open .hamburger-line:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }
    #kv-menu-btn.open .hamburger-line:nth-child(2) {
        opacity: 0;
        transform: scaleX(0);
    }
    #kv-menu-btn.open .hamburger-line:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }
</style>

<script>
    (function() {
        const nav = document.getElementById('kv-nav');
        const btn = document.getElementById('kv-menu-btn');
        const menu = document.getElementById('kv-mobile-menu');

        // Scroll effect
        if (nav) {
            window.addEventListener('scroll', () => {
                nav.classList.toggle('scrolled', window.scrollY > 20);
            }, { passive: true });
        }

        // Hamburger toggle
        if (btn && menu) {
            btn.addEventListener('click', () => {
                const isOpen = !menu.classList.contains('hidden');
                menu.classList.toggle('hidden', isOpen);
                btn.classList.toggle('open', !isOpen);
            });

            // Close menu when a mobile link is clicked
            menu.querySelectorAll('.kv-mobile-link').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    btn.classList.remove('open');
                });
            });
        }
    })();
</script>