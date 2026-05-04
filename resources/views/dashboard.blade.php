<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cynergy — Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0a0e1a;
            color: #e2eaf4;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background-color: #0d1120;
            border-right: 1px solid #1a2540;
            display: flex;
            flex-direction: column;
            padding: 0;
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
        }

        .sidebar-brand {
            padding: 28px 24px 20px;
            border-bottom: 1px solid #1a2540;
        }

        .sidebar-brand h1 {
            font-size: 18px;
            font-weight: 700;
            color: #00d4d4;
            letter-spacing: 0.5px;
        }

        .sidebar-brand p {
            font-size: 11px;
            color: #4a6080;
            margin-top: 3px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-nav {
            padding: 20px 0;
            flex: 1;
        }

        .nav-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #2a3a55;
            padding: 8px 24px 6px;
            font-weight: 600;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 24px;
            color: #6a8099;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .nav-item:hover {
            color: #00d4d4;
            background-color: #0f1830;
            border-left-color: #00d4d4;
        }

        .nav-item.active {
            color: #00d4d4;
            background-color: #0f1830;
            border-left-color: #00d4d4;
        }

        .nav-icon {
            width: 18px;
            height: 18px;
            opacity: 0.8;
        }

        .sidebar-footer {
            padding: 20px 24px;
            border-top: 1px solid #1a2540;
            font-size: 13px;
        }

        .sidebar-footer .user-name {
            color: #c8d6e5;
            font-weight: 600;
        }

        .sidebar-footer .user-role {
            color: #4a6080;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-top: 2px;
        }

        .logout-btn {
            margin-top: 12px;
            display: inline-block;
            font-size: 12px;
            color: #4a6080;
            text-decoration: none;
            transition: color 0.2s;
        }

        .logout-btn:hover { color: #ff4d6d; }

        /* MAIN CONTENT */
        .main {
            margin-left: 260px;
            flex: 1;
            padding: 36px 40px;
        }

        .page-header {
            margin-bottom: 32px;
        }

        .page-header h2 {
            font-size: 22px;
            font-weight: 700;
            color: #e8f0fe;
        }

        .page-header p {
            font-size: 13px;
            color: #4a6080;
            margin-top: 4px;
        }

        /* STAT CARDS */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 36px;
        }

        .stat-card {
            background-color: #0d1120;
            border: 1px solid #1a2540;
            border-radius: 10px;
            padding: 22px 24px;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 3px;
            height: 100%;
        }

        .stat-card.cyan::before  { background: #00d4d4; }
        .stat-card.green::before { background: #00c896; }
        .stat-card.red::before   { background: #ff4d6d; }
        .stat-card.yellow::before{ background: #ffb347; }

        .stat-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #4a6080;
            font-weight: 600;
        }

        .stat-value {
            font-size: 38px;
            font-weight: 800;
            margin: 8px 0 4px;
            line-height: 1;
        }

        .stat-card.cyan  .stat-value { color: #00d4d4; }
        .stat-card.green .stat-value { color: #00c896; }
        .stat-card.red   .stat-value { color: #ff4d6d; }
        .stat-card.yellow .stat-value { color: #ffb347; }

        .stat-sub {
            font-size: 11px;
            color: #5a7a99;
        }

        /* TABLES */
        .table-section {
            background-color: #0d1120;
            border: 1px solid #1a2540;
            border-radius: 10px;
            margin-bottom: 24px;
            overflow: hidden;
        }

        .table-header {
            padding: 18px 24px;
            border-bottom: 1px solid #1a2540;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .table-header h3 {
            font-size: 14px;
            font-weight: 700;
            color: #e8f0fe;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        .table-header span {
            font-size: 11px;
            color: #4a6080;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        thead th {
            padding: 12px 24px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #5a7a99;
            font-weight: 600;
            background-color: #080c18;
        }

        tbody tr {
            border-top: 1px solid #1a2540;
            transition: background 0.15s;
        }

        tbody tr:hover { background-color: #0f1830; }

        tbody td {
            padding: 13px 24px;
            color: #b0c4d8;
        }

        tbody td.bold {
            color: #c8d6e5;
            font-weight: 500;
        }

        .empty-row td {
            text-align: center;
            color: #2a3a55;
            padding: 28px;
            font-style: italic;
        }

        /* BADGES */
        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .badge-critical { background: #2d0a0f; color: #ff4d6d; border: 1px solid #ff4d6d33; }
        .badge-high     { background: #2d1a0a; color: #ffb347; border: 1px solid #ffb34733; }
        .badge-medium   { background: #2d2a0a; color: #ffe066; border: 1px solid #ffe06633; }
        .badge-low      { background: #0a2d1a; color: #00c896; border: 1px solid #00c89633; }

        .badge-open         { background: #2d0a0f; color: #ff4d6d; border: 1px solid #ff4d6d33; }
        .badge-investigating{ background: #0a1a2d; color: #00d4d4; border: 1px solid #00d4d433; }
        .badge-resolved     { background: #0a2d1a; color: #00c896; border: 1px solid #00c89633; }
        .badge-closed       { background: #1a1a2d; color: #6a8099; border: 1px solid #6a809933; }

        .badge-scheduled  { background: #2d2a0a; color: #ffe066; border: 1px solid #ffe06633; }
        .badge-in_progress{ background: #0a1a2d; color: #00d4d4; border: 1px solid #00d4d433; }
        .badge-completed  { background: #0a2d1a; color: #00c896; border: 1px solid #00c89633; }
        .badge-cancelled  { background: #1a1a2d; color: #6a8099; border: 1px solid #6a809933; }
    </style>
</head>
<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <h1>CYBER CYNERGY</h1>
            <p>Security Operations</p>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a href="/dashboard" class="nav-item active">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            <div class="nav-label" style="margin-top:12px">Operations</div>
            <a href="#" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Clients
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Incidents
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Audits
            </a>
            <a href="#" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Services
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-name">{{ auth()->user()->name }}</div>
            <div class="user-role">{{ auth()->user()->role }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Sign out</button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="main">
        <div class="page-header">
            <h2>Security Operations Center</h2>
            <p>Overview of all active threats, audits, and client operations</p>
        </div>

        {{-- STAT CARDS --}}
        <div class="stats-grid">
            <div class="stat-card cyan">
                <div class="stat-label">Total Clients</div>
                <div class="stat-value">{{ \App\Models\Client::count() }}</div>
                <div class="stat-sub">Registered organizations</div>
            </div>
            <div class="stat-card green">
                <div class="stat-label">Total Services</div>
                <div class="stat-value">{{ \App\Models\Service::count() }}</div>
                <div class="stat-sub">Active offerings</div>
            </div>
            <div class="stat-card red">
                <div class="stat-label">Open Incidents</div>
                <div class="stat-value">{{ \App\Models\Incident::where('status', 'open')->count() }}</div>
                <div class="stat-sub">Requiring attention</div>
            </div>
            <div class="stat-card yellow">
                <div class="stat-label">Scheduled Audits</div>
                <div class="stat-value">{{ \App\Models\Audit::where('status', 'scheduled')->count() }}</div>
                <div class="stat-sub">Upcoming audits</div>
            </div>
        </div>

        {{-- RECENT INCIDENTS --}}
        <div class="table-section">
            <div class="table-header">
                <h3>Recent Incidents</h3>
                <span>Last 5 records</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Client</th>
                        <th>Severity</th>
                        <th>Status</th>
                        <th>Reported</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Incident::with('client')->latest()->take(5)->get() as $incident)
                    <tr>
                        <td class="bold">{{ $incident->title }}</td>
                        <td>{{ $incident->client->company_name ?? 'N/A' }}</td>
                        <td><span class="badge badge-{{ $incident->severity }}">{{ $incident->severity }}</span></td>
                        <td><span class="badge badge-{{ $incident->status }}">{{ str_replace('_', ' ', $incident->status) }}</span></td>
                        <td>{{ $incident->created_at->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr class="empty-row"><td colspan="5">No incidents on record</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- RECENT AUDITS --}}
        <div class="table-section">
            <div class="table-header">
                <h3>Recent Audits</h3>
                <span>Last 5 records</span>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Assigned Analyst</th>
                        <th>Scheduled</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Audit::with(['client','assignee'])->latest()->take(5)->get() as $audit)
                    <tr>
                        <td class="bold">{{ $audit->client->company_name ?? 'N/A' }}</td>
                        <td>{{ $audit->assignee->name ?? 'Unassigned' }}</td>
                        <td>{{ \Carbon\Carbon::parse($audit->scheduled_at)->format('M d, Y') }}</td>
                        <td><span class="badge badge-{{ $audit->status }}">{{ str_replace('_', ' ', $audit->status) }}</span></td>
                    </tr>
                    @empty
                    <tr class="empty-row"><td colspan="4">No audits scheduled</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>

</body>
</html> 