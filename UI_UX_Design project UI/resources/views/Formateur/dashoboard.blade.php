@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-8">Tableau de bord du formateur</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Progression des apprenants -->
        <div class="md:col-span-2 bg-white rounded-lg shadow p-6">
            <h3 class="text-xl font-semibold mb-4">Progression des apprenants</h3>
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="text-left border-b">
                        <th class="py-2">Nom</th>
                        <th class="py-2">Progression</th>
                        <th class="py-2">Tutoriels terminés</th>
                        <th class="py-2">Autoformations terminées</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($apprenants as $apprenant)
                    <tr class="border-b">
                        <td class="py-2">{{ $apprenant['name'] }}</td>
                        <td class="py-2">
                            <div class="w-32 bg-gray-200 rounded-full h-3">
                                <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $apprenant['progress'] }}%"></div>
                            </div>
                            <span class="text-xs ml-2">{{ $apprenant['progress'] }}%</span>
                        </td>
                        <td class="py-2">{{ $apprenant['tutorials'] }}</td>
                        <td class="py-2">{{ $apprenant['projects'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="mt-6 font-semibold">Apprenants en difficulté</h4>
            <ul class="list-disc list-inside text-red-600">
                @foreach($difficultes as $d)
                <li>{{ $d }}</li>
                @endforeach
            </ul>
        </div>
        <!-- Distribution & Retards -->
        <div class="bg-white rounded-lg shadow p-6 flex flex-col gap-6">
            <div>
                <h3 class="text-xl font-semibold mb-2">Distribution de la progression</h3>
                <canvas id="progressChart" width="200" height="200"></canvas>
                <ul class="text-sm mt-4">
                    <li><span class="font-bold text-blue-600">Plus de 75%:</span> {{ $distribution['over_75'] }}</li>
                    <li><span class="font-bold text-blue-400">Entre 50 % et 75 %:</span> {{ $distribution['between_50_75'] }}</li>
                    <li><span class="font-bold text-gray-500">Moins de 50 %:</span> {{ $distribution['under_50'] }}</li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Retards</h4>
                <ul class="list-disc list-inside text-gray-700">
                    @foreach($retards as $r)
                    <li>{{ $r }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- <div class="mt-8 bg-white rounded-lg shadow p-6">
        <h4 class="font-semibold mb-2">Rétroaction</h4>
        <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Saisissez votre message">
    </div> -->
</div>
@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('progressChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Plus de 75%', 'Entre 50 % et 75 %', 'Moins de 50 %'],
            datasets: [{
                data: [
                    {{ $distribution['over_75'] }},
                    {{ $distribution['between_50_75'] }},
                    {{ $distribution['under_50'] }}
                ],
               
                backgroundColor: [
                    '#2563eb',
                    '#60a5fa',
                    '#9ca3af'
                ],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        }
    });
</script>
@endsection
