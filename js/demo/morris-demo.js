$(document).ready(function() {

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Nitrogen",
            value: 78
        }, {
            label: "Oxygen",
            value: 20
        }, {
            label: "Water Vapour",
            value: 1.5
        },{
            label: "Carbon Dioxide",
            value: 0.5
        }],
        resize: true,
        colors: ['#87d6c6', '#54cdb4','#1ab394'],
    });

    Morris.Line({
        element: 'morris-line-chart',
        data: [{
            y: '2006',
            a: 1010
        }, {
            y: '2007',
            a: 1013
        }, {
            y: '2008',
            a: 1011
        }, {
            y: '2009',
            a: 1011
        }, {
            y: '2010',
            a: 1013
        }, {
            y: '2011',
            a: 1013
        }, {
            y: '2012',
            a: 1010
        }],
        xkey: 'y',
        ykeys: 'a',
        labels: 'Series A',
        hideHover: 'auto',
        resize: true,
        lineColors: ['#54cdb4'],
    });

});
