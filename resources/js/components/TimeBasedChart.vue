
<template>
    <div >
        <Chart type="line" :data="chartData" :options="chartOptions"  />
    </div>
</template>

<script>

import axios from 'axios';

export default {
    props: ['organisation', 'assessment'],
    data() {
        return {
            chartData: null,
            chartOptions: null,
            answers: [],
            questions: [],
            showModal: false,
            mustPercentage: [],
            mustLength: 0,
            shouldPercentage: 0,
            shouldLength: 0,
            couldPercentage: 0,
            couldLength: 0,
        };
    },
    async mounted() {
        
        await this.fetchAnswers();
        console.log(this.mustPercentage);
        this.chartData = this.setChartData();
        this.chartOptions = this.setChartOptions();
    },
    methods: {

        async fetchAnswers() {
            try {
                const response = await axios.get(`/api/answersTime/${this.organisation}/${this.assessment}`);
                this.answers = response.data;
                this.mustPercentage = this.answers.must || 0;
                this.mustLength = this.answers.mustLength || 0;
                this.shouldPercentage = this.answers.should || 0;
                this.shouldLength = this.answers.shouldLength || 0;
                this.couldPercentage = this.answers.could || 0;
                this.couldLength = this.answers.couldLength || 0;
                console.log(response.data);
            } catch (error) {
                console.error(error);
            }
        },


        setChartData() {
            const documentStyle = getComputedStyle(document.documentElement);
            
            const now = new Date();
            const months = [];
            for (let i = 0; i < 12; i++) { 
                months[i] = now.toLocaleString('default', { month: 'long' });
                now.setDate(1);
                now.setMonth(now.getMonth() - 1);
            }
        
            return {
                labels: [months[11], months[10], months[9], months[8], months[7], months[6], 
                        months[5], months[4], months[3], months[2], months[1], months[0]],
                datasets: [
                    {
                        label: 'Must',
                        data: [this.mustPercentage[11], this.mustPercentage[10], this.mustPercentage[9], this.mustPercentage[8], 
                        this.mustPercentage[7], this.mustPercentage[6], this.mustPercentage[5], this.mustPercentage[4], 
                        this.mustPercentage[3], this.mustPercentage[2], this.mustPercentage[1], this.mustPercentage[0]],
                        fill: false,
                        borderColor: documentStyle.getPropertyValue('--cyan-500'),
                        tension: 0.4
                    },
                    {
                        label: 'Should',
                        data: [this.shouldPercentage[11], this.shouldPercentage[10], this.shouldPercentage[9], 
                        this.shouldPercentage[8], this.shouldPercentage[7], this.shouldPercentage[6], this.shouldPercentage[5], 
                        this.shouldPercentage[4], this.shouldPercentage[3], this.shouldPercentage[2], this.shouldPercentage[1], 
                        this.shouldPercentage[0]],
                        fill: false,
                        borderColor: documentStyle.getPropertyValue('--gray-500'),
                        tension: 0.4
                    },
                    {
                        label: 'Could',
                        data: [this.couldPercentage[11], this.couldPercentage[10], this.couldPercentage[9], this.couldPercentage[8], 
                        this.couldPercentage[7], this.couldPercentage[6], this.couldPercentage[5], this.couldPercentage[4], 
                        this.couldPercentage[3], this.couldPercentage[2], this.couldPercentage[1], this.couldPercentage[0]],
                        fill: false,
                        borderColor: documentStyle.getPropertyValue('--red-500'),
                        tension: 0.4
                    }
                ]
            };
        },
        setChartOptions() {
            const documentStyle = getComputedStyle(document.documentElement);
            const textColor = documentStyle.getPropertyValue('--text-color');
            const textColorSecondary = documentStyle.getPropertyValue('--text-color-secondary');
            const surfaceBorder = documentStyle.getPropertyValue('--surface-border');
            

            return {
                maintainAspectRatio: false,
                
                aspectRatio: 0.6,
                plugins: {
                    legend: {
                        labels: {
                            color: textColor
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: textColorSecondary

                            
                        },
                        grid: {
                            color: surfaceBorder
                        }
                    },
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            color: textColorSecondary,
                            
                        },
                        grid: {
                            color: surfaceBorder
                        }
                    }
                }
            };
        }
    }
};
</script>
