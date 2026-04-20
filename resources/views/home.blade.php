<x-layout title="KareVault - Internship Program">
    <x-nav />
    
    {{-- HERO SECTION --}}
    <section class="section-hero pt-32" id="hero">
        <div class="hero-glow-blue"></div>
        <div class="hero-glow-green"></div>

        <div class="container-main hero-content">
            <div class="animate-fade-in-up">

                <h1 class="hero-title">
                    Launch Your Career<br>
                    in <span class="text-brand-500">Digital Health</span><br>
                    with <span class="text-brand-green">KareVault</span>
                </h1>

                <p class="hero-subtitle">
                    Join Nigeria's leading health-tech company and gain real experience building the AI and Telehealth systems reshaping patient care across Africa.
                </p>

                <div class="hero-actions">
                    <a href="/register" class="btn btn-primary btn-xl">
                        Apply for Internship
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" class="ml-1">
                            <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <a href="#about" class="btn btn-xl btn-ghost">Learn More</a>
                </div>
            </div>

            <div class="hero-image-wrap animate-fade-in-up delay-100">
                <img src="{{ asset('images/doctor-karevault intern2.png') }}" alt="KareVault intern" class="hero-image" />
            
                <div class="floating-badge top-badge animate-float">
                    <div class="badge-icon-box">
                        <svg class="w-4 h-4 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <span class="text-[13px] font-bold text-gray-900">Remote Patient Monitoring</span>
                </div>
            
                <div class="floating-badge bottom-badge animate-float delay-300">
                    <div class="badge-icon-box">
                        <svg class="w-4 h-4 text-brand-green" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <span class="text-[13px] font-bold text-gray-900">AI-driven EHR</span>
                </div>
            </div>
        </div>

        <div class="container-main stats-container animate-fade-in-up delay-300">
            <div class="stat-item">
                <div class="stat-value">50+</div>
                <div class="stat-label">Interns placed since 2022</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">8</div>
                <div class="stat-label">Available roles this cycle</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">3-6 mo</div>
                <div class="stat-label">Programme duration</div>
            </div>
            <div class="stat-item">
                <div class="stat-value-alt">100%</div>
                <div class="stat-label">Remote-friendly</div>
            </div>
        </div>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="section-blue" id="about">
        <div class="container-main reveal">
            <div class="about-grid">
                <div>
                    <p class="text-eyebrow">About KareVault</p>
                    <h2 class="text-heading">Where AI Meets African Healthcare</h2>
                    <p class="text-desc max-w-[560px]">
                        KareVault is a Nigerian digital health and insurtech company building AI-powered EHR systems, Telehealth platforms, and Remote Patient Monitoring tools.
                    </p>

                    <div class="feature-grid">
                        <div class="card-white">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round">
                                    <path d="M10 2L12.5 7h5.5l-4.5 3.5 1.7 5.5L10 14l-5.2 4 1.7-5.5L2 9h5.5L10 2z" />
                                </svg>
                            </div>
                            <h3 class="card-title">Real Project Work</h3>
                            <p class="card-desc">Contribute to live healthcare software used by real clinics.</p>
                        </div>
                        <div class="card-white">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round">
                                    <circle cx="10" cy="6" r="3.5" />
                                    <path d="M3 17c0-3.3 3.1-6 7-6s7 2.7 7 6" />
                                </svg>
                            </div>
                            <h3 class="card-title">Expert Mentorship</h3>
                            <p class="card-desc">Work directly with engineers and product leads.</p>
                        </div>
                        <div class="card-white">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round">
                                    <rect x="3" y="4" width="14" height="12" rx="2" />
                                    <path d="M7 9h6M7 12h4" />
                                </svg>
                            </div>
                            <h3 class="card-title">Certificate & Ref</h3>
                            <p class="card-desc">Official certificate and professional reference letter.</p>
                        </div>
                        <div class="card-white">
                            <div class="card-icon">
                                <svg width="18" height="18" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M10 3v14M3 10h14" />
                                </svg>
                            </div>
                            <h3 class="card-title">Stipend Available</h3>
                            <p class="card-desc">Monthly performance-based stipends for top interns.</p>
                        </div>
                    </div>
                </div>

                <div class="mission-card">
                    <div class="mission-glow"></div>
                    <div class="relative z-10">
                        <p class="mission-eyebrow">Our Mission</p>
                        <h3 class="mission-title">Building the Digital Backbone of African Healthcare</h3>
                        <p class="mission-desc">
                            We believe quality healthcare begins with quality data. KareVault secures, structures, and surfaces patient information so clinicians can focus on what matters.
                        </p>

                        <div class="mission-stats-grid">
                            @foreach ([['200+', 'Healthcare providers'], ['5+', 'States in Nigeria'], ['2019', 'Year founded'], ['AI-first', 'Product philosophy']] as $stat)
                                <div class="mission-stat-box">
                                    <div class="mission-stat-val">{{ $stat[0] }}</div>
                                    <div class="mission-stat-label">{{ $stat[1] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- BENEFITS SECTION --}}
    <section class="section-white" id="benefits">
        <div class="container-main">
            <div class="text-center mb-12 reveal">
                <p class="text-eyebrow">Why Intern With Us</p>
                <h2 class="text-heading">Built for Nigerian Tech & Health Students</h2>
                <p class="text-desc max-w-2xl mx-auto">Everything in this programme is designed around where you are in your career and what you need to break into digital health.</p>
            </div>

            <div class="benefits-grid">
                @foreach ([
                    ['01', 'Industry-Grade Experience', 'Work on production systems, EHR, Telehealth APIs, AI pipelines, not toy projects. Your GitHub will show real impact from day one.'],
                    ['02', '1-on-1 Mentorship', 'Every intern is paired with a senior team member for weekly sessions, code reviews, and career guidance specific to the Nigerian tech ecosystem.'],
                    ['03', 'Fully Remote-Friendly', 'Work from Lagos, Abuja, Ibadan or anywhere in Nigeria. We provide the tools, you provide the talent. No relocation required.'],
                    ['04', 'Stipend & Certification', 'Performance-based monthly stipend for qualifying interns, plus an official KareVault certificate recognised across the industry.'],
                    ['05', 'Health-Tech Network', 'Connect with clinicians, engineers, investors and founders at the intersection of healthcare and technology across Africa.'],
                    ['06', 'Pathway to Full-Time', 'Our best interns get offers. We actively promote from within, this programme is our primary pipeline for junior hires.']
                ] as $b)
                    <div class="benefit-card reveal">
                        <div class="benefit-accent"></div>
                        <div class="benefit-num">{{ $b[0] }}</div>
                        <h3 class="benefit-title">{{ $b[1] }}</h3>
                        <p class="benefit-desc">{{ $b[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS SECTION --}}
    <section class="section-blue" id="how-it-works">
        <div class="container-main">
            <div class="text-center mb-16 reveal">
                <p class="text-eyebrow">Application Process</p>
                <h2 class="text-heading">How It Works</h2>
                <p class="text-desc max-w-2xl mx-auto">Our process is transparent. You'll always know exactly where your application stands.</p>
            </div>

            <div class="steps-grid reveal">
                <div class="steps-line"></div>

                @foreach ([
                    ['1', 'Submit Application', 'Complete your profile with academic background, skills, and preferred role.'],
                    ['2', 'Application Review', 'Our team reviews your submission and responds within 5 working days.'],
                    ['3', 'Interview Stage', 'Shortlisted candidates are invited to a virtual interview with the team lead.'],
                    ['4', 'Offer Granted', 'Successful candidates receive a formal offer and onboarding details.']
                ] as $loop => $s)
                    <div class="step-item">
                        <div class="step-circle {{ $loop->last ? 'step-circle-final' : '' }}">
                            {{ $s[0] }}
                        </div>
                        <h3 class="step-title">{{ $s[1] }}</h3>
                        <p class="step-desc">{{ $s[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ROLES SECTION --}}
    <section class="section-white" id="roles">
        <div class="container-main">
            <div class="text-center mb-12 reveal">
                <p class="text-eyebrow">Open Positions</p>
                <h2 class="text-heading">Available Roles This Cycle</h2>
                <p class="text-desc max-w-2xl mx-auto">Open to undergraduates and recent graduates across Computer Science, Health Informatics and related disciplines.</p>
            </div>

            <div class="roles-grid">
                @foreach (['Frontend Development', 'Backend Development', 'UI/UX Design', 'Data Science & AI', 'DevOps & Cloud', 'Product Management', 'QA & Testing', 'Technical Writing'] as $r)
                    <div class="role-card reveal">
                        <div class="role-dot"></div>
                        <span class="role-title">{{ $r }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section class="section-gray">
        <div class="container-main reveal">
            <div class="cta-card">
                <div class="cta-glow"></div>

                <div class="cta-content">
                    <p class="text-eyebrow mb-3">Start Your Journey</p>
                    <h2 class="text-heading text-white mb-3.5">Ready to Build Something That Matters?</h2>
                    <p class="text-desc text-white/80">Applications for the 2025 internship cohort are open now. Spots are limited.</p>
                </div>

                <div class="cta-actions">
                    <a href="/register" class="btn btn-primary w-full btn-xl">Apply Now &rarr;</a>
                    <a href="/login" class="btn btn-success w-full btn-xl backdrop-blur-sm">Existing Applicant? Login</a>
                    <p class="text-[12px] text-black-500 text-center w-full mt-1">No application fee. Open to all Nigerian students.</p>
                </div>
            </div>
        </div>
    </section>

    <x-footer />

    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) e.target.classList.add('visible');
            });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</x-layout>