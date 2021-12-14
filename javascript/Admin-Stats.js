"use strict";

var queryString = decodeURIComponent(window.location.search);
    queryString = queryString.substring(1);
    var queries = queryString.split("=");
    var username = queries[1];


$.ajax({
    url:"http://localhost/save/php/Admin-Stats.php",
    method:"GET",
    data:
            {},
    dataType: 'json',
    success: function(data) { 
        console.log(data[0]);
        console.log(data[1])
        console.log(data[2])
        console.log(data[3])
        console.log(data[4])
        console.log(data[5]);
        console.log(data[6])
        createChart(data);
    }
})

//////////////////////////////  CHART   ////////////////////////////////////
function createChart(data){

let chart1 = document.getElementById('myChart').getContext('2d');
let visualChart = new Chart(chart1, {
type: 'bar',
data: {
    labels: [],
    datasets: [{
        label: '# of Users',
        data: [data[0]],
            backgroundColor: 'red',
            borderColor:'black',
            borderWidth: 1
    },{
        label: '# of POSTs',
        data: [data[1]],
            backgroundColor: 'blue',
            borderColor:'black',
            borderWidth: 1
    },{
        label: '# of GETs',
        data: [data[2]],
            backgroundColor: 'yellow',
            borderColor:  'black',
            borderWidth: 1
    },{
        label: '# Per Status',
        data: [data[3]],
            backgroundColor: 'cyan',
            borderColor: 'black',
            borderWidth: 1
    },{
        label: '# of Unique Domains',
        data: [data[4]],
            backgroundColor: 'green',
            borderColor: 'black',
            borderWidth: 1
    },/*{
        label: '# of Unique Paroxwn',
        data: [data[5]],
            backgroundColor: 'purple',
            borderColor: 'black',
            borderWidth: 1
    },*/{
        label: 'Average Age per Content-Type',
        data: [data[5]],
            backgroundColor: 'orange',
            borderColor: 'black',
            borderWidth: 1
    }
    ]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    title: {
        display: true,
        text: 'Basic Data Visualization',
        fontSize: 15
    }
}
});

}
  