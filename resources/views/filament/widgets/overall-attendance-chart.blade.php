<x-filament-widgets::widget>
    @php 
        $config = $this->getChartConfig();
        $shiftFilter = $this->filters['shift'] ?? 'All Shifts';
        $dateFilter = $this->filters['date'] ?? null;
        $formattedDate = $dateFilter ? \Carbon\Carbon::parse($dateFilter)->format('d M Y') : 'All Dates';
        $subtitle = "Shift: {$shiftFilter} • Date: {$formattedDate}";
    @endphp
    <div 
        wire:key="{{ md5(json_encode($config) . $subtitle) }}"
        class="flex flex-col p-4 rounded-xl bg-white dark:bg-gray-900 border border-gray-100 dark:border-gray-800 shadow-sm"
        x-data="{
            chart: null,
            config: @js($config),
            subtitle: @js($subtitle),
            init() {
                let check = setInterval(() => {
                    if (window.Chart) {
                        clearInterval(check);
                        this.render();
                    }
                }, 50);
            },
            render() {
                if (this.chart) this.chart.destroy();
                this.chart = new window.Chart(this.$refs.canvas, this.config);
            },
            download() {
                if (this.chart) {
                    const tempCanvas = document.createElement('canvas');
                    const ctx = tempCanvas.getContext('2d');
                    const chartCanvas = this.$refs.canvas;
                    
                    const titleHeight = 60;
                    tempCanvas.width = chartCanvas.width;
                    tempCanvas.height = chartCanvas.height + titleHeight;
                    
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
                    
                    ctx.font = 'bold 16px &quot;Instrument Sans&quot;, sans-serif';
                    ctx.fillStyle = '#374151';
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'middle';
                    ctx.fillText('{{ $this->heading }}', tempCanvas.width / 2, 25);
                    
                    ctx.font = '500 12px &quot;Instrument Sans&quot;, sans-serif';
                    ctx.fillStyle = '#6b7280';
                    ctx.fillText(this.subtitle, tempCanvas.width / 2, 45);

                    ctx.drawImage(chartCanvas, 0, titleHeight);
                    
                    const link = document.createElement('a');
                    link.download = 'overall-attendance-chart.png';
                    link.href = tempCanvas.toDataURL('image/png');
                    link.click();
                }
            }
        }"
    >
        <div class="flex items-center justify-between mb-4">
            <!-- Spacer for balance -->
            <div class="w-8"></div>
            
            <div class="flex-1 text-center px-2">
                <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wide">
                    {{ $this->heading }}
                </h3>
                <p class="text-xs text-gray-500 mt-1">{{ $subtitle }}</p>
            </div>
            
            <button 
                @click="download()" 
                title="Download PNG"
                class="w-8 flex justify-end text-gray-400 hover:text-primary-500 transition-colors"
            >
                <x-heroicon-m-arrow-down-tray class="w-5 h-5" />
            </button>
        </div>
        
        <div class="flex-1 relative w-full flex items-center justify-center p-2"
            style="height: 300px;"
        >
            <canvas x-ref="canvas" wire:ignore></canvas>
        </div>
    </div>
</x-filament-widgets::widget>
