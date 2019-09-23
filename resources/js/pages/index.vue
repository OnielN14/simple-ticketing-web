<template>
  <div>
      
      <canvas id="my-chart" height="100"></canvas>

  </div>
</template>

<script>
import Chart from 'chart.js';

export default {
  data(){
    return {
      count:0,
      labels:['Online']
    }
  },
  methods:{
    drawChart(){
      let ctx = document.getElementById('my-chart');
      let myChart = new Chart(ctx,{
        type:'bar',
        data:{
          label:this.labels,
          datasets: [{
              label: '# of Users',
              data: [this.count],
              borderWidth: 1
          }]
        },
        options:{
          scales:{
            yAxes:{
              ticks:{
                beginAtZero:true
              }
            }
          }
        }
      })
    },
    update(){
    Echo.join('chart')
        .here((users)=>{
          console.log(users);
          
        })
  }
  },
  mounted(){
    this.update();
    this.drawChart();
  },
}
</script>

<style>

</style>