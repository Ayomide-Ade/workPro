<x-layout title="My Application - KareVault">

    <div class="dash-layout">
        <nav class="dash-nav">
            <a href="/"><img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="auth-logo-img"></a>
            
            <div class="dash-user-wrap">
                <span class="dash-username">{{ auth()->user()->name }}</span>
                <div class="dash-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                
                <form action="/logout" method="POST" class="ml-2">
                    @csrf
                    <button type="submit" class="btn btn-ghost px-4 py-2 text-[13px]">Log Out</button>
                </form>
            </div>
        </nav>

        <div class="dash-body">

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <h1 class="dash-title">Hello, {{ explode(' ', auth()->user()->name)[0] }} 👋</h1>
            <p class="dash-subtitle">Here is the current status of your KareVault internship application.</p>

            @if($application)
                @php $status = $application->status; @endphp

                {{-- Status Hero Card --}}
                <div class="dash-status-card">
                    <div class="dash-status-glow"></div>
                    <div class="relative z-10 flex-1">
                        <div class="dash-status-label">Application Status</div>
                        
                        <div class="dash-badge dash-badge-{{ $status }}">
                            <span class="w-2 h-2 rounded-full bg-current opacity-80"></span>
                            {{ ucfirst($status) }}
                        </div>
                        
                        <div class="dash-status-text">
                            Role applied for: <strong class="text-white/90 font-medium">{{ $application->role_applied_for }}</strong>
                        </div>
                        
                        @if($application->reviewed_at)
                            <div class="dash-status-text mt-1">
                                Last reviewed: {{ $application->reviewed_at->format('d M Y') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="dash-icon-wrap dash-icon-{{ $status }}">
                        @if($status === 'approved')
                            <svg width="32" height="32" viewBox="0 0 30 30" fill="none"><path d="M6 15l6 6 12-12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        @elseif($status === 'rejected')
                            <svg width="32" height="32" viewBox="0 0 30 30" fill="none"><path d="M9 9l12 12M21 9L9 21" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>
                        @else
                            <svg width="32" height="32" viewBox="0 0 30 30" fill="none"><circle cx="15" cy="15" r="10" stroke="currentColor" stroke-width="2"/><path d="M15 10v6M15 19v1" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/></svg>
                        @endif
                    </div>
                </div>

                {{-- Timeline --}}
                <div class="dash-card">
                    <div class="dash-card-title">Application Progress</div>
                    <div class="dash-timeline">
                        
                        <div class="dash-timeline-step">
                            <div class="dash-timeline-line bg-brand-500"></div>
                            <div class="dash-timeline-dot dash-dot-done">✓</div>
                            <div class="dash-timeline-label active">Submitted</div>
                        </div>

                        <div class="dash-timeline-step">
                            <div class="dash-timeline-line {{ in_array($status,['approved','rejected']) ? 'bg-brand-500' : 'bg-gray-200' }}"></div>
                            <div class="dash-timeline-dot {{ $status === 'pending' ? 'dash-dot-active' : (in_array($status,['approved','rejected']) ? 'dash-dot-done' : 'dash-dot-idle') }}">
                                {{ in_array($status,['approved','rejected']) ? '✓' : '2' }}
                            </div>
                            <div class="dash-timeline-label {{ $status === 'pending' ? 'active' : '' }}">Under Review</div>
                        </div>

                        <div class="dash-timeline-step">
                            <div class="dash-timeline-dot {{ $status === 'approved' ? 'dash-dot-approved' : ($status === 'rejected' ? 'dash-dot-rejected' : 'dash-dot-idle') }}">
                                {{ $status === 'approved' ? '✓' : ($status === 'rejected' ? '✗' : '3') }}
                            </div>
                            <div class="dash-timeline-label {{ in_array($status,['approved','rejected']) ? 'active' : '' }}">
                                {{ $status === 'approved' ? 'Approved' : ($status === 'rejected' ? 'Not Selected' : 'Decision') }}
                            </div>
                        </div>

                    </div>
                </div>

            @else
                <div class="dash-card">
                    <p class="text-gray-500 text-[15px]">No application found. Please contact support if you believe this is an error.</p>
                </div>
            @endif

            {{-- Profile Summary --}}
            <div class="dash-card !delay-200">
                <div class="dash-card-title">Submitted Profile</div>
                <div class="dash-profile-grid">
                    @foreach([
                        ['Full Name',   $user->name],
                        ['Email',       $user->email],
                        ['Age',         $user->age ?? '—'],
                        ['School',      $user->school ?? '—'],
                        ['Department',  $user->department ?? '—'],
                        ['CGPA',        $user->cgpa ?? '—'],
                        ['State',       $user->state ?? '—'],
                        ['Role Applied',$application->role_applied_for ?? '—'],
                        ['Applied On',  $user->created_at->format('d M Y')],
                    ] as $f)
                        <div>
                            <div class="dash-profile-label">{{ $f[0] }}</div>
                            <div class="dash-profile-value">{{ $f[1] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</x-layout>