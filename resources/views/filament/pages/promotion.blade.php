<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-8">
            <div class="flex flex-col md:flex-row items-center gap-8 mb-8">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-600 rounded-full blur opacity-50 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
                    <img src="{{ asset('images/riski-profile.jpg') }}" alt="Riski Ramadhan" class="relative w-32 h-32 rounded-full object-cover border-4 border-amber-500 shadow-xl" style="border-color: #f59e0b;">
                    <div class="absolute bottom-1 right-1 bg-green-500 p-1.5 rounded-full border-2 border-white dark:border-gray-800" title="Verified Developer">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
                
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-bold text-amber-600 dark:text-amber-500">Riski Ramadhan</h2>
                    <p class="text-lg text-primary-600 dark:text-primary-400 font-medium mb-2">Full Stack Web Developer</p>
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-2 text-sm text-gray-500">
                        <span class="flex items-center gap-1 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                            <x-heroicon-m-academic-cap class="w-4 h-4"/> Horizon University
                        </span>
                        <span class="flex items-center gap-1 bg-gray-100 dark:bg-gray-800 px-2 py-1 rounded">
                            <x-heroicon-m-clock class="w-4 h-4"/> Semester 5
                        </span>
                    </div>
                </div>
            </div>

            <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                Halo! Saya Riski, mahasiswa semester 5 di Horizon yang bersemangat dalam pengembangan web modern. 
                Saya berspesialisasi dalam membangun aplikasi web yang cepat, responsif, dan indah menggunakan 
                teknologi terkini seperti <strong>Laravel, Filament, React, dan Tailwind CSS</strong>.
            </p>

            <div class="space-y-4 mb-8">
                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                    <x-heroicon-o-check-circle class="w-5 h-5 text-green-500"/>
                    <span>Pembuatan Dashboard & Admin Panel</span>
                </div>
                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                    <x-heroicon-o-check-circle class="w-5 h-5 text-green-500"/>
                    <span>Landing Page Modern & Responsif</span>
                </div>
                <div class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                    <x-heroicon-o-check-circle class="w-5 h-5 text-green-500"/>
                    <span>Aplikasi Sistem Informasi & Manajemen</span>
                </div>
            </div>

            <div class="flex gap-4">
                <a href="#" class="inline-flex items-center justify-center px-6 py-2.5 bg-primary-600 hover:bg-primary-500 text-white font-semibold rounded-lg transition-colors w-full md:w-auto">
                    Hubungi Saya
                </a>
                <a href="#" class="inline-flex items-center justify-center px-6 py-2.5 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold rounded-lg transition-colors w-full md:w-auto dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-700">
                    Lihat Portofolio
                </a>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 p-8 flex flex-col justify-between h-auto">
            <div class="relative z-10">
                <h3 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Kenapa Memilih Saya?</h3>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-start gap-3">
                        <span class="bg-gray-100 dark:bg-gray-800 p-1 rounded mt-0.5 text-gray-600 dark:text-gray-300">
                            <x-heroicon-s-bolt class="w-4 h-4"/>
                        </span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Pengerjaan cepat dan tepat waktu sesuai deadline.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="bg-gray-100 dark:bg-gray-800 p-1 rounded mt-0.5 text-gray-600 dark:text-gray-300">
                            <x-heroicon-s-sparkles class="w-4 h-4"/>
                        </span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Desain modern, bersih, dan mudah digunakan (User Friendly).</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="bg-gray-100 dark:bg-gray-800 p-1 rounded mt-0.5 text-gray-600 dark:text-gray-300">
                            <x-heroicon-s-currency-dollar class="w-4 h-4"/>
                        </span>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">Harga mahasiswa dengan kualitas profesional.</p>
                    </li>
                </ul>
            </div>

            <div class="relative z-10 pt-6 border-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-bold mb-4 text-gray-800 dark:text-gray-200">Temukan Saya di Internet</h3>
                
                <div class="grid grid-cols-1 gap-2.5">
                    <!-- Website -->
                    <a href="https://riski-dev.vercel.app/" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-orange-100 text-orange-600 p-1.5 rounded-md dark:bg-orange-900/50 dark:text-orange-300">
                            <x-heroicon-m-globe-alt class="w-5 h-5"/>
                        </div>
                        <span class="font-semibold text-sm">Website Resmi</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-orange-500 dark:group-hover:text-orange-300"/>
                    </a>

                    <!-- Fastwork -->
                    <a href="https://fastwork.id/user/riski" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-blue-100 text-blue-600 p-1.5 rounded-md dark:bg-blue-900/50 dark:text-blue-300">
                            <x-heroicon-m-briefcase class="w-5 h-5"/>
                        </div>
                        <span class="font-semibold text-sm">Fastwork</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-blue-500 dark:group-hover:text-blue-300"/>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/62895396836264" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-green-100 text-green-600 p-1.5 rounded-md dark:bg-green-900/50 dark:text-green-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </div>
                        <span class="font-semibold text-sm">WhatsApp</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-green-500 dark:group-hover:text-green-300"/>
                    </a>

                    <!-- Facebook -->
                    <a href="https://facebook.com/riski" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-blue-50 text-[#1877F2] p-1.5 rounded-md dark:bg-blue-900/50 dark:text-blue-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </div>
                        <span class="font-semibold text-sm">Facebook</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-[#1877F2] dark:group-hover:text-blue-300"/>
                    </a>

                    <!-- Instagram -->
                    <a href="https://instagram.com/riski" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-pink-50 text-[#E1306C] p-1.5 rounded-md dark:bg-pink-900/50 dark:text-pink-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948-0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </div>
                        <span class="font-semibold text-sm">Instagram</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-[#E1306C] dark:group-hover:text-pink-300"/>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/in/riski" target="_blank" class="flex items-center gap-3 bg-white hover:bg-gray-50 text-gray-800 p-2.5 rounded-lg border border-gray-200 shadow-sm transition group dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-200 dark:border-gray-700">
                        <div class="bg-blue-50 text-[#0A66C2] p-1.5 rounded-md dark:bg-blue-900/50 dark:text-blue-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </div>
                        <span class="font-semibold text-sm">LinkedIn</span>
                        <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 ml-auto text-gray-400 group-hover:text-[#0A66C2] dark:group-hover:text-blue-300"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
