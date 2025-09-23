@extends('admin.layout')
@section('title', 'Analyse')
@section('content')
<h2 class="mb-4 text-primary fw-bold">Tableau de bord - Analyse</h2>
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg,#6366f1 0%,#a78bfa 100%);">
            <div class="card-body text-center">
                <h5 class="card-title text-white">Contacts</h5>
                <p class="display-6 fw-bold text-white">{{ $contactsCount }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-4" style="background: linear-gradient(135deg,#10b981 0%,#34d399 100%);">
            <div class="card-body text-center">
                <h5 class="card-title text-white">Projets</h5>
                <p class="display-6 fw-bold text-white">{{ $projectsCount }}</p>
            </div>
        </div>
    </div>

</div>
<div class="card shadow-lg border-0 rounded-4 mb-4">
    <div class="card-body">
        <h5 class="card-title text-primary mb-3"><i class="fas fa-chart-line me-2"></i>Évolution récente</h5>
        <canvas id="analyticsChart" height="120"></canvas>
        <script>
            window.analyticsLabels = @json($labels);
            window.analyticsContacts = @json($contactsEvolution);
            window.analyticsProjects = @json($projectsEvolution);
        </script>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('analyticsChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.analyticsLabels,
                datasets: [
                    {
                        label: 'Contacts',
                        data: window.analyticsContacts,
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99,102,241,0.1)',
                        tension: 0.4,
                        fill: true
                    },
                    {
                        label: 'Projets',
                        data: window.analyticsProjects,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16,185,129,0.1)',
                        tension: 0.4,
                        fill: true
                    },
                ]
            },
            options: {
                plugins: {
                    legend: { display: true, position: 'bottom' }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    });
</script>
@endpush
@endsection
