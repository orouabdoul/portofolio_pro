@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <i class="fas fa-inbox mr-2 text-blue-500"></i>
                        Messages récents
                    </h3>
                    <a href="{{ route('admin.messages') }}" 
                       class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center">
                        Voir tout <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun message</h3>
                    <p class="text-gray-500">Les nouveaux contacts apparaîtront ici</p>
                </div>
            </div>
        </div>
    </div>
    <div class="space-y-6">
        <!-- Statistiques rapides (supprimées) -->
    </div>
</div>
@endsection
