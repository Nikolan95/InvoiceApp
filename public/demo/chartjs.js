$(function(){
    //console.log($('#line-chart').length);
    if($('#line-chart').length){
        $.ajax({
            url: '/kesa',
            method: 'GET',
            success: function(data) {
                nacrtajChart(data);
                nacrtajDrugiChart(data);
                //fakture = data;
                //console.log(data);      
            }
        })
    }
    function  nacrtajChart(fakture){
        var lineChartData = {
            labels : fakture.months,
            datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                pointColor : "rgba(220,220,220,1)",
                pointStrokeColor : "#fff",
                data : fakture.invoice_count_data
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                pointColor : "rgba(151,187,205,1)",
                pointStrokeColor : "#fff",
                data : fakture.paid_invoice_count_data
            }
            ]

        }

        var myLine = new Chart(document.getElementById("line-chart").getContext("2d")).Line(lineChartData);
    };   


    function nacrtajDrugiChart(fakture){
        var barChartData = {
            labels : fakture.months,
            datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,1)",
                data : fakture.invoice_count_data
            },
            {
                fillColor : "rgba(151,187,205,0.5)",
                strokeColor : "rgba(151,187,205,1)",
                data : fakture.paid_invoice_count_data
            }
            ]

        }

        var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
    } 
});
