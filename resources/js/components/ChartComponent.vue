<template>
    <div  >
        <Chart type="pie" :data="chartData" :options="chartOptions" />
        <!-- <input type="range" min="1" max="4" v-model="selectedQuarter" @input="updateChartData" /> -->
        
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";

let selectedQuarter = ref(4);


onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
    
});

watch(selectedQuarter, () => {
    chartData.value = setChartData();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    return {
        labels: ['Yes', 'No', 'Not ansered'].slice(0, selectedQuarter.value),
        datasets: [
            {
                label: 'Sales',
                data: [540, 325, 702],
                backgroundColor: ['rgba(255, 159, 64, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(153, 102, 255, 0.2)'].slice(0, selectedQuarter.value),
                borderColor: ['rgb(255, 159, 64)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)', 'rgb(153, 102, 255)'].slice(0, selectedQuarter.value),
                borderWidth: 1
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--text-color-secondary');
    const surfaceBorder = documentStyle.getPropertyValue('--surface-border');
    
    return {
        responsive: true, 
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
    
    };
}
</script>
