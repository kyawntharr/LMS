$(document).ready(function () {
    $(document).on('click', '.btn_delete', function () {
        let status = confirm('Are you sure to Delete');
        console.log(status);
        if (status) {
            let id = $(this).parent().attr('id');
            console.log('id is ' + id);

            $.ajax({
                method: 'post',
                url: 'delete_category.php',
                data: {id: id},
                success: function (message) {
                    if (message == 'success') {
                        alert('succefully deleted');
                        location.href = 'app_category.php';
                    } else {

                        alert(message)
                    }
                },
                error: function (error) {

                }

            })
        }
    })
    $('#mytable').DataTable();
    $.ajax({
        url: 'report_chart.php',
        method: 'post',
        success: function (response) {
            let batch = JSON.parse(response);
            console.log(batch);
            let year = [];
            let data = [];
            for (let index = 0; index < batch.length; index++) {
                year[index] = batch[index].byear;
                data[index] = batch[index].total;
            }
// console.log(year);
// console.log(data);
            var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    // x cordinate
                    labels: year,
                    datasets: [{
                        label: "Batches",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: data
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        intersect: false
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 1
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
        },
        error: function (error) {

        }

    });
    $.ajax({
        url: 'report_chart2.php',
        method: 'post',
        success: function (respond){

        },
        error: function (message){
            
        }
    })

})