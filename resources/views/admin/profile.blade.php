<x-layout title="{{ $user->name }} - KareVault Admin">

    <div class="admin-layout">
        
        <nav class="admin-nav">
            <a href="/"><img src="{{ asset('images/logo2.png') }}" alt="KareVault" class="auth-logo-img"></a>
            <div class="admin-nav-right">
                <span class="admin-pill">ADMIN</span>
                <form action="/logout" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="admin-logout-btn">Log Out</button>
                </form>
            </div>
        </nav>

        <div class="admin-body max-w-[860px]">

            @if(session('success'))
                @php
                    $msg = session('success');
                    $flashClass = 'flash-success'; // Defaults to green
                    
                    if (str_contains(strtolower($msg), 'rejected')) {
                        $flashClass = 'flash-error'; // Turns red
                    } elseif (str_contains(strtolower($msg), 'pending')) {
                        $flashClass = 'flash-warning'; // Turns orange/yellow
                    }
                @endphp
                
                <div class="{{ $flashClass }}">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        @if($flashClass === 'flash-error')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @elseif($flashClass === 'flash-warning')
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        @else
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        @endif
                    </svg>
                    <span>{{ $msg }}</span>
                </div>
            @endif

            <a href="/admin/dashboard" class="admin-back-link">
                <svg width="18" height="18" viewBox="0 0 16 16" fill="none"><path d="M10 3L5 8l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Back to all applicants
            </a>

            <div class="admin-prof-header">
                <div class="flex items-center gap-4">
                    <div class="admin-prof-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                    <div>
                        <div class="admin-prof-name">{{ $user->name }}</div>
                        <div class="admin-prof-email">{{ $user->email }}</div>
                    </div>
                </div>
                
                @if($application)
                    <span class="tbl-badge tbl-badge-{{ $application->status }} px-4 py-1.5 text-[13px]">
                        <span class="tbl-badge-dot"></span>
                        {{ ucfirst($application->status) }}
                    </span>
                @endif
            </div>

            <div class="admin-detail-card">
                <div class="admin-card-title">Applicant Details</div>
                <div class="admin-detail-grid">
                    @foreach([
                        ['Age',          $user->age ?? '-'],
                        ['School',       $user->school ?? '-'],
                        ['Department',   $user->department ?? '-'],
                        ['CGPA',         $user->cgpa ?? '-'],
                        ['State',        $user->state ?? '-'],
                        ['Role Applied', $application->role_applied_for ?? '-'],
                        ['Applied On',   $user->created_at->format('d M Y')],
                        ['Last Reviewed', $application?->reviewed_at?->format('d M Y') ?? 'Not yet reviewed'],
                    ] as $f)
                        <div>
                            <div class="admin-detail-label">{{ $f[0] }}</div>
                            <div class="admin-detail-val">{{ $f[1] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="admin-detail-card">
                <div class="admin-card-title">Update Application Status</div>
                <form action="/admin/interns/{{ $user->id }}/status" method="POST">
                    @csrf
                    
                    <div class="admin-radio-group">
                        @foreach(['pending', 'approved', 'rejected'] as $opt)
                            <div>
                                <input class="admin-radio-input" type="radio" name="status" id="s_{{ $opt }}" value="{{ $opt }}"
                                    {{ ($application?->status ?? 'pending') === $opt ? 'checked' : '' }} />
                                <label class="admin-radio-label" for="s_{{ $opt }}">
                                    <span class="w-2 h-2 rounded-full inline-block {{ $opt === 'approved' ? 'bg-[#12b76a]' : ($opt === 'rejected' ? 'bg-[#f04438]' : 'bg-[#d97706]') }}"></span>
                                    {{ ucfirst($opt) }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label class="form-label-light flex items-center gap-2" for="admin_notes">
                            Admin Notes <span class="font-normal text-gray-400 text-[13px]">(internal only)</span>
                        </label>
                        <textarea class="form-textarea-light" id="admin_notes" name="admin_notes" rows="4"
                            placeholder="Add any internal notes about this applicant here...">{{ old('admin_notes', $application?->admin_notes) }}</textarea>
                        @error('admin_notes')<p class="form-error-text">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary px-6 py-2.5">
                        Save Status Update &rarr;
                    </button>
                </form>
            </div>

        </div>
    </div>

</x-layout>