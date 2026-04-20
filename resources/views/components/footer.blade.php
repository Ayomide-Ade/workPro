<footer class="bg-gray-900 pt-16 pb-8 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 pb-12 border-b border-white/10">
            <div class="md:col-span-1">
                {{-- SVG V-Mark Logo --}}
                <a href="#hero" class="kv-nav-logo">
                    <img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="h-8 w-auto mt-1">
                </a>
                <p class="text-sm text-white/40 leading-relaxed">
                    Securing and powering healthcare data infrastructure across Africa, one clinic at a time.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold tracking-widest uppercase text-white/50 mb-4">Portal</h4>
                <ul class="space-y-3">
                    <li><a href="/register" class="text-sm text-white/40 hover:text-white transition-colors">Apply Now</a></li>
                    <li><a href="/login" class="text-sm text-white/40 hover:text-white transition-colors">Login</a></li>
                    <li><a href="/#about" class="text-sm text-white/40 hover:text-white transition-colors">About</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold tracking-widest uppercase text-white/50 mb-4">Roles</h4>
                <ul class="space-y-3">
                    <li><span class="text-sm text-white/40 cursor-default">Engineering</span></li>
                    <li><span class="text-sm text-white/40 cursor-default">Data Science</span></li>
                    <li><span class="text-sm text-white/40 cursor-default">Product</span></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold tracking-widest uppercase text-white/50 mb-4">Company</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="https://www.karevault.com/" target="_blank" class="text-sm text-white/40 hover:text-white transition-colors">karevault.com</a>
                    </li>
                    <li>
                        <a href="#" class="text-sm text-white/40 hover:text-white transition-colors">Privacy Policy</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-white/30">&copy; {{ date('Y') }} KareVault. All rights reserved.</p>
            <p class="text-sm text-white/30">Built for the future of African healthcare.</p>
        </div>
    </div>
</footer>