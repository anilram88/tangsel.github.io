$(function() {
    // Set the default dates
    var startDate = Date.create().addDays(-6), // 7 days ago
            endDate = Date.create(); 				// today

    var range = $('#range');

    // Show the dates in the range input
    range.val(startDate.format('{dd}/{MM}/{yyyy}') + ' - ' + endDate.format('{dd}/{MM}/{yyyy}'));

    // Load chart
    ajaxLoadChart(startDate, endDate);

    range.daterangepicker({
        startDate: startDate,
        endDate: endDate,
        ranges: {
            'Today': ['today', 'today'],
            'Yesterday': ['yesterday', 'yesterday'],
            'Last 7 Days': [Date.create().addDays(-6), 'today'],
            'Last 30 Days': [Date.create().addDays(-29), 'today']
        }
    }, function(start, end) {

        ajaxLoadChart(start, end);

    });

    // The tooltip shown over the chart
    var tt = $('<div class="ex-tooltip">').appendTo('body'),
            topOffset = -32;

    var data = {
        "xScale": "ordinal",
        "yScale": "linear",
        "main": [{
                className: ".stats",
                "data": []
            }]
    };

    var opts = {
        paddingLeft: 50,
        paddingTop: 20,
        paddingRight: 10,
        axisPaddingLeft: 25,
        tickHintX: 9, // How many ticks to show horizontally

        // dataFormatX: function(x) {

        //     // This turns converts the ordinalstamps coming from
        //     // ajax.php into a proper JavaScript Date object

        //     return Date.create(x);
        // },
        // tickFormatX: function(x) {

        //     // Provide formatting for the x-axis tick labels.
        //     // This uses sugar's format method of the date object. 

        //     return x.format('{MM}/{dd}');
        // },
        "mouseover": function(d, i) {
            var pos = $(this).offset();

            // tt.text(d.x.format('{Month} {ord}') + ', No. of visits: ' + d.x).css({
                tt.text(d.x + ', Jumlah Pengaduan: ' + d.y).css({
                top: topOffset + pos.top,
                left: pos.left

            }).show();
        },
        "mouseout": function(x) {
            tt.hide();
        }
    };

    // Create a new xChart instance, passing the type
    // of chart a data set and the options object

    var chart = new xChart('bar', data, '#chart', opts);
    // var chart1 = new xChart('line-dotted', data, '#chart', opts);
    // var chart = new xChart('line-dotted', data, '#chart', opts);

    // Function for loading data via AJAX and showing it on the chart
    function ajaxLoadChart(startDate, endDate) {

        // If no data is passed (the chart was cleared)

        if (!startDate || !endDate) {
            chart.setData({
                "xScale": "ordinal",
                "yScale": "linear",
                "main": [{
                        className: ".stats",
                        data: []
                    }]
            });

            return;
        }

        // Otherwise, issue an AJAX request

        $.post('get_chart_data', {
            start: startDate.format('{yyyy}-{MM}-{dd}'),
            end: endDate.format('{yyyy}-{MM}-{dd}')
        }, function(data) {
            if ((data.indexOf("Data Tidak Ditemukan") > -1) || (data.indexOf("Tanggal Harus Di Isi") > -1)) {
                $('#msg').html('<span style="color:red;">' + data + '</span>');
                $('#placeholder').hide();
                chart.setData({
                    "xScale": "ordinal",
                    "yScale": "linear",
                    // "type": "bar",
                    "main": [{
                            className: ".stats",
                            data: []
                        }]
                });
            } else {
                $('#msg').empty();
                $('#placeholder').show();
                var set = [];
                $.each(data, function() {
                    set.push({
                        x: this.label,
                        y: parseInt(this.value, 10)
                    });
                });
                chart.setData({
                    "xScale": "ordinal",
                    "yScale": "linear",
                    "type": "bar",
                    "main": [{
                            className: ".stats",
                            data: set
                        }]
                });
                // chart1.setData({
                //     "xScale": "ordinal",
                //     "yScale": "linear",
                //     "type": "bar",
                //     "main": [{
                //             className: ".stats",
                //             data: set
                //         }]
                // });
            }
        }, 'json');
    }
});
