<header class="kv-nav" id="kv-nav">
    <div class="kv-nav-inner">
        <a href="#hero" class="kv-nav-logo">
            <img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="h-8 w-auto mt-1">
        </a>

        <nav class="kv-nav-links">
            <a href="#about" class="kv-nav-link">About</a>
            <a href="#benefits" class="kv-nav-link">Benefits</a>
            <a href="#how-it-works" class="kv-nav-link">How it Works</a>
            <a href="#roles" class="kv-nav-link">Roles</a>
        </nav>
        @auth
    <div class="kv-nav-cta">
        @if(auth()->user()->isAdmin())
            <a href="/admin/dashboard" class="btn btn-ghost btn-sm">Dashboard</a>
        @else
            <a href="/dashboard" class="btn btn-ghost btn-sm">Dashboard</a>
        @endif
    </div>
@else
    <div class="kv-nav-cta">
        <a href="/login"    class="btn btn-success btn-sm">Log In</a>
        <a href="/register" class="btn btn-primary btn-sm">Apply Now →</a>
    </div>
@endauth
    </div>
</header>

<script>
    (function() {
        const nav = document.getElementById('kv-nav');
        if (!nav) return;
        window.addEventListener('scroll', () => {
            nav.classList.toggle('scrolled', window.scrollY > 20);
        }, { passive: true });
    })();
</script>