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
                    @forelse($messages as $message)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center me-3" style="width:40px;height:40px;">
                                    {{ strtoupper(substr($message->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $message->name }}</div>
                                    <div class="text-muted small">{{ $message->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $message->subject ?? '---' }}</td>
                        <td>{{ $message->created_at ? $message->created_at->format('d/m/Y H:i') : '---' }}</td>
                        <td>
                            @if(isset($message->is_read) && $message->is_read)
                                <span class="badge bg-success">Lu</span>
                            @else
                                <span class="badge bg-warning text-dark">Non lu</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-outline-primary btn-sm mark-read-btn" data-id="{{ $message->id }}" title="Voir"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Supprimer"><i class="fas fa-trash"></i></button>
                            </form>
                            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? '' }}" class="btn btn-outline-info btn-sm" title="Répondre"><i class="fas fa-reply"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Aucun message trouvé.</td>
                    </tr>
                    @endforelse
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

    // AJAX pour marquer comme lu
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.mark-read-btn').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var id = this.getAttribute('data-id');
                var row = this.closest('tr');
                var href = this.getAttribute('href');
                // Mise à jour immédiate du badge
                var badge = row.querySelector('span.badge');
                badge.classList.remove('bg-warning', 'text-dark');
                badge.classList.add('bg-success');
                badge.textContent = 'Lu';
                // AJAX pour marquer comme lu
                fetch('/admin/messages/' + id + '/mark-read', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .finally(() => {
                    window.location.href = href;
                });
            });
        });
    });
</script>
@endpush