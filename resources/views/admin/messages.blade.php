@extends('admin.layout')

@section('title', 'Messages de Contact')

@section('content')
<div id="notifications-area" class="mb-3">
    <!-- Notifications dynamiques -->
    <div class="alert alert-info d-flex align-items-center" role="alert" style="display:none;" id="realtime-notif">
        <i class="fas fa-bell fa-lg me-2"></i>
        <span id="notif-message">Nouveau message reçu !</span>
    </div>
</div>
<div class="container-fluid py-4">
    <!-- Statistiques -->
    @if($messages->count() > 0)
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow border-0">
                    <div class="card-header bg-gradient text-white fw-bold" style="background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%);">
                        <i class="fas fa-chart-pie me-2"></i> Statistiques des messages
                    </div>
                    <div class="card-body">
                        <canvas id="messagesChart" height="120"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow border-0">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-chart-pie fa-3x text-muted mb-3"></i>
                        <h5 class="mb-2">Aucune statistique disponible</h5>
                        <p class="text-muted">Aucun message n'a encore été reçu. Les statistiques apparaîtront ici dès réception de nouveaux messages.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0 bg-white">
                <div class="card-body">
                    <div class="mb-2"><i class="fas fa-envelope fa-2x text-primary"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $messages->total() ?? 0 }}</div>
                    <div class="text-muted">Messages</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0 bg-white">
                <div class="card-body">
                    <div class="mb-2"><i class="fas fa-check-circle fa-2x text-success"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $messages->where('is_read', true)->count() ?? 0 }}</div>
                    <div class="text-muted">Lus</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0 bg-white">
                <div class="card-body">
                    <div class="mb-2"><i class="fas fa-envelope-open fa-2x text-warning"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $messages->where('is_read', false)->count() ?? 0 }}</div>
                    <div class="text-muted">Non lus</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0 bg-white">
                <div class="card-body">
                    <div class="mb-2"><i class="fas fa-user fa-2x text-info"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $contacts->count() ?? 0 }}</div>
                    <div class="text-muted">Contacts</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table des messages -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-envelope me-2"></i> Liste des Messages
            <a href="{{ route('admin.messages.export', ['format' => 'excel']) }}" class="btn btn-success btn-sm float-end me-2"><i class="fas fa-file-excel me-1"></i> Export Excel</a>
            <a href="{{ route('admin.messages.export', ['format' => 'pdf']) }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-file-pdf me-1"></i> Export PDF</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Contact</th>
                        <th>Sujet</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">A</div>
                                <div>
                                    <div class="fw-bold">Alice Dupont</div>
                                    <div class="text-muted small">alice@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>Demande de devis</td>
                        <td>15/09/2025 10:32</td>
                        <td><span class="badge bg-success">Lu</span></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-primary btn-sm" title="Voir"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></a>
                            <a href="mailto:alice@email.com?subject=Re: Demande de devis" class="btn btn-outline-info btn-sm" title="Répondre"><i class="fas fa-reply"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-warning text-white fw-bold d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">B</div>
                                <div>
                                    <div class="fw-bold">Benoit Martin</div>
                                    <div class="text-muted small">benoit@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>Question technique</td>
                        <td>14/09/2025 16:20</td>
                        <td><span class="badge bg-warning text-dark">Non lu</span></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-primary btn-sm" title="Voir"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></a>
                            <a href="mailto:benoit@email.com?subject=Re: Question technique" class="btn btn-outline-info btn-sm" title="Répondre"><i class="fas fa-reply"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-info text-white fw-bold d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">C</div>
                                <div>
                                    <div class="fw-bold">Carla Moreau</div>
                                    <div class="text-muted small">carla@email.com</div>
                                </div>
                            </div>
                        </td>
                        <td>Demande de support</td>
                        <td>13/09/2025 09:10</td>
                        <td><span class="badge bg-success">Lu</span></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-primary btn-sm" title="Voir"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-outline-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></a>
                            <a href="mailto:carla@email.com?subject=Re: Demande de support" class="btn btn-outline-info btn-sm" title="Répondre"><i class="fas fa-reply"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><span class="page-link">Précédent</span></li>
            <li class="page-item active"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
        </ul>
    </nav>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js - Répartition des messages lus/non lus
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('messagesChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Lus', 'Non lus'],
                datasets: [{
                    data: [{{ $messages->where('is_read', true)->count() ?? 0 }}, {{ $messages->where('is_read', false)->count() ?? 0 }}],
                    backgroundColor: ['#10b981', '#f59e42'],
                    borderWidth: 2
                }]
            },
            options: {
                plugins: {
                    legend: { display: true, position: 'bottom' }
                }
            }
        });
    });
</script>
<script>
    // Simulation notification temps réel
    setTimeout(function() {
        const notif = document.getElementById('realtime-notif');
        notif.style.display = 'flex';
        document.getElementById('notif-message').textContent = 'Nouveau message reçu !';
        setTimeout(function() {
            notif.style.display = 'none';
        }, 5000);
    }, 3000);
</script>
@endpush