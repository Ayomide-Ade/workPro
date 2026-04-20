<x-layout title="Admin - KareVault">

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

        <div class="admin-body">

            @if(session('success'))
                <div class="flash-success">{{ session('success') }}</div>
            @endif

            <h1 class="admin-title">Internship Applications</h1>
            <p class="admin-subtitle">Review and manage all intern applications.</p>

            <div class="admin-stat-grid">
                <div class="admin-stat-card">
                    <div class="admin-stat-label">Total Applicants</div>
                    <div class="admin-stat-val">{{ $counts['all'] }}</div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-label">Pending</div>
                    <div class="admin-stat-val text-[#d97706]">{{ $counts['pending'] }}</div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-label">Approved</div>
                    <div class="admin-stat-val text-[#12b76a]">{{ $counts['approved'] }}</div>
                </div>
                <div class="admin-stat-card">
                    <div class="admin-stat-label">Rejected</div>
                    <div class="admin-stat-val text-[#f04438]">{{ $counts['rejected'] }}</div>
                </div>
            </div>

            <div class="admin-tabs">
                <a href="/admin/dashboard" class="admin-tab {{ $filter === 'all' ? 'active' : '' }}">
                    All <span class="admin-tc">{{ $counts['all'] }}</span>
                </a>
                <a href="/admin/dashboard?status=pending" class="admin-tab {{ $filter === 'pending' ? 'active' : '' }}">
                    Pending <span class="admin-tc">{{ $counts['pending'] }}</span>
                </a>
                <a href="/admin/dashboard?status=approved" class="admin-tab {{ $filter === 'approved' ? 'active' : '' }}">
                    Approved <span class="admin-tc">{{ $counts['approved'] }}</span>
                </a>
                <a href="/admin/dashboard?status=rejected" class="admin-tab {{ $filter === 'rejected' ? 'active' : '' }}">
                    Rejected <span class="admin-tc">{{ $counts['rejected'] }}</span>
                </a>
            </div>

            <div class="admin-table-wrap">
                @if($interns->count())
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th class="admin-th">Applicant</th>
                                <th class="admin-th">Role</th>
                                <th class="admin-th">School</th>
                                <th class="admin-th">State</th>
                                <th class="admin-th">Status</th>
                                <th class="admin-th">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($interns as $intern)
                                <tr class="admin-tr">
                                    <td class="admin-td">
                                        <div class="admin-td-name">{{ $intern->name }}</div>
                                        <div class="admin-td-meta">{{ $intern->email }}</div>
                                    </td>
                                    <td class="admin-td">{{ $intern->application->role_applied_for ?? '—' }}</td>
                                    <td class="admin-td">{{ $intern->school ?? '—' }}</td>
                                    <td class="admin-td">{{ $intern->state ?? '—' }}</td>
                                    <td class="admin-td">
                                        @php $s = $intern->application?->status ?? 'pending'; @endphp
                                        <span class="tbl-badge tbl-badge-{{ $s }}">
                                            <span class="tbl-badge-dot"></span>
                                            {{ ucfirst($s) }}
                                        </span>
                                    </td>
                                    <td class="admin-td">
                                        <a href="/admin/interns/{{ $intern->id }}" class="btn btn-outline px-4 py-2 text-[13px]">View &rarr;</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="admin-table-pg">
                        {{ $interns->links() }}
                    </div>
                @else
                    <div class="admin-table-empty">
                        No Applicants found.
                    </div>
                @endif
            </div>

        </div>
    </div>

</x-layout>