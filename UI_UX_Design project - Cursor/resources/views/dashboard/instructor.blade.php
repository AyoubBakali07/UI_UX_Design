@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Tableau de bord formateur</h1>

        <!-- Progression des apprenants -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Progression des apprenants</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Nom</th>
                                <th class="text-left py-2">Progression</th>
                                <th class="text-left py-2">Tutoriels terminés</th>
                                <th class="text-left py-2">Projets terminés</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($studentProgress as $student)
                            <tr class="border-b">
                                <td class="py-4">{{ $student->nom }} {{ $student->prenom }}</td>
                                <td class="py-4">
                                    <div class="w-48 bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{ $student->progress }}%"></div>
                                    </div>
                                </td>
                                <td class="py-4">{{ $student->completed_tutorials_count }}</td>
                                <td class="py-4">{{ $student->completed_projects_count }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Distribution de la progression -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Distribution de la progression</h3>
                    <div class="relative" style="height: 200px;">
                        <!-- Add a donut chart here using Alpine.js and Chart.js -->
                        <canvas id="progressionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Apprenants en difficulté -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Apprenants en difficulté</h3>
                    <div class="space-y-4">
                        @foreach($strugglingStudents as $student)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">{{ $student->nom }} {{ $student->prenom }}</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                {{ $student->progress }}%
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Causes des retards -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Causes des retards</h3>
                    <div class="space-y-2">
                        @foreach($delayReasons as $reason => $count)
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">{{ $reason }}</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                ({{ $count }})
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('progressionChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['En cours', 'Terminé', 'En retard', 'Non commencé'],
                datasets: [{
                    data: [30, 25, 15, 30],
                    backgroundColor: [
                        '#3B82F6', // blue
                        '#22C55E', // green
                        '#EF4444', // red
                        '#F59E0B', // yellow
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endpush
@endsection 