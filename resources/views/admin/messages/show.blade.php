@extends('admin.layout')

@section('title', 'Message de ' . $message->name)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <a href="{{ route('admin.messages') }}" class="btn btn-outline-primary mb-4">
                <i class="fas fa-arrow-left"></i> Retour à la liste
            </a>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width:60px;height:60px;font-size:2rem;">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="fw-bold mb-1">{{ $message->name }}</h2>
                            <div class="text-muted small"><i class="fas fa-envelope me-1"></i>{{ $message->email }}</div>
                            <div class="text-muted small"><i class="fas fa-clock me-1"></i>{{ $message->created_at->format('d/m/Y à H:i') }}</div>
                        </div>
                        <div class="ms-auto text-end">
                            <span class="badge {{ $message->is_read ? 'bg-success' : 'bg-warning text-dark' }} me-2">
                                <i class="fas {{ $message->is_read ? 'fa-check-circle' : 'fa-envelope' }} me-1"></i>{{ $message->is_read ? 'Lu' : 'Non lu' }}
                            </span>
                            @if($message->replies && $message->replies->count() > 0)
                                <span class="badge bg-info text-dark">
                                    <i class="fas fa-reply me-1"></i>{{ $message->replies->count() }} réponse(s)
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-primary"><i class="fas fa-tag me-1"></i>{{ $message->subject }}</span>
                    </div>
                    <div class="mb-4">
                        <div class="bg-light rounded p-4 border">
                            <p class="mb-0 text-dark" style="white-space:pre-line;font-size:1.1rem;">{{ $message->message }}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mb-4">
                        @if(!$message->is_read)
                            <form action="{{ route('admin.messages.read', $message->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-check me-1"></i>Marquer comme lu
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                                <i class="fas fa-trash me-1"></i>Supprimer
                            </button>
                        </form>
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? '' }}" class="btn btn-info text-white">
                            <i class="fas fa-reply me-1"></i>Répondre
                        </a>
                    </div>
                </div>
            </div>
            @php
                $replies = \App\Models\Reply::where('contact_id', $message->id)->orderByDesc('created_at')->get();
            @endphp
            @if($replies->count() > 0)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-info text-white fw-bold">
                        <i class="fas fa-reply me-2"></i>Réponses envoyées ({{ $replies->count() }})
                    </div>
                    <div class="card-body">
                        @foreach($replies as $reply)
                            <div class="mb-4 p-3 border rounded bg-light">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div>
                                        <span class="fw-bold">{{ $reply->subject }}</span>
                                        <span class="text-muted small ms-2"><i class="fas fa-user me-1"></i>{{ $reply->admin_name }} ({{ $reply->admin_email }})</span>
                                    </div>
                                    <span class="badge {{ $reply->sent_successfully ? 'bg-success' : 'bg-danger' }}">
                                        <i class="fas {{ $reply->sent_successfully ? 'fa-check' : 'fa-times' }} me-1"></i>{{ $reply->sent_successfully ? 'Envoyé' : 'Échec' }}
                                    </span>
                                </div>
                                <div class="text-muted small mb-2"><i class="fas fa-clock me-1"></i>{{ $reply->created_at->format('d/m/Y à H:i') }}</div>
                                <div class="bg-white rounded p-2 border">
                                    <p class="mb-0">{{ $reply->message }}</p>
                                </div>
                                @if($reply->error_message)
                                    <div class="mt-2 alert alert-danger p-2">
                                        <i class="fas fa-exclamation-triangle me-1"></i>{{ $reply->error_message }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-reply me-2"></i>Répondre au message
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success mb-3">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mb-3">
                            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <strong>Erreurs de validation :</strong>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply_subject" class="form-label fw-semibold">
                                <i class="fas fa-tag me-2 text-primary"></i>Sujet de la réponse
                            </label>
                            <input type="text" id="reply_subject" name="reply_subject" value="{{ old('reply_subject', 'Re: ' . $message->subject) }}" class="form-control form-control-lg" required>
                        </div>
                        <div class="mb-3">
                            <label for="reply_message" class="form-label fw-semibold">
                                <i class="fas fa-edit me-2 text-primary"></i>Votre réponse
                            </label>
                            <textarea id="reply_message" name="reply_message" rows="7" class="form-control form-control-lg" placeholder="Tapez votre réponse professionnelle ici..." required>{{ old('reply_message') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted"><i class="fas fa-info-circle me-2"></i>La réponse sera automatiquement envoyée à <strong>{{ $message->email }}</strong></span>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer la réponse
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="mt-3">
                        <h5 class="fw-bold mb-2">Option 2 : Email externe</h5>
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}&body={{ urlencode('Bonjour ' . $message->name . ',\n\nMerci pour votre message.\n\n[Votre réponse ici]\n\nCordialement,\nAMADOU ISSIAKA Abdoulaye') }}"
                           class="btn btn-outline-info">
                            <i class="fas fa-external-link-alt me-2"></i>Ouvrir dans votre client email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
