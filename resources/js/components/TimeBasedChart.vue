
<template>
    <div >
        <Chart type="line" :data="chartData" :options="chartOptions" class="h-30rem" />
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
            must: [],
            mustLength: 0,
            should: 0,
            shouldLength: 0,
            could: 0,
            couldLength: 0,
        };
    },
    async mounted() {
        
        await this.fetchAnswers();
        console.log(this.must);
        this.chartData = this.setChartData();
        this.chartOptions = this.setChartOptions();
    },
    methods: {

        async fetchAnswers() {
            try {
                const response = await axios.get(`/api/answersTime/${this.organisation}/${this.assessment}`);
                this.answers = response.data;
                this.must = this.answers.must || 0;
                this.mustLength = this.answers.mustLength || 0;
                this.should = this.answers.should || 0;
                this.shouldLength = this.answers.shouldLength || 0;
                this.could = this.answers.could || 0;
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
                now.setMonth(now.getMonth() - 1);
            }
            
            
            
            return {
                

                labels: [months[11], months[10], months[9], months[8], months[7], months[6], months[5], months[4], months[3], months[2], months[1], months[0]],
                datasets: [
                    {
                        label: 'Must',
                        data: [this.must[11], this.must[10], this.must[9], this.must[8], this.must[7], this.must[6], this.must[5], this.must[4], this.must[3], this.must[2], this.must[1], this.must[0]],
                        fill: false,
                        borderColor: documentStyle.getPropertyValue('--cyan-500'),
                        tension: 0.4
                    },
                    {
                        label: 'Should',
                        data: [this.should[11], this.should[10], this.should[9], this.should[8], this.should[7], this.should[6], this.should[5], this.should[4], this.should[3], this.should[2], this.should[1], this.should[0]],
                        fill: false,
                        borderColor: documentStyle.getPropertyValue('--gray-500'),
                        tension: 0.4
                    },
                    {
                        label: 'Could',
                        data: [this.could[11], this.could[10], this.could[9], this.could[8], this.could[7], this.could[6], this.could[5], this.could[4], this.could[3], this.could[2], this.could[1], this.could[0]],
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
