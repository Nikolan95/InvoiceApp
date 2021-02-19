function changeFirstChart()
{
    var izbor = document.getElementById("selectFirstId");
    
    if($('#line-chart').length && izbor){
        if(izbor.value == 'jedan'){
            $.ajax({
                url: '/invoiceData',
                method: 'GET',
                success: function(data) {
                    nacrtajChart(data);
                //fakture = data;
                //console.log(data);      
            }
        })
        }
        else if(izbor.value == "dva"){
            $.ajax({
                url: '/invoiceData',
                method: "GET",
                success: function(data) {
                    nacrtajChartt(data);
                }
            })
        }
    }
}
changeFirstChart();

function changeSecondChart()
{
    var izbor = document.getElementById("selectSecondId");
    
    if($('#bar-chart').length && izbor){
        if(izbor.value == 'tri'){
            $.ajax({
                url: '/invoiceData',
                method: 'GET',
                success: function(data) {

                    nacrtajDrugiChart(data);
                //fakture = data;
                //console.log(data);      
            }
        })
        }
        else if(izbor.value == "cetiri"){
            $.ajax({
                url: '/invoiceData',
                method: "GET",
                success: function(data) {
                   nacrtajDrugiChartt(data);
               }
           })
        }
    }
}
changeSecondChart();    



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

function  nacrtajChartt(fakture){
    var lineChartData = {
        labels : fakture.this_year_months,
        datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : fakture.this_year_invoice_count_data
        },
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : fakture.this_year_paid_invoice_count_data
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

function nacrtajDrugiChartt(fakture){
    var barChartData = {
        labels : fakture.this_year_months,
        datasets : [
        {
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            data : fakture.this_year_invoice_count_data
        },
        {
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            data : fakture.this_year_paid_invoice_count_data
        }
        ]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
} 