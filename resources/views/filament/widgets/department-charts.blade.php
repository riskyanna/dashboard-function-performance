<x-filament-widgets::widget>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <x-filament::section>
        <div class="grid grid-cols-1 md:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($this->getChartsData() as $title => $config)
                <div class="flex flex-col gap-2 p-4 bg-white/50 dark:bg-gray-900/50 rounded-lg border border-gray-200 dark:border-gray-800" wire:ignore>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 text-center uppercase tracking-wider">
                        {{ $title }}
                    </h3>
                    
                    <div class="relative h-48 w-full"
                        x-data="{
                            chart: null,
                            init() {
                                let config = {{ Js::from($config) }};
                                
                                const render = () => {
                                    if (typeof Chart === 'undefined') {
                                        setTimeout(render, 500); // Wait for script to load
                                        return;
                                    }
                                    
                                    if (this.chart) {
                                        this.chart.destroy();
                                    }

                                    this.chart = new Chart(this.$refs.canvas, config);
                                }

                                render();
                            }
                        }"
                    >
                        <canvas x-ref="canvas"></canvas>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
