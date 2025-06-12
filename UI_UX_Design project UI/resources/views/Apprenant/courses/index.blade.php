@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <div class="relative mb-6">
            <input id="searchInput" type="text" placeholder="Rechercher une formation..." class="w-full px-4 pl-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="absolute left-3 pr-2 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </div>
        <h2 class="text-xl font-semibold mb-2">Toutes les Formations</h2>
        <div class="overflow-x-auto ">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pb-2">
                @foreach ($allCourses as $autoformation)
                    <div class="bg-white rounded-lg  p-6 flex flex-col justify-between course-card">
                        <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-1.25-3M15 10V5H9v5m4 0h-4M9 10H7v4h10v-4h-2"/></svg>
                        </div>
                        <div class="font-bold text-lg mb-2">{{ $autoformation['title'] }}</div>
                        <div class="text-gray-600 text-sm mb-4">{{ $autoformation['description'] }}</div>
                        <a href="{{ route('Apprenant.dashboard', ['autoformationId' => $autoformation['id']]) }}"
                           class="mt-auto w-full block text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">
                           Démarrer
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
document.getElementById('searchInput').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    document.querySelectorAll('.course-card').forEach(function(card) {
        let title = card.querySelector('.font-bold').textContent.toLowerCase();
        let desc = card.querySelector('.text-gray-600').textContent.toLowerCase();
        card.style.display = (title.includes(filter) || desc.includes(filter)) ? '' : 'none';
    });
});
</script>
@endsection 