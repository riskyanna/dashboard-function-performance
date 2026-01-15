<x-filament-panels::page>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kartu Penawaran Utama -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">
                <div class="flex items-center gap-4 mb-6">
                    <div class="p-3 bg-amber-100 dark:bg-amber-900 rounded-lg text-amber-600 dark:text-amber-400">
                        <x-heroicon-m-computer-desktop class="w-8 h-8" />
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Jasa Pembuatan Website</h2>
                        <p class="text-primary-600 dark:text-primary-400 font-medium">Solusi Digital Terjangkau & Profesional</p>
                    </div>
                </div>

                <p class="text-gray-600 dark:text-gray-300 mb-6 leading-relaxed">
                    Butuh website untuk bisnis, tugas akhir, atau personal branding?
                    Kami menyediakan jasa pembuatan website dengan teknologi terbaru (Laravel, React, Filament) yang cepat, aman, dan responsive.
                </p>

                <h3 class="font-semibold text-gray-900 dark:text-white mb-4">Layanan Kami:</h3>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <x-heroicon-s-check-circle class="w-5 h-5 text-green-500"/>
                        <span>Landing Page UMKM / Company Profile</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <x-heroicon-s-check-circle class="w-5 h-5 text-green-500"/>
                        <span>Dashboard Admin & Sistem Inventory</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <x-heroicon-s-check-circle class="w-5 h-5 text-green-500"/>
                        <span>Aplikasi Skripsi / Tugas Akhir IT</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-600 dark:text-gray-300">
                        <x-heroicon-s-check-circle class="w-5 h-5 text-green-500"/>
                        <span>Top Up Game & E-commerce Sederhana</span>
                    </li>
                </ul>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/62895396836264" target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                        <x-heroicon-s-chat-bubble-left-right class="w-5 h-5" />
                        Chat WhatsApp
                    </a>
                    
                    <a href="https://riski-dev.vercel.app/" target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-gray-200 dark:bg-gray-700 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 text-gray-800 dark:text-white font-bold rounded-lg shadow hover:shadow-md transition-all">
                        <x-heroicon-m-globe-alt class="w-5 h-5 text-blue-500" />
                        Kunjungi Website Saya
                    </a>
                </div>
            </div>

            <!-- Kartu Info Tambahan & Link -->
            <div class="space-y-6">
                <!-- Why Choose Us -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl shadow-lg p-6 text-white">
                    <h3 class="text-lg font-bold mb-4 flex items-center gap-2">
                        <x-heroicon-m-star class="w-5 h-5 text-yellow-400" />
                        Kenapa Memilih Kami?
                    </h3>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="mt-1 bg-white/10 p-1.5 rounded text-cyan-400">
                                <x-heroicon-s-bolt class="w-4 h-4" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Pengerjaan Cepat</h4>
                                <p class="text-gray-400 text-xs">Sesuai deadline yang disepakati.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="mt-1 bg-white/10 p-1.5 rounded text-purple-400">
                                <x-heroicon-s-currency-dollar class="w-4 h-4" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Harga Mahasiswa</h4>
                                <p class="text-gray-400 text-xs">Kualitas pro dengan budget bersahabat.</p>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="mt-1 bg-white/10 p-1.5 rounded text-pink-400">
                                <x-heroicon-s-heart class="w-4 h-4" />
                            </div>
                            <div>
                                <h4 class="font-bold text-sm">Revisi & Garansi</h4>
                                <p class="text-gray-400 text-xs">Support perbaikan jika ada bug.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Link-Link Sosial Media -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-4">Hubungi Kami di Platform Lain</h3>
                    <div class="grid grid-cols-1 gap-3">
                        <a href="https://instagram.com/rskirmdhn._" target="_blank" class="flex items-center justify-between p-3 rounded-lg border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="bg-pink-100 dark:bg-pink-900/30 text-pink-600 dark:text-pink-400 p-2 rounded-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.373c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                                </div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">Instagram</span>
                            </div>
                            <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-400 group-hover:text-primary-500" />
                        </a>
                        
                        <a href="mailto:riskycas23@gmail.com" class="flex items-center justify-between p-3 rounded-lg border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 p-2 rounded-lg">
                                    <x-heroicon-m-envelope class="w-5 h-5" />
                                </div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">Email Inquiry</span>
                            </div>
                            <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-400 group-hover:text-primary-500" />
                        </a>

                        <a href="https://github.com/riskyanna" target="_blank" class="flex items-center justify-between p-3 rounded-lg border border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors group">
                            <div class="flex items-center gap-3">
                                <div class="bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white p-2 rounded-lg">
                                    <x-heroicon-m-code-bracket class="w-5 h-5" />
                                </div>
                                <span class="font-medium text-gray-700 dark:text-gray-300">GitHub Portfolio</span>
                            </div>
                            <x-heroicon-m-arrow-top-right-on-square class="w-4 h-4 text-gray-400 group-hover:text-primary-500" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-filament-panels::page>
