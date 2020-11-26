function drawAreaChart(id,data,groups,colors,names,x_axis_data) {
    c3.generate({
        bindto: id, // id of chart wrapper
        data: {
            columns: data,
            type: 'area-spline', // default type of chart
            groups: groups,
            colors: colors,
            names: names
        },
        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: x_axis_data
            },
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 20,
            top: 0
        },
    });
}

function drawPieChart(id,columns,colors,names) {
    c3.generate({
        bindto: id, // id of chart wrapper
        data: {
            columns: columns,
            type: 'pie', // default type of chart
            colors: colors,
            names: names
        },
        axis: {
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 20,
            top: 0
        },
    });
}

function drawBarChart(id,columns,colors,names,x_axis_data) {
    c3.generate({
        bindto: id, // id of chart wrapper
        data: {
            columns: columns,
            type: 'bar', // default type of chart
            colors: colors,
            names: names
        },
        axis: {
            x: {
                type: 'category',
                // name of each category
                categories: x_axis_data
            },
        },
        bar: {
            width: 16
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 20,
            top: 0
        },
    });
}