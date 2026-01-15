<x-filament-panels::page>
    <div class="max-w-4xl mx-auto">
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-8 text-center">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6 text-red-500">
                <x-heroicon-o-bug-ant class="w-10 h-10"/>
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2">Menemukan Masalah?</h2>
            <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-lg mx-auto">
                Jika Anda menemukan error, bug, atau fitur yang tidak berjalan semestinya pada aplikasi ini, 
                mohon segera laporkan agar dapat segera diperbaiki.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-2xl mx-auto">
                <a href="https://wa.me/62895396836264?text=Halo%20Riski,%20saya%20menemukan%20bug%20di%20aplikasi%20dashboard..." target="_blank" class="flex items-center justify-center gap-3 p-4 bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl transition-colors group">
                    <div class="bg-green-500 text-white p-2 rounded-lg group-hover:scale-110 transition-transform">
                        <x-heroicon-s-chat-bubble-oval-left class="w-5 h-5"/>
                    </div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-900 text-sm">WhatsApp</h3>
                        <p class="text-xs text-gray-500">Respon Cepat</p>
                    </div>
                </a>

                <a href="mailto:riskycas23@gmail.com?subject=Laporan%20Bug%20Aplikasi%20Dashboard" class="flex items-center justify-center gap-3 p-4 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-xl transition-colors group">
                    <div class="bg-blue-500 text-white p-2 rounded-lg group-hover:scale-110 transition-transform">
                        <x-heroicon-s-envelope class="w-5 h-5"/>
                    </div>
                    <div class="text-left">
                        <h3 class="font-bold text-gray-900 text-sm">Email</h3>
                        <p class="text-xs text-gray-500">Lampirkan Screenshot</p>
                    </div>
                </a>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-100 dark:border-gray-800">
                <p class="text-xs text-gray-400">
                    Mohon sertakan detail langkah-langkah kejadian dan screenshot error jika ada.
                </p>
            </div>
        </div>
    </div>
</x-filament-panels::page>
