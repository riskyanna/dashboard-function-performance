<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 flex flex-col items-center text-center">
                <div class="relative w-32 h-32 mb-4">
                    <!-- GANTI FOTO DI SINI: Simpan foto anda di public/images/profile.jpg -->
                    <img src="https://ui-avatars.com/api/?name=Riski+Ramadhan&background=F59E0B&color=fff&size=256" 
                         alt="Riski Ramadhan" 
                         class="w-full h-full rounded-full object-cover border-4 border-primary-500 shadow-lg"
                    >
                    <div class="absolute bottom-2 right-2 bg-green-500 w-4 h-4 rounded-full border-2 border-white dark:border-gray-800"></div>
                </div>
                
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Riski Ramadhan</h2>
                <p class="text-primary-600 dark:text-primary-400 font-medium mb-1">Fullstack Web Developer</p>
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-6">Horizon Internship Semester 5</div>
                
                <div class="w-full flex justify-center gap-3">
                    <a href="https://github.com/riskyanna" target="_blank" class="p-2 text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                        <x-heroicon-m-code-bracket class="w-6 h-6" />
                    </a>
                    <a href="mailto:riskycas23@gmail.com" class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                        <x-heroicon-m-envelope class="w-6 h-6" />
                    </a>
                </div>
            </div>

            <!-- Skills / Technologies -->
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tech Stack</h3>
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs font-medium">Laravel</span>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs font-medium">FilamentPHP</span>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs font-medium">TailwindCSS</span>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs font-medium">PostgreSQL</span>
                    <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-xs font-medium">Docker</span>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Acknowledgement Card -->
            <div class="bg-gradient-to-br from-primary-600 to-primary-800 rounded-xl shadow-lg p-8 text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 bg-white/20 rounded-lg backdrop-blur-sm">
                            <x-heroicon-s-building-office-2 class="w-6 h-6 text-white" />
                        </div>
                        <h3 class="text-xl font-bold">Terima Kasih PT. JTEKT</h3>
                    </div>
                    
                    <p class="text-primary-100 leading-relaxed mb-6 font-medium text-lg">
                        "Saya ingin mengucapkan terima kasih yang sebesar-besarnya kepada <strong>PT. JTEKT Indonesia</strong> atas kesempatan luar biasa yang diberikan kepada saya untuk melaksanakan program magang (Internship).
                        <br><br>
                        Pengalaman ini sangat berharga bagi perkembangan karir dan skill teknis saya. Saya bangga bisa berkontribusi dalam pembuatan sistem <strong>Dashboard Function Performance</strong> ini."
                    </p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-white/20">
                        <div class="text-sm text-primary-200 flex items-center gap-2">
                             Developed with <x-heroicon-s-heart class="w-4 h-4 text-red-400" /> by Riski Ramadhan
                        </div>
                        <div class="text-2xl font-bold text-white/90 tracking-wider">
                            JTEKT
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <x-heroicon-o-sparkles class="w-5 h-5 text-amber-500" />
                    Tentang Aplikasi Ini
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed mb-4">
                    Website ini dirancang khusus untuk memonitoring performa kehadiran dan fungsi departemen secara <strong>Real-time</strong>.
                    Dibangun dengan teknologi terbaru untuk memastikan kecepatan, keamanan, dan kemudahan penggunaan bagi manajemen.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <h4 class="font-bold text-gray-900 dark:text-white text-sm mb-1">🚀 High Performance</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Optimized database query & caching.</p>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                        <h4 class="font-bold text-gray-900 dark:text-white text-sm mb-1">🔒 Secure Access</h4>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Encrypted session & role management.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
