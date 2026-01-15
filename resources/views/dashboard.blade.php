<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Performance Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700;800&display=swap');
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        body {
            font-family: 'Instrument Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-linear-to-br from-blue-600 via-indigo-600 to-purple-700 min-h-screen font-sans text-slate-800">

    <div class="container mx-auto px-4 py-8 min-h-screen flex items-center justify-center">
        <div class="glass w-full max-w-5xl rounded-3xl shadow-2xl overflow-hidden p-8 border border-white/20">
            
            <header class="text-center mb-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-linear-to-r from-blue-700 to-purple-800 tracking-tight">
                    Dashboard Function Performance
                </h1>
                <p class="text-slate-500 mt-3 text-lg font-medium">Visualize Employee Attendance & Reason Codes</p>
            </header>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Upload Section -->
                <div class="lg:col-span-5 flex flex-col justify-center space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-xl border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            Upload Data
                        </h2>
                        <form action="{{ route('dashboard.process') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="relative group">
                                <label for="file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-blue-300 rounded-xl cursor-pointer bg-blue-50/50 hover:bg-blue-100/50 transition-colors group-hover:border-blue-500">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-1 text-sm text-gray-500"><span class="font-semibold text-blue-600">Click to upload</span> excel file</p>
                                        <p class="text-xs text-gray-400">.xlsx, .xls, .csv</p>
                                    </div>
                                    <input id="file" name="file" type="file" class="hidden" onchange="document.getElementById('filename').innerText = this.files[0] ? this.files[0].name : '';" />
                                </label>
                                <p id="filename" class="mt-2 text-xs text-center text-gray-500 font-medium h-4"></p>
                            </div>
                            
                            <button type="submit" class="w-full py-3 px-6 bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg transform transition-all hover:scale-[1.02] focus:ring-4 focus:ring-blue-300">
                                Generate Chart
                            </button>
                        </form>
                    </div>
                    


                    @if(!isset($counts))
                    <div class="text-center p-6 bg-white/40 rounded-2xl border border-white/30 text-gray-600">
                        <p class="text-sm">Please upload a file with columns: <br> <span class="font-mono text-xs bg-gray-200 px-1 py-0.5 rounded">employee id, nama, function, shift, reason code</span></p>
                    </div>
                    @endif
                </div>

                <!-- Chart & Stats Section -->
                @if(isset($counts))
                <div class="lg:col-span-7 space-y-6 animate-fade-in">
                    
                    <!-- Filters -->
                    <div class="glass border border-white/40 p-4 rounded-2xl flex flex-col md:flex-row gap-4 items-center justify-between shadow-sm">
                        <div class="flex items-center gap-2 w-full md:w-auto">
                           <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Filters:</span>
                        </div>
                        <div class="flex gap-3 w-full md:w-auto">
                            <select id="filterMonth" class="bg-white/50 border border-white/60 text-slate-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none cursor-pointer hover:bg-white transition-colors">
                                <option value="all">All Months</option>
                                @foreach($filters['months'] as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                            <select id="filterFunction" class="bg-white/50 border border-white/60 text-slate-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none cursor-pointer hover:bg-white transition-colors">
                                <option value="all">All Functions</option>
                                @foreach($filters['functions'] as $function)
                                    <option value="{{ $function }}">{{ $function }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Chart Card -->
                    <div class="bg-white rounded-2xl padding-6 shadow-xl border border-gray-100 p-6 relative">
                         <!-- Loader for chart update -->
                         <div id="chartLoader" class="hidden absolute inset-0 bg-white/80 rounded-2xl items-center justify-center z-10 backdrop-blur-sm">
                             <div class="w-8 h-8 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
                         </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-6 text-center">Analytic Overview</h3>
                        <div class="relative h-64 w-full flex justify-center items-center">
                            <canvas id="attendanceChart"></canvas>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-linear-to-br from-green-50 to-green-100 p-4 rounded-xl border border-green-200 shadow-sm text-center transform transition-transform hover:scale-105">
                            <h4 class="text-green-600 font-semibold text-xs uppercase tracking-widest mb-1">Present</h4>
                            <p id="statPresent" class="text-3xl font-extrabold text-green-700">{{ $counts['Present'] }}</p>
                            <span class="text-xs text-green-500 font-medium">Hadir</span>
                        </div>
                        <div class="bg-linear-to-br from-pink-50 to-pink-100 p-4 rounded-xl border border-pink-200 shadow-sm text-center transform transition-transform hover:scale-105">
                            <h4 class="text-pink-600 font-semibold text-xs uppercase tracking-widest mb-1">Alfa</h4>
                            <p id="statAlfa" class="text-3xl font-extrabold text-pink-700">{{ $counts['Alfa'] }}</p>
                            <span class="text-xs text-pink-500 font-medium">Auto-Fail</span>
                        </div>
                        <div class="bg-linear-to-br from-amber-50 to-amber-100 p-4 rounded-xl border border-amber-200 shadow-sm text-center transform transition-transform hover:scale-105">
                            <h4 class="text-amber-600 font-semibold text-xs uppercase tracking-widest mb-1">Absend</h4>
                            <p id="statAbsend" class="text-3xl font-extrabold text-amber-700">{{ $counts['Absend'] }}</p>
                            <span class="text-xs text-amber-500 font-medium">Sick/Permit</span>
                        </div>
                    </div>

                </div>
                @else
                <div class="lg:col-span-7 flex items-center justify-center">
                     <div class="opacity-50 text-center">
                         <div class="w-48 h-48 bg-gray-200 rounded-full mx-auto mb-4 animate-pulse"></div>
                         <p class="text-gray-200 text-lg">Chart placeholder area</p>
                     </div>
                </div>
                @endif
                
            </div>
        </div>
    </div>

    @if(isset($counts))
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
             // Pass PHP data to JS
             const dataset = @json($dataset);
             let myChart = null;

             const ctx = document.getElementById('attendanceChart').getContext('2d');
             
             // Initial Render
             renderChart(calculateCounts(dataset));
             // populateFilters removed - handled by Blade

             // Filter Logic
             const filterMonth = document.getElementById('filterMonth');
             const filterFunction = document.getElementById('filterFunction');

             function handleFilterChange() {
                 const monthVal = filterMonth.value;
                 const functionVal = filterFunction.value;

                 const filtered = dataset.filter(item => {
                     const matchMonth = monthVal === 'all' || item.month === monthVal;
                     const matchFunction = functionVal === 'all' || item.function === functionVal;
                     return matchMonth && matchFunction;
                 });

                 const newCounts = calculateCounts(filtered);
                 updateStats(newCounts);
                 
                 // Simulate loading for premium feel
                 const loader = document.getElementById('chartLoader');
                 loader.classList.remove('hidden');
                 loader.classList.add('flex');
                 
                 setTimeout(() => {
                    updateChart(newCounts);
                    loader.classList.remove('flex');
                    loader.classList.add('hidden');
                 }, 300);
             }

             filterMonth.addEventListener('change', handleFilterChange);
             filterFunction.addEventListener('change', handleFilterChange);

             // Helpers
             function calculateCounts(data) {
                 let counts = { Present: 0, Alfa: 0, Absend: 0 };
                 data.forEach(item => {
                     if (counts[item.status] !== undefined) {
                         counts[item.status]++;
                     }
                 });
                 return counts;
             }

             function updateStats(counts) {
                 // Animate numbers
                 animateValue(document.getElementById('statPresent'), parseInt(document.getElementById('statPresent').innerText), counts.Present, 500);
                 animateValue(document.getElementById('statAlfa'), parseInt(document.getElementById('statAlfa').innerText), counts.Alfa, 500);
                 animateValue(document.getElementById('statAbsend'), parseInt(document.getElementById('statAbsend').innerText), counts.Absend, 500);
             }



             function renderChart(counts) {
                 myChart = new window.Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Present', 'Alfa', 'Absend'],
                        datasets: [{
                            data: [counts.Present, counts.Alfa, counts.Absend],
                            backgroundColor: [
                                '#10B981', // Emerald 500
                                '#EC4899', // Pink 500
                                '#F59E0B'  // Amber 500
                            ],
                            borderWidth: 0,
                            hoverOffset: 15
                        }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        cutout: '75%',
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                                titleColor: '#1f2937',
                                bodyColor: '#1f2937',
                                borderColor: '#e5e7eb',
                                borderWidth: 1,
                                padding: 12,
                                boxPadding: 6,
                                usePointStyle: true,
                                bodyFont: { size: 14, weight: 'bold' }
                            }
                        },
                        animation: { animateScale: true, animateRotate: true }
                    }
                });
             }

             function updateChart(counts) {
                 myChart.data.datasets[0].data = [counts.Present, counts.Alfa, counts.Absend];
                 myChart.update();
             }
             
             function animateValue(obj, start, end, duration) {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    obj.innerHTML = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                         obj.innerHTML = end; // Ensure final value
                    }
                };
                window.requestAnimationFrame(step);
            }
        });
    </script>
    @endif
</body>
</html>
