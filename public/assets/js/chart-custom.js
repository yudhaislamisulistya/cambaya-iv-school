! function (e) {
    "use strict";

    function a(e, a) {
        let t = getComputedStyle(document.documentElement).getPropertyValue("--dark");
        a.dark && (t = getComputedStyle(document.documentElement).getPropertyValue("--white")), e.updateOptions({
            chart: {
                foreColor: t
            }
        })
    }

    function t(e, a) {
        a.dark && (e.stroke = am4core.color(getComputedStyle(document.documentElement).getPropertyValue("--white"))), e.validateData()
    }
    if (e("#apex-basic").length && (o = {
            chart: {
                height: 350,
                type: "line",
                zoom: {
                    enabled: !1
                }
            },
            colors: ["#4788ff"],
            series: [{
                name: "Desktops",
                data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
            }],
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "straight"
            },
            title: {
                text: "Product Trends by Month",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"]
            }
        }, "undefined" != typeof ApexCharts)) {
        (n = new ApexCharts(document.querySelector("#apex-basic"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-line-area").length) {
        o = {
            chart: {
                height: 350,
                type: "area"
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth"
            },
            colors: ["#4788ff", "#ff4b4b"],
            series: [{
                name: "series1",
                data: [31, 40, 28, 51, 42, 109, 100]
            }, {
                name: "series2",
                data: [11, 32, 45, 32, 34, 52, 41]
            }],
            xaxis: {
                type: "datetime",
                categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"]
            },
            tooltip: {
                x: {
                    format: "dd/MM/yy HH:mm"
                }
            }
        }, (n = new ApexCharts(document.querySelector("#apex-line-area"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-bar").length) {
        o = {
            chart: {
                height: 350,
                type: "bar"
            },
            plotOptions: {
                bar: {
                    horizontal: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            colors: ["#4788ff"],
            series: [{
                data: [470, 540, 580, 690, 1100, 1200, 1380]
            }],
            xaxis: {
                categories: ["Netherlands", "Italy", "France", "Japan", "United States", "China", "Germany"]
            }
        }, (n = new ApexCharts(document.querySelector("#apex-bar"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-column").length) {
        o = {
            chart: {
                height: 350,
                type: "bar"
            },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "55%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            colors: ["#4788ff", "#37e6b0", "#ff4b4b"],
            series: [{
                name: "Net Profit",
                data: [44, 55, 57, 56, 61, 58]
            }, {
                name: "Revenue",
                data: [76, 85, 101, 98, 87, 105]
            }, {
                name: "Free Cash Flow",
                data: [35, 41, 36, 26, 45, 48]
            }],
            xaxis: {
                categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul"]
            },
            yaxis: {
                title: {
                    text: "$ (thousands)"
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (e) {
                        return "$ " + e + " thousands"
                    }
                }
            }
        }, (n = new ApexCharts(document.querySelector("#apex-column"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-mixed-chart").length) {
        o = {
            chart: {
                height: 350,
                type: "line",
                stacked: !1
            },
            stroke: {
                width: [0, 2, 5],
                curve: "smooth"
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%"
                }
            },
            colors: ["#ff4b4b", "#37e6b0", "#4788ff"],
            series: [{
                name: "Facebook",
                type: "column",
                data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
            }, {
                name: "Vine",
                type: "area",
                data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
            }, {
                name: "Dribbble",
                type: "line",
                data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
            }],
            fill: {
                opacity: [.85, .25, 1],
                gradient: {
                    inverseColors: !1,
                    shade: "light",
                    type: "vertical",
                    opacityFrom: .85,
                    opacityTo: .55,
                    stops: [0, 100, 100, 100]
                }
            },
            labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
            markers: {
                size: 0
            },
            xaxis: {
                type: "datetime"
            },
            yaxis: {
                min: 0
            },
            tooltip: {
                shared: !0,
                intersect: !1,
                y: {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) + " views" : e
                    }
                }
            },
            legend: {
                labels: {
                    useSeriesColors: !0
                },
                markers: {
                    customHTML: [function () {
                        return ""
                    }, function () {
                        return ""
                    }, function () {
                        return ""
                    }]
                }
            }
        }, (n = new ApexCharts(document.querySelector("#apex-mixed-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-candlestick-chart").length) {
        o = {
            chart: {
                height: 350,
                type: "candlestick"
            },
            colors: ["#4788ff", "#37e6b0", "#37e6b0"],
            series: [{
                data: [{
                    x: new Date(15387786e5),
                    y: [6629.81, 6650.5, 6623.04, 6633.33]
                }, {
                    x: new Date(15387804e5),
                    y: [6632.01, 6643.59, 6620, 6630.11]
                }, {
                    x: new Date(15387822e5),
                    y: [6630.71, 6648.95, 6623.34, 6635.65]
                }, {
                    x: new Date(1538784e6),
                    y: [6635.65, 6651, 6629.67, 6638.24]
                }, {
                    x: new Date(15387858e5),
                    y: [6638.24, 6640, 6620, 6624.47]
                }, {
                    x: new Date(15387876e5),
                    y: [6624.53, 6636.03, 6621.68, 6624.31]
                }, {
                    x: new Date(15387894e5),
                    y: [6624.61, 6632.2, 6617, 6626.02]
                }, {
                    x: new Date(15387912e5),
                    y: [6627, 6627.62, 6584.22, 6603.02]
                }, {
                    x: new Date(1538793e6),
                    y: [6605, 6608.03, 6598.95, 6604.01]
                }, {
                    x: new Date(15387948e5),
                    y: [6604.5, 6614.4, 6602.26, 6608.02]
                }, {
                    x: new Date(15387966e5),
                    y: [6608.02, 6610.68, 6601.99, 6608.91]
                }, {
                    x: new Date(15387984e5),
                    y: [6608.91, 6618.99, 6608.01, 6612]
                }, {
                    x: new Date(15388002e5),
                    y: [6612, 6615.13, 6605.09, 6612]
                }, {
                    x: new Date(1538802e6),
                    y: [6612, 6624.12, 6608.43, 6622.95]
                }, {
                    x: new Date(15388038e5),
                    y: [6623.91, 6623.91, 6615, 6615.67]
                }, {
                    x: new Date(15388056e5),
                    y: [6618.69, 6618.74, 6610, 6610.4]
                }, {
                    x: new Date(15388074e5),
                    y: [6611, 6622.78, 6610.4, 6614.9]
                }, {
                    x: new Date(15388092e5),
                    y: [6614.9, 6626.2, 6613.33, 6623.45]
                }, {
                    x: new Date(1538811e6),
                    y: [6623.48, 6627, 6618.38, 6620.35]
                }, {
                    x: new Date(15388128e5),
                    y: [6619.43, 6620.35, 6610.05, 6615.53]
                }, {
                    x: new Date(15388146e5),
                    y: [6615.53, 6617.93, 6610, 6615.19]
                }, {
                    x: new Date(15388164e5),
                    y: [6615.19, 6621.6, 6608.2, 6620]
                }, {
                    x: new Date(15388182e5),
                    y: [6619.54, 6625.17, 6614.15, 6620]
                }, {
                    x: new Date(153882e7),
                    y: [6620.33, 6634.15, 6617.24, 6624.61]
                }, {
                    x: new Date(15388218e5),
                    y: [6625.95, 6626, 6611.66, 6617.58]
                }, {
                    x: new Date(15388236e5),
                    y: [6619, 6625.97, 6595.27, 6598.86]
                }, {
                    x: new Date(15388254e5),
                    y: [6598.86, 6598.88, 6570, 6587.16]
                }, {
                    x: new Date(15388272e5),
                    y: [6588.86, 6600, 6580, 6593.4]
                }, {
                    x: new Date(1538829e6),
                    y: [6593.99, 6598.89, 6585, 6587.81]
                }, {
                    x: new Date(15388308e5),
                    y: [6587.81, 6592.73, 6567.14, 6578]
                }, {
                    x: new Date(15388326e5),
                    y: [6578.35, 6581.72, 6567.39, 6579]
                }, {
                    x: new Date(15388344e5),
                    y: [6579.38, 6580.92, 6566.77, 6575.96]
                }, {
                    x: new Date(15388362e5),
                    y: [6575.96, 6589, 6571.77, 6588.92]
                }, {
                    x: new Date(1538838e6),
                    y: [6588.92, 6594, 6577.55, 6589.22]
                }, {
                    x: new Date(15388398e5),
                    y: [6589.3, 6598.89, 6589.1, 6596.08]
                }, {
                    x: new Date(15388416e5),
                    y: [6597.5, 6600, 6588.39, 6596.25]
                }, {
                    x: new Date(15388434e5),
                    y: [6598.03, 6600, 6588.73, 6595.97]
                }, {
                    x: new Date(15388452e5),
                    y: [6595.97, 6602.01, 6588.17, 6602]
                }, {
                    x: new Date(1538847e6),
                    y: [6602, 6607, 6596.51, 6599.95]
                }, {
                    x: new Date(15388488e5),
                    y: [6600.63, 6601.21, 6590.39, 6591.02]
                }, {
                    x: new Date(15388506e5),
                    y: [6591.02, 6603.08, 6591, 6591]
                }, {
                    x: new Date(15388524e5),
                    y: [6591, 6601.32, 6585, 6592]
                }, {
                    x: new Date(15388542e5),
                    y: [6593.13, 6596.01, 6590, 6593.34]
                }, {
                    x: new Date(1538856e6),
                    y: [6593.34, 6604.76, 6582.63, 6593.86]
                }, {
                    x: new Date(15388578e5),
                    y: [6593.86, 6604.28, 6586.57, 6600.01]
                }, {
                    x: new Date(15388596e5),
                    y: [6601.81, 6603.21, 6592.78, 6596.25]
                }, {
                    x: new Date(15388614e5),
                    y: [6596.25, 6604.2, 6590, 6602.99]
                }, {
                    x: new Date(15388632e5),
                    y: [6602.99, 6606, 6584.99, 6587.81]
                }, {
                    x: new Date(1538865e6),
                    y: [6587.81, 6595, 6583.27, 6591.96]
                }, {
                    x: new Date(15388668e5),
                    y: [6591.97, 6596.07, 6585, 6588.39]
                }, {
                    x: new Date(15388686e5),
                    y: [6587.6, 6598.21, 6587.6, 6594.27]
                }, {
                    x: new Date(15388704e5),
                    y: [6596.44, 6601, 6590, 6596.55]
                }, {
                    x: new Date(15388722e5),
                    y: [6598.91, 6605, 6596.61, 6600.02]
                }, {
                    x: new Date(1538874e6),
                    y: [6600.55, 6605, 6589.14, 6593.01]
                }, {
                    x: new Date(15388758e5),
                    y: [6593.15, 6605, 6592, 6603.06]
                }]
            }],
            title: {
                text: "CandleStick Chart",
                align: "left"
            },
            xaxis: {
                type: "datetime"
            },
            yaxis: {
                tooltip: {
                    enabled: !0
                }
            }
        }, (n = new ApexCharts(document.querySelector("#apex-candlestick-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-bubble-chart").length) {
        function r(e, a, t) {
            for (var r = 0, o = []; r < a;) {
                var n = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min,
                    l = Math.floor(61 * Math.random()) + 15;
                o.push([e, n, l]), e += 864e5, r++
            }
            return o
        }
        o = {
            chart: {
                height: 350,
                type: "bubble"
            },
            dataLabels: {
                enabled: !1
            },
            series: [{
                name: "Product1",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 20, {
                    min: 10,
                    max: 40
                })
            }, {
                name: "Product2",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 20, {
                    min: 10,
                    max: 40
                })
            }, {
                name: "Product3",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 20, {
                    min: 10,
                    max: 40
                })
            }],
            fill: {
                type: "gradient"
            },
            colors: ["#4788ff", "#37e6b0", "#37e6b0"],
            title: {
                text: "3D Bubble Chart"
            },
            xaxis: {
                tickAmount: 12,
                type: "datetime",
                labels: {
                    rotate: 0
                }
            },
            yaxis: {
                max: 40
            },
            theme: {
                palette: "palette2"
            }
        }, (n = new ApexCharts(document.querySelector("#apex-bubble-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-scatter-chart").length) {
        o = {
            chart: {
                height: 350,
                type: "scatter",
                zoom: {
                    enabled: !0,
                    type: "xy"
                }
            },
            colors: ["#4788ff", "#ff4b4b", "#37e6b0"],
            series: [{
                name: "SAMPLE A",
                data: [
                    [16.4, 5.4],
                    [21.7, 2],
                    [10.9, 0],
                    [10.9, 8.2],
                    [16.4, 0],
                    [16.4, 1.8],
                    [13.6, .3],
                    [13.6, 0],
                    [29.9, 0],
                    [27.1, 2.3],
                    [16.4, 0],
                    [13.6, 3.7],
                    [10.9, 5.2],
                    [16.4, 6.5],
                    [10.9, 0],
                    [24.5, 7.1],
                    [10.9, 0],
                    [8.1, 4.7]
                ]
            }, {
                name: "SAMPLE B",
                data: [
                    [36.4, 13.4],
                    [1.7, 11],
                    [1.9, 9],
                    [1.9, 13.2],
                    [1.4, 7],
                    [6.4, 8.8],
                    [3.6, 4.3],
                    [1.6, 10],
                    [9.9, 2],
                    [7.1, 15],
                    [1.4, 0],
                    [3.6, 13.7],
                    [1.9, 15.2],
                    [6.4, 16.5],
                    [.9, 10],
                    [4.5, 17.1],
                    [10.9, 10],
                    [.1, 14.7]
                ]
            }, {
                name: "SAMPLE C",
                data: [
                    [21.7, 3],
                    [23.6, 3.5],
                    [28, 4],
                    [27.1, .3],
                    [16.4, 4],
                    [13.6, 0],
                    [19, 5],
                    [22.4, 3],
                    [24.5, 3],
                    [32.6, 3],
                    [27.1, 4],
                    [29.6, 6],
                    [31.6, 8],
                    [21.6, 5],
                    [20.9, 4],
                    [22.4, 0],
                    [32.6, 10.3],
                    [29.7, 20.8]
                ]
            }],
            xaxis: {
                tickAmount: 5,
                labels: {
                    formatter: function (e) {
                        return parseFloat(e).toFixed(1)
                    }
                }
            },
            yaxis: {
                tickAmount: 5
            }
        }, (n = new ApexCharts(document.querySelector("#apex-scatter-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-radialbar-chart").length) {
        o = {
            chart: {
                height: 350,
                type: "radialBar"
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: "22px"
                        },
                        value: {
                            fontSize: "16px"
                        },
                        total: {
                            show: !0,
                            label: "Total",
                            formatter: function (e) {
                                return 249
                            }
                        }
                    }
                }
            },
            series: [44, 55, 67, 83],
            labels: ["Apples", "Oranges", "Bananas", "Berries"],
            colors: ["#4788ff", "#ff4b4b", "#876cfe", "#37e6b0"]
        }, (n = new ApexCharts(document.querySelector("#apex-radialbar-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#apex-pie-chart").length) {
        o = {
            chart: {
                width: 380,
                type: "pie"
            },
            labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
            series: [44, 55, 13, 43, 22],
            colors: ["#4788ff", "#ff4b4b", "#876cfe", "#37e6b0", "#c8c8c8"],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: "bottom"
                    }
                }
            }]
        }, (n = new ApexCharts(document.querySelector("#apex-pie-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#advanced-chart").length) {
        var o = {
            series: [{
                name: "Bob",
                data: [{
                    x: "Design",
                    y: [new Date("2019-03-05").getTime(), new Date("2019-03-08").getTime()]
                }, {
                    x: "Code",
                    y: [new Date("2019-03-02").getTime(), new Date("2019-03-05").getTime()]
                }, {
                    x: "Code",
                    y: [new Date("2019-03-05").getTime(), new Date("2019-03-07").getTime()]
                }, {
                    x: "Test",
                    y: [new Date("2019-03-03").getTime(), new Date("2019-03-09").getTime()]
                }, {
                    x: "Test",
                    y: [new Date("2019-03-08").getTime(), new Date("2019-03-11").getTime()]
                }, {
                    x: "Validation",
                    y: [new Date("2019-03-11").getTime(), new Date("2019-03-16").getTime()]
                }, {
                    x: "Design",
                    y: [new Date("2019-03-01").getTime(), new Date("2019-03-03").getTime()]
                }]
            }, {
                name: "Joe",
                data: [{
                    x: "Design",
                    y: [new Date("2019-03-02").getTime(), new Date("2019-03-05").getTime()]
                }, {
                    x: "Test",
                    y: [new Date("2019-03-06").getTime(), new Date("2019-03-16").getTime()]
                }, {
                    x: "Code",
                    y: [new Date("2019-03-03").getTime(), new Date("2019-03-07").getTime()]
                }, {
                    x: "Deployment",
                    y: [new Date("2019-03-20").getTime(), new Date("2019-03-22").getTime()]
                }, {
                    x: "Design",
                    y: [new Date("2019-03-10").getTime(), new Date("2019-03-16").getTime()]
                }]
            }, {
                name: "Dan",
                data: [{
                    x: "Code",
                    y: [new Date("2019-03-10").getTime(), new Date("2019-03-17").getTime()]
                }, {
                    x: "Validation",
                    y: [new Date("2019-03-05").getTime(), new Date("2019-03-09").getTime()]
                }]
            }],
            colors: ["#4788ff", "#ff4b4b", "#37e6b0"],
            chart: {
                height: 450,
                type: "rangeBar"
            },
            plotOptions: {
                bar: {
                    horizontal: !0,
                    barHeight: "80%"
                }
            },
            xaxis: {
                type: "datetime"
            },
            stroke: {
                width: 1
            },
            fill: {
                type: "solid",
                opacity: .6
            },
            legend: {
                position: "top",
                horizontalAlign: "left"
            }
        };
        (n = new ApexCharts(document.querySelector("#advanced-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#radar-multiple-chart").length) {
        o = {
            series: [{
                name: "Series 1",
                data: [80, 50, 30, 40, 100, 20]
            }, {
                name: "Series 2",
                data: [20, 30, 40, 80, 20, 80]
            }, {
                name: "Series 3",
                data: [44, 76, 78, 13, 43, 10]
            }],
            colors: ["#4788ff", "#ff4b4b", "#37e6b0"],
            chart: {
                height: 350,
                type: "radar",
                dropShadow: {
                    enabled: !0,
                    blur: 1,
                    left: 1,
                    top: 1
                }
            },
            title: {
                text: "Radar Chart - Multi Series"
            },
            stroke: {
                width: 2
            },
            fill: {
                opacity: .1
            },
            markers: {
                size: 0
            },
            xaxis: {
                categories: ["2011", "2012", "2013", "2014", "2015", "2016"]
            }
        };
        (n = new ApexCharts(document.querySelector("#radar-multiple-chart"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#am-simple-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-simple-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#4788ff")], e.data = [{
                country: "USA",
                visits: 2025
            }, {
                country: "China",
                visits: 1882
            }, {
                country: "Japan",
                visits: 1809
            }, {
                country: "Germany",
                visits: 1322
            }, {
                country: "UK",
                visits: 1122
            }, {
                country: "France",
                visits: 1114
            }];
            var a = e.xAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "country", a.renderer.grid.template.location = 0, a.renderer.minGridDistance = 30, e.rtl = !0, a.renderer.labels.template.adapter.add("dy", (function (e, a) {
                return a.dataItem && !0 & a.dataItem.index ? e + 25 : e
            }));
            e.yAxes.push(new am4charts.ValueAxis);
            var r = e.series.push(new am4charts.ColumnSeries);
            r.dataFields.valueY = "visits", r.dataFields.categoryX = "country", r.name = "Visits", r.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]", r.columns.template.fillOpacity = .8;
            var o = r.columns.template;
            o.strokeWidth = 2, o.strokeOpacity = 1;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-columnlinr-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-columnlinr-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#4788ff")], e.exporting.menu = new am4core.ExportMenu;
            var a = e.xAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "year", a.renderer.minGridDistance = 30, e.rtl = !0;
            e.yAxes.push(new am4charts.ValueAxis);
            var r = e.series.push(new am4charts.ColumnSeries);
            r.name = "Income", r.dataFields.valueY = "income", r.dataFields.categoryX = "year", r.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]", r.columns.template.propertyFields.fillOpacity = "fillOpacity", r.columns.template.propertyFields.stroke = "stroke", r.columns.template.propertyFields.strokeWidth = "strokeWidth", r.columns.template.propertyFields.strokeDasharray = "columnDash", r.tooltip.label.textAlign = "middle";
            var o = e.series.push(new am4charts.LineSeries);
            o.name = "Expenses", o.dataFields.valueY = "expenses", o.dataFields.categoryX = "year", o.stroke = am4core.color("#4788ff"), o.strokeWidth = 3, o.propertyFields.strokeDasharray = "lineDash", o.tooltip.label.textAlign = "middle";
            var n = o.bullets.push(new am4charts.Bullet);
            n.fill = am4core.color("#fdd400"), n.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]";
            var l = n.createChild(am4core.Circle);
            l.radius = 4, l.fill = am4core.color("#fff"), l.strokeWidth = 3, e.data = [{
                year: "2009",
                income: 23.5,
                expenses: 21.1
            }, {
                year: "2010",
                income: 26.2,
                expenses: 30.5
            }, {
                year: "2011",
                income: 30.1,
                expenses: 34.9
            }, {
                year: "2012",
                income: 29.5,
                expenses: 31.1
            }, {
                year: "2013",
                income: 30.6,
                expenses: 28.2,
                lineDash: "5,5"
            }, {
                year: "2014",
                income: 34.1,
                expenses: 32.9,
                strokeWidth: 1,
                columnDash: "5,5",
                fillOpacity: .2,
                additional: "(projection)"
            }];
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-stackedcolumn-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-stackedcolumn-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#ff4b4b"), am4core.color("#37e6b0"), am4core.color("#fe721c")], e.data = [{
                year: "2016",
                europe: 2.5,
                namerica: 2.5,
                asia: 2.1,
                lamerica: .3,
                meast: .2
            }, {
                year: "2017",
                europe: 2.6,
                namerica: 2.7,
                asia: 2.2,
                lamerica: .3,
                meast: .3
            }, {
                year: "2018",
                europe: 2.8,
                namerica: 2.9,
                asia: 2.4,
                lamerica: .3,
                meast: .3
            }];
            var a = e.xAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "year", a.renderer.grid.template.location = 0;
            var r = e.yAxes.push(new am4charts.ValueAxis);

            function o(a, t) {
                var r = e.series.push(new am4charts.ColumnSeries);
                r.name = t, r.dataFields.valueY = a, r.dataFields.categoryX = "year", r.sequencedInterpolation = !0, r.stacked = !0, e.rtl = !0, r.columns.template.width = am4core.percent(60), r.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";
                var o = r.bullets.push(new am4charts.LabelBullet);
                return o.label.text = "{valueY}", o.locationY = .5, r
            }
            r.renderer.inside = !0, r.renderer.labels.template.disabled = !0, r.min = 0, o("europe", "Europe"), o("namerica", "North America"), o("asia", "Asia-Pacific"), e.legend = new am4charts.Legend;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-barline-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-barline-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#4788ff"), am4core.color("#37e6b0")], e.data = [{
                year: "2005",
                income: 23.5,
                expenses: 18.1
            }, {
                year: "2006",
                income: 26.2,
                expenses: 22.8
            }, {
                year: "2007",
                income: 30.1,
                expenses: 23.9
            }, {
                year: "2008",
                income: 29.5,
                expenses: 25.1
            }, {
                year: "2009",
                income: 24.6,
                expenses: 25
            }];
            var a = e.yAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "year", a.renderer.inversed = !0, a.renderer.grid.template.location = 0, e.rtl = !0, e.xAxes.push(new am4charts.ValueAxis).renderer.opposite = !0;
            var r = e.series.push(new am4charts.ColumnSeries);
            r.dataFields.categoryY = "year", r.dataFields.valueX = "income", r.name = "Income", r.columns.template.fillOpacity = .5, r.columns.template.strokeOpacity = 0, r.tooltipText = "Income in {categoryY}: {valueX.value}";
            var o = e.series.push(new am4charts.LineSeries);
            o.dataFields.categoryY = "year", o.dataFields.valueX = "expenses", o.name = "Expenses", o.strokeWidth = 3, o.tooltipText = "Expenses in {categoryY}: {valueX.value}";
            var n = o.bullets.push(new am4charts.CircleBullet);
            n.circle.fill = am4core.color("#fff"), n.circle.strokeWidth = 2, e.cursor = new am4charts.XYCursor, e.cursor.behavior = "zoomY", e.legend = new am4charts.Legend;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-datedata-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-datedata-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#57aeff")], e.data = [{
                date: "2012-07-27",
                value: 13
            }, {
                date: "2012-07-28",
                value: 11
            }, {
                date: "2012-07-29",
                value: 15
            }, {
                date: "2012-07-30",
                value: 16
            }, {
                date: "2012-07-31",
                value: 18
            }, {
                date: "2012-08-01",
                value: 13
            }, {
                date: "2012-08-02",
                value: 22
            }, {
                date: "2012-08-03",
                value: 23
            }, {
                date: "2012-08-04",
                value: 20
            }, {
                date: "2012-08-05",
                value: 17
            }, {
                date: "2012-08-06",
                value: 16
            }, {
                date: "2012-08-07",
                value: 18
            }, {
                date: "2012-08-08",
                value: 21
            }, {
                date: "2012-08-09",
                value: 26
            }, {
                date: "2012-08-10",
                value: 24
            }, {
                date: "2012-08-11",
                value: 29
            }, {
                date: "2012-08-12",
                value: 32
            }, {
                date: "2012-08-13",
                value: 18
            }, {
                date: "2012-08-14",
                value: 24
            }, {
                date: "2012-08-15",
                value: 22
            }, {
                date: "2012-08-16",
                value: 18
            }, {
                date: "2012-08-17",
                value: 19
            }, {
                date: "2012-08-18",
                value: 14
            }, {
                date: "2012-08-19",
                value: 15
            }, {
                date: "2012-08-20",
                value: 12
            }, {
                date: "2012-08-21",
                value: 8
            }, {
                date: "2012-08-22",
                value: 9
            }, {
                date: "2012-08-23",
                value: 8
            }, {
                date: "2012-08-24",
                value: 7
            }, {
                date: "2012-08-25",
                value: 5
            }, {
                date: "2012-08-26",
                value: 11
            }, {
                date: "2012-08-27",
                value: 13
            }, {
                date: "2012-08-28",
                value: 18
            }, {
                date: "2012-08-29",
                value: 20
            }, {
                date: "2012-08-30",
                value: 29
            }, {
                date: "2012-08-31",
                value: 33
            }, {
                date: "2012-09-01",
                value: 42
            }, {
                date: "2012-09-02",
                value: 35
            }, {
                date: "2012-09-03",
                value: 31
            }, {
                date: "2012-09-04",
                value: 47
            }, {
                date: "2012-09-05",
                value: 52
            }, {
                date: "2012-09-06",
                value: 46
            }, {
                date: "2012-09-07",
                value: 41
            }, {
                date: "2012-09-08",
                value: 43
            }, {
                date: "2012-09-09",
                value: 40
            }, {
                date: "2012-09-10",
                value: 39
            }, {
                date: "2012-09-11",
                value: 34
            }, {
                date: "2012-09-12",
                value: 29
            }, {
                date: "2012-09-13",
                value: 34
            }, {
                date: "2012-09-14",
                value: 37
            }, {
                date: "2012-09-15",
                value: 42
            }, {
                date: "2012-09-16",
                value: 49
            }, {
                date: "2012-09-17",
                value: 46
            }, {
                date: "2012-09-18",
                value: 47
            }, {
                date: "2012-09-19",
                value: 55
            }, {
                date: "2012-09-20",
                value: 59
            }, {
                date: "2012-09-21",
                value: 58
            }, {
                date: "2012-09-22",
                value: 57
            }, {
                date: "2012-09-23",
                value: 61
            }, {
                date: "2012-09-24",
                value: 59
            }, {
                date: "2012-09-25",
                value: 67
            }, {
                date: "2012-09-26",
                value: 65
            }, {
                date: "2012-09-27",
                value: 61
            }, {
                date: "2012-09-28",
                value: 66
            }, {
                date: "2012-09-29",
                value: 69
            }, {
                date: "2012-09-30",
                value: 71
            }, {
                date: "2012-10-01",
                value: 67
            }, {
                date: "2012-10-02",
                value: 63
            }, {
                date: "2012-10-03",
                value: 46
            }, {
                date: "2012-10-04",
                value: 32
            }, {
                date: "2012-10-05",
                value: 21
            }, {
                date: "2012-10-06",
                value: 18
            }, {
                date: "2012-10-07",
                value: 21
            }, {
                date: "2012-10-08",
                value: 28
            }, {
                date: "2012-10-09",
                value: 27
            }, {
                date: "2012-10-10",
                value: 36
            }, {
                date: "2012-10-11",
                value: 33
            }, {
                date: "2012-10-12",
                value: 31
            }, {
                date: "2012-10-13",
                value: 30
            }, {
                date: "2012-10-14",
                value: 34
            }, {
                date: "2012-10-15",
                value: 38
            }, {
                date: "2012-10-16",
                value: 37
            }, {
                date: "2012-10-17",
                value: 44
            }, {
                date: "2012-10-18",
                value: 49
            }, {
                date: "2012-10-19",
                value: 53
            }, {
                date: "2012-10-20",
                value: 57
            }, {
                date: "2012-10-21",
                value: 60
            }, {
                date: "2012-10-22",
                value: 61
            }, {
                date: "2012-10-23",
                value: 69
            }, {
                date: "2012-10-24",
                value: 67
            }, {
                date: "2012-10-25",
                value: 72
            }, {
                date: "2012-10-26",
                value: 77
            }, {
                date: "2012-10-27",
                value: 75
            }, {
                date: "2012-10-28",
                value: 70
            }, {
                date: "2012-10-29",
                value: 72
            }, {
                date: "2012-10-30",
                value: 70
            }, {
                date: "2012-10-31",
                value: 72
            }, {
                date: "2012-11-01",
                value: 73
            }, {
                date: "2012-11-02",
                value: 67
            }, {
                date: "2012-11-03",
                value: 68
            }, {
                date: "2012-11-04",
                value: 65
            }, {
                date: "2012-11-05",
                value: 71
            }, {
                date: "2012-11-06",
                value: 75
            }, {
                date: "2012-11-07",
                value: 74
            }, {
                date: "2012-11-08",
                value: 71
            }, {
                date: "2012-11-09",
                value: 76
            }, {
                date: "2012-11-10",
                value: 77
            }, {
                date: "2012-11-11",
                value: 81
            }, {
                date: "2012-11-12",
                value: 83
            }, {
                date: "2012-11-13",
                value: 80
            }, {
                date: "2012-11-14",
                value: 81
            }, {
                date: "2012-11-15",
                value: 87
            }, {
                date: "2012-11-16",
                value: 82
            }, {
                date: "2012-11-17",
                value: 86
            }, {
                date: "2012-11-18",
                value: 80
            }, {
                date: "2012-11-19",
                value: 87
            }, {
                date: "2012-11-20",
                value: 83
            }, {
                date: "2012-11-21",
                value: 85
            }, {
                date: "2012-11-22",
                value: 84
            }, {
                date: "2012-11-23",
                value: 82
            }, {
                date: "2012-11-24",
                value: 73
            }, {
                date: "2012-11-25",
                value: 71
            }, {
                date: "2012-11-26",
                value: 75
            }, {
                date: "2012-11-27",
                value: 79
            }, {
                date: "2012-11-28",
                value: 70
            }, {
                date: "2012-11-29",
                value: 73
            }, {
                date: "2012-11-30",
                value: 61
            }, {
                date: "2012-12-01",
                value: 62
            }, {
                date: "2012-12-02",
                value: 66
            }, {
                date: "2012-12-03",
                value: 65
            }, {
                date: "2012-12-04",
                value: 73
            }, {
                date: "2012-12-05",
                value: 79
            }, {
                date: "2012-12-06",
                value: 78
            }, {
                date: "2012-12-07",
                value: 78
            }, {
                date: "2012-12-08",
                value: 78
            }, {
                date: "2012-12-09",
                value: 74
            }, {
                date: "2012-12-10",
                value: 73
            }, {
                date: "2012-12-11",
                value: 75
            }, {
                date: "2012-12-12",
                value: 70
            }, {
                date: "2012-12-13",
                value: 77
            }, {
                date: "2012-12-14",
                value: 67
            }, {
                date: "2012-12-15",
                value: 62
            }, {
                date: "2012-12-16",
                value: 64
            }, {
                date: "2012-12-17",
                value: 61
            }, {
                date: "2012-12-18",
                value: 59
            }, {
                date: "2012-12-19",
                value: 53
            }, {
                date: "2012-12-20",
                value: 54
            }, {
                date: "2012-12-21",
                value: 56
            }, {
                date: "2012-12-22",
                value: 59
            }, {
                date: "2012-12-23",
                value: 58
            }, {
                date: "2012-12-24",
                value: 55
            }, {
                date: "2012-12-25",
                value: 52
            }, {
                date: "2012-12-26",
                value: 54
            }, {
                date: "2012-12-27",
                value: 50
            }, {
                date: "2012-12-28",
                value: 50
            }, {
                date: "2012-12-29",
                value: 51
            }, {
                date: "2012-12-30",
                value: 52
            }, {
                date: "2012-12-31",
                value: 58
            }, {
                date: "2013-01-01",
                value: 60
            }, {
                date: "2013-01-02",
                value: 67
            }, {
                date: "2013-01-03",
                value: 64
            }, {
                date: "2013-01-04",
                value: 66
            }, {
                date: "2013-01-05",
                value: 60
            }, {
                date: "2013-01-06",
                value: 63
            }, {
                date: "2013-01-07",
                value: 61
            }, {
                date: "2013-01-08",
                value: 60
            }, {
                date: "2013-01-09",
                value: 65
            }, {
                date: "2013-01-10",
                value: 75
            }, {
                date: "2013-01-11",
                value: 77
            }, {
                date: "2013-01-12",
                value: 78
            }, {
                date: "2013-01-13",
                value: 70
            }, {
                date: "2013-01-14",
                value: 70
            }, {
                date: "2013-01-15",
                value: 73
            }, {
                date: "2013-01-16",
                value: 71
            }, {
                date: "2013-01-17",
                value: 74
            }, {
                date: "2013-01-18",
                value: 78
            }, {
                date: "2013-01-19",
                value: 85
            }, {
                date: "2013-01-20",
                value: 82
            }, {
                date: "2013-01-21",
                value: 83
            }, {
                date: "2013-01-22",
                value: 88
            }, {
                date: "2013-01-23",
                value: 85
            }, {
                date: "2013-01-24",
                value: 85
            }, {
                date: "2013-01-25",
                value: 80
            }, {
                date: "2013-01-26",
                value: 87
            }, {
                date: "2013-01-27",
                value: 84
            }, {
                date: "2013-01-28",
                value: 83
            }, {
                date: "2013-01-29",
                value: 84
            }, {
                date: "2013-01-30",
                value: 81
            }], e.dateFormatter.inputDateFormat = "yyyy-MM-dd";
            var a = e.xAxes.push(new am4charts.DateAxis),
                r = (e.yAxes.push(new am4charts.ValueAxis), e.series.push(new am4charts.LineSeries));
            r.dataFields.valueY = "value", r.dataFields.dateX = "date", r.tooltipText = "{value}", r.strokeWidth = 2, r.minBulletDistance = 15, r.tooltip.background.cornerRadius = 20, r.tooltip.background.strokeOpacity = 0, r.tooltip.pointerOrientation = "vertical", r.tooltip.label.minWidth = 40, r.tooltip.label.minHeight = 40, r.tooltip.label.textAlign = "middle", r.tooltip.label.textValign = "middle";
            var o = r.bullets.push(new am4charts.CircleBullet);
            o.circle.strokeWidth = 2, o.circle.radius = 4, o.circle.fill = am4core.color("#fff"), o.states.create("hover").properties.scale = 1.3, e.cursor = new am4charts.XYCursor, e.cursor.behavior = "panXY", e.cursor.xAxis = a, e.cursor.snapToSeries = r, e.scrollbarY = new am4core.Scrollbar, e.scrollbarY.parent = e.leftAxesContainer, e.scrollbarY.toBack(), e.scrollbarX = new am4charts.XYChartScrollbar, e.scrollbarX.series.push(r), e.scrollbarX.parent = e.bottomAxesContainer, a.start = .79, a.keepSelection = !0, e.rtl = !0;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-linescrollzomm-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-linescrollzomm-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#57aeff")], e.data = function () {
                var e = [],
                    a = new Date;
                a.setDate(a.getDate() - 1e3);
                for (var t = 1200, r = 0; r < 500; r++) {
                    var o = new Date(a);
                    o.setDate(o.getDate() + r), t += Math.round((Math.random() < .5 ? 1 : -1) * Math.random() * 10), e.push({
                        date: o,
                        visits: t
                    })
                }
                return e
            }();
            var a = e.xAxes.push(new am4charts.DateAxis);
            a.renderer.minGridDistance = 50;
            e.yAxes.push(new am4charts.ValueAxis);
            var r = e.series.push(new am4charts.LineSeries);
            r.dataFields.valueY = "visits", r.dataFields.dateX = "date", r.strokeWidth = 2, r.minBulletDistance = 10, r.tooltipText = "{valueY}", r.tooltip.pointerOrientation = "vertical", r.tooltip.background.cornerRadius = 20, r.tooltip.background.fillOpacity = .5, r.tooltip.label.padding(12, 12, 12, 12), e.rtl = !0, e.scrollbarX = new am4charts.XYChartScrollbar, e.scrollbarX.series.push(r), e.cursor = new am4charts.XYCursor, e.cursor.xAxis = a, e.cursor.snapToSeries = r;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-zoomable-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-zoomable-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#57aeff")], e.data = [{
                date: "2012-07-27",
                value: 13
            }, {
                date: "2012-07-28",
                value: 11
            }, {
                date: "2012-07-29",
                value: 15
            }, {
                date: "2012-07-30",
                value: 16
            }, {
                date: "2012-07-31",
                value: 18
            }, {
                date: "2012-08-01",
                value: 13
            }, {
                date: "2012-08-02",
                value: 22
            }, {
                date: "2012-08-03",
                value: 23
            }, {
                date: "2012-08-04",
                value: 20
            }, {
                date: "2012-08-05",
                value: 17
            }, {
                date: "2012-08-06",
                value: 16
            }, {
                date: "2012-08-07",
                value: 18
            }, {
                date: "2012-08-08",
                value: 21
            }, {
                date: "2012-08-09",
                value: 26
            }, {
                date: "2012-08-10",
                value: 24
            }, {
                date: "2012-08-11",
                value: 29
            }, {
                date: "2012-08-12",
                value: 32
            }, {
                date: "2012-08-13",
                value: 18
            }, {
                date: "2012-08-14",
                value: 24
            }, {
                date: "2012-08-15",
                value: 22
            }, {
                date: "2012-08-16",
                value: 18
            }, {
                date: "2012-08-17",
                value: 19
            }, {
                date: "2012-08-18",
                value: 14
            }, {
                date: "2012-08-19",
                value: 15
            }, {
                date: "2012-08-20",
                value: 12
            }, {
                date: "2012-08-21",
                value: 8
            }, {
                date: "2012-08-22",
                value: 9
            }, {
                date: "2012-08-23",
                value: 8
            }, {
                date: "2012-08-24",
                value: 7
            }, {
                date: "2012-08-25",
                value: 5
            }, {
                date: "2012-08-26",
                value: 11
            }, {
                date: "2012-08-27",
                value: 13
            }, {
                date: "2012-08-28",
                value: 18
            }, {
                date: "2012-08-29",
                value: 20
            }, {
                date: "2012-08-30",
                value: 29
            }, {
                date: "2012-08-31",
                value: 33
            }, {
                date: "2012-09-01",
                value: 42
            }, {
                date: "2012-09-02",
                value: 35
            }, {
                date: "2012-09-03",
                value: 31
            }, {
                date: "2012-09-04",
                value: 47
            }, {
                date: "2012-09-05",
                value: 52
            }, {
                date: "2012-09-06",
                value: 46
            }, {
                date: "2012-09-07",
                value: 41
            }, {
                date: "2012-09-08",
                value: 43
            }, {
                date: "2012-09-09",
                value: 40
            }, {
                date: "2012-09-10",
                value: 39
            }, {
                date: "2012-09-11",
                value: 34
            }, {
                date: "2012-09-12",
                value: 29
            }, {
                date: "2012-09-13",
                value: 34
            }, {
                date: "2012-09-14",
                value: 37
            }, {
                date: "2012-09-15",
                value: 42
            }, {
                date: "2012-09-16",
                value: 49
            }, {
                date: "2012-09-17",
                value: 46
            }, {
                date: "2012-09-18",
                value: 47
            }, {
                date: "2012-09-19",
                value: 55
            }, {
                date: "2012-09-20",
                value: 59
            }, {
                date: "2012-09-21",
                value: 58
            }, {
                date: "2012-09-22",
                value: 57
            }, {
                date: "2012-09-23",
                value: 61
            }, {
                date: "2012-09-24",
                value: 59
            }, {
                date: "2012-09-25",
                value: 67
            }, {
                date: "2012-09-26",
                value: 65
            }, {
                date: "2012-09-27",
                value: 61
            }, {
                date: "2012-09-28",
                value: 66
            }, {
                date: "2012-09-29",
                value: 69
            }, {
                date: "2012-09-30",
                value: 71
            }, {
                date: "2012-10-01",
                value: 67
            }, {
                date: "2012-10-02",
                value: 63
            }, {
                date: "2012-10-03",
                value: 46
            }, {
                date: "2012-10-04",
                value: 32
            }, {
                date: "2012-10-05",
                value: 21
            }, {
                date: "2012-10-06",
                value: 18
            }, {
                date: "2012-10-07",
                value: 21
            }, {
                date: "2012-10-08",
                value: 28
            }, {
                date: "2012-10-09",
                value: 27
            }, {
                date: "2012-10-10",
                value: 36
            }, {
                date: "2012-10-11",
                value: 33
            }, {
                date: "2012-10-12",
                value: 31
            }, {
                date: "2012-10-13",
                value: 30
            }, {
                date: "2012-10-14",
                value: 34
            }, {
                date: "2012-10-15",
                value: 38
            }, {
                date: "2012-10-16",
                value: 37
            }, {
                date: "2012-10-17",
                value: 44
            }, {
                date: "2012-10-18",
                value: 49
            }, {
                date: "2012-10-19",
                value: 53
            }, {
                date: "2012-10-20",
                value: 57
            }, {
                date: "2012-10-21",
                value: 60
            }, {
                date: "2012-10-22",
                value: 61
            }, {
                date: "2012-10-23",
                value: 69
            }, {
                date: "2012-10-24",
                value: 67
            }, {
                date: "2012-10-25",
                value: 72
            }, {
                date: "2012-10-26",
                value: 77
            }, {
                date: "2012-10-27",
                value: 75
            }, {
                date: "2012-10-28",
                value: 70
            }, {
                date: "2012-10-29",
                value: 72
            }, {
                date: "2012-10-30",
                value: 70
            }, {
                date: "2012-10-31",
                value: 72
            }, {
                date: "2012-11-01",
                value: 73
            }, {
                date: "2012-11-02",
                value: 67
            }, {
                date: "2012-11-03",
                value: 68
            }, {
                date: "2012-11-04",
                value: 65
            }, {
                date: "2012-11-05",
                value: 71
            }, {
                date: "2012-11-06",
                value: 75
            }, {
                date: "2012-11-07",
                value: 74
            }, {
                date: "2012-11-08",
                value: 71
            }, {
                date: "2012-11-09",
                value: 76
            }, {
                date: "2012-11-10",
                value: 77
            }, {
                date: "2012-11-11",
                value: 81
            }, {
                date: "2012-11-12",
                value: 83
            }, {
                date: "2012-11-13",
                value: 80
            }, {
                date: "2012-11-18",
                value: 80
            }, {
                date: "2012-11-19",
                value: 87
            }, {
                date: "2012-11-20",
                value: 83
            }, {
                date: "2012-11-21",
                value: 85
            }, {
                date: "2012-11-22",
                value: 84
            }, {
                date: "2012-11-23",
                value: 82
            }, {
                date: "2012-11-24",
                value: 73
            }, {
                date: "2012-11-25",
                value: 71
            }, {
                date: "2012-11-26",
                value: 75
            }, {
                date: "2012-11-27",
                value: 79
            }, {
                date: "2012-11-28",
                value: 70
            }, {
                date: "2012-11-29",
                value: 73
            }, {
                date: "2012-11-30",
                value: 61
            }, {
                date: "2012-12-01",
                value: 62
            }, {
                date: "2012-12-02",
                value: 66
            }, {
                date: "2012-12-03",
                value: 65
            }, {
                date: "2012-12-04",
                value: 73
            }, {
                date: "2012-12-05",
                value: 79
            }, {
                date: "2012-12-06",
                value: 78
            }, {
                date: "2012-12-07",
                value: 78
            }, {
                date: "2012-12-08",
                value: 78
            }, {
                date: "2012-12-09",
                value: 74
            }, {
                date: "2012-12-10",
                value: 73
            }, {
                date: "2012-12-11",
                value: 75
            }, {
                date: "2012-12-12",
                value: 70
            }, {
                date: "2012-12-13",
                value: 77
            }, {
                date: "2012-12-14",
                value: 67
            }, {
                date: "2012-12-15",
                value: 62
            }, {
                date: "2012-12-16",
                value: 64
            }, {
                date: "2012-12-17",
                value: 61
            }, {
                date: "2012-12-18",
                value: 59
            }, {
                date: "2012-12-19",
                value: 53
            }, {
                date: "2012-12-20",
                value: 54
            }, {
                date: "2012-12-21",
                value: 56
            }, {
                date: "2012-12-22",
                value: 59
            }, {
                date: "2012-12-23",
                value: 58
            }, {
                date: "2012-12-24",
                value: 55
            }, {
                date: "2012-12-25",
                value: 52
            }, {
                date: "2012-12-26",
                value: 54
            }, {
                date: "2012-12-27",
                value: 50
            }, {
                date: "2012-12-28",
                value: 50
            }, {
                date: "2012-12-29",
                value: 51
            }, {
                date: "2012-12-30",
                value: 52
            }, {
                date: "2012-12-31",
                value: 58
            }, {
                date: "2013-01-01",
                value: 60
            }, {
                date: "2013-01-02",
                value: 67
            }, {
                date: "2013-01-03",
                value: 64
            }, {
                date: "2013-01-04",
                value: 66
            }, {
                date: "2013-01-05",
                value: 60
            }, {
                date: "2013-01-06",
                value: 63
            }, {
                date: "2013-01-07",
                value: 61
            }, {
                date: "2013-01-08",
                value: 60
            }, {
                date: "2013-01-09",
                value: 65
            }, {
                date: "2013-01-10",
                value: 75
            }, {
                date: "2013-01-11",
                value: 77
            }, {
                date: "2013-01-12",
                value: 78
            }, {
                date: "2013-01-13",
                value: 70
            }, {
                date: "2013-01-14",
                value: 70
            }, {
                date: "2013-01-15",
                value: 73
            }, {
                date: "2013-01-16",
                value: 71
            }, {
                date: "2013-01-17",
                value: 74
            }, {
                date: "2013-01-18",
                value: 78
            }, {
                date: "2013-01-19",
                value: 85
            }, {
                date: "2013-01-20",
                value: 82
            }, {
                date: "2013-01-21",
                value: 83
            }, {
                date: "2013-01-22",
                value: 88
            }, {
                date: "2013-01-23",
                value: 85
            }, {
                date: "2013-01-24",
                value: 85
            }, {
                date: "2013-01-25",
                value: 80
            }, {
                date: "2013-01-26",
                value: 87
            }, {
                date: "2013-01-27",
                value: 84
            }, {
                date: "2013-01-28",
                value: 83
            }, {
                date: "2013-01-29",
                value: 84
            }, {
                date: "2013-01-30",
                value: 81
            }];
            var a = e.xAxes.push(new am4charts.DateAxis);
            a.renderer.grid.template.location = 0, a.renderer.minGridDistance = 50;
            e.yAxes.push(new am4charts.ValueAxis);
            var r = e.series.push(new am4charts.LineSeries);
            r.dataFields.valueY = "value", r.dataFields.dateX = "date", r.strokeWidth = 3, r.fillOpacity = .5, e.rtl = !0, e.scrollbarY = new am4core.Scrollbar, e.scrollbarY.marginLeft = 0, e.cursor = new am4charts.XYCursor, e.cursor.behavior = "zoomY", e.cursor.lineX.disabled = !0;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-radar-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-radar-chart", am4charts.RadarChart);
            e.colors.list = [am4core.color("#4788ff")], e.data = [{
                country: "Lithuania",
                litres: 501
            }, {
                country: "Czechia",
                litres: 301
            }, {
                country: "Ireland",
                litres: 266
            }, {
                country: "Germany",
                litres: 165
            }, {
                country: "Australia",
                litres: 139
            }, {
                country: "Austria",
                litres: 336
            }, {
                country: "UK",
                litres: 290
            }, {
                country: "Belgium",
                litres: 325
            }, {
                country: "The Netherlands",
                litres: 40
            }], e.xAxes.push(new am4charts.CategoryAxis).dataFields.category = "country";
            var a = e.yAxes.push(new am4charts.ValueAxis);
            a.renderer.axisFills.template.fill = e.colors.getIndex(2), a.renderer.axisFills.template.fillOpacity = .05, e.rtl = !0;
            var r = e.series.push(new am4charts.RadarSeries);
            r.dataFields.valueY = "litres", r.dataFields.categoryX = "country", r.name = "Sales", r.strokeWidth = 3;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-polar-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-polar-chart", am4charts.RadarChart);
            e.data = [{
                direction: "N",
                value: 8
            }, {
                direction: "NE",
                value: 9
            }, {
                direction: "E",
                value: 4.5
            }, {
                direction: "SE",
                value: 3.5
            }, {
                direction: "S",
                value: 9.2
            }, {
                direction: "SW",
                value: 8.4
            }, {
                direction: "W",
                value: 11.1
            }, {
                direction: "NW",
                value: 10
            }];
            var a = e.xAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "direction";
            e.yAxes.push(new am4charts.ValueAxis);
            var r = a.axisRanges.create();
            r.category = "NW", r.endCategory = "NW", r.axisFill.fill = am4core.color("#4788ff"), r.axisFill.fillOpacity = .3;
            var o = a.axisRanges.create();
            o.category = "N", o.endCategory = "N", o.axisFill.fill = am4core.color("#ff4b4b"), o.axisFill.fillOpacity = .3;
            var n = a.axisRanges.create();
            n.category = "SE", n.endCategory = "SW", n.axisFill.fill = am4core.color("#37e6b0"), n.axisFill.fillOpacity = .3, n.locations.endCategory = 0;
            var l = e.series.push(new am4charts.RadarSeries);
            l.dataFields.valueY = "value", l.dataFields.categoryX = "direction", l.name = "Wind direction", l.strokeWidth = 3, l.fillOpacity = .2, e.rtl = !0;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-polarscatter-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-polarscatter-chart", am4charts.RadarChart);
            e.colors.list = [am4core.color("#4788ff"), am4core.color("#fe721c"), am4core.color("#37e6b0")], e.data = [{
                country: "Lithuania",
                litres: 501,
                units: 250
            }, {
                country: "Czech Republic",
                litres: 301,
                units: 222
            }, {
                country: "Ireland",
                litres: 266,
                units: 179
            }, {
                country: "Germany",
                litres: 165,
                units: 298
            }, {
                country: "Australia",
                litres: 139,
                units: 299
            }], e.xAxes.push(new am4charts.ValueAxis).renderer.maxLabelPosition = .99;
            var a = e.yAxes.push(new am4charts.ValueAxis);
            a.renderer.labels.template.verticalCenter = "bottom", a.renderer.labels.template.horizontalCenter = "right", a.renderer.maxLabelPosition = .99, a.renderer.labels.template.paddingBottom = 1, a.renderer.labels.template.paddingRight = 3, e.rtl = !0;
            var r = e.series.push(new am4charts.RadarSeries);
            r.bullets.push(new am4charts.CircleBullet), r.strokeOpacity = 0, r.dataFields.valueX = "x", r.dataFields.valueY = "y", r.name = "Series #1", r.sequencedInterpolation = !0, r.sequencedInterpolationDelay = 10, r.data = [{
                x: 83,
                y: 5.1
            }, {
                x: 44,
                y: 5.8
            }, {
                x: 76,
                y: 9
            }, {
                x: 2,
                y: 1.4
            }, {
                x: 100,
                y: 8.3
            }, {
                x: 96,
                y: 1.7
            }, {
                x: 68,
                y: 3.9
            }, {
                x: 0,
                y: 3
            }, {
                x: 100,
                y: 4.1
            }, {
                x: 16,
                y: 5.5
            }, {
                x: 71,
                y: 6.8
            }, {
                x: 100,
                y: 7.9
            }, {
                x: 35,
                y: 8
            }, {
                x: 44,
                y: 6
            }, {
                x: 64,
                y: .7
            }, {
                x: 53,
                y: 3.3
            }, {
                x: 92,
                y: 4.1
            }, {
                x: 43,
                y: 7.3
            }, {
                x: 15,
                y: 7.5
            }, {
                x: 43,
                y: 4.3
            }, {
                x: 90,
                y: 9.9
            }];
            var o = e.series.push(new am4charts.RadarSeries);
            o.bullets.push(new am4charts.CircleBullet), o.strokeOpacity = 0, o.dataFields.valueX = "x", o.dataFields.valueY = "y", o.name = "Series #2", o.sequencedInterpolation = !0, o.sequencedInterpolationDelay = 10, o.data = [{
                x: 178,
                y: 1.3
            }, {
                x: 129,
                y: 3.4
            }, {
                x: 99,
                y: 2.4
            }, {
                x: 80,
                y: 9.9
            }, {
                x: 118,
                y: 9.4
            }, {
                x: 103,
                y: 8.7
            }, {
                x: 91,
                y: 4.2
            }, {
                x: 151,
                y: 1.2
            }, {
                x: 168,
                y: 5.2
            }, {
                x: 168,
                y: 1.6
            }, {
                x: 152,
                y: 1.2
            }, {
                x: 138,
                y: 7.7
            }, {
                x: 107,
                y: 3.9
            }, {
                x: 124,
                y: .7
            }, {
                x: 130,
                y: 2.6
            }, {
                x: 86,
                y: 9.2
            }, {
                x: 169,
                y: 7.5
            }, {
                x: 122,
                y: 9.9
            }, {
                x: 100,
                y: 3.8
            }, {
                x: 172,
                y: 4.1
            }, {
                x: 140,
                y: 7.3
            }, {
                x: 161,
                y: 2.3
            }, {
                x: 141,
                y: .9
            }];
            var n = e.series.push(new am4charts.RadarSeries);
            n.bullets.push(new am4charts.CircleBullet), n.strokeOpacity = 0, n.dataFields.valueX = "x", n.dataFields.valueY = "y", n.name = "Series #3", n.sequencedInterpolation = !0, n.sequencedInterpolationDelay = 10, n.data = [{
                x: 419,
                y: 4.9
            }, {
                x: 417,
                y: 5.5
            }, {
                x: 434,
                y: .1
            }, {
                x: 344,
                y: 2.5
            }, {
                x: 279,
                y: 7.5
            }, {
                x: 307,
                y: 8.4
            }, {
                x: 279,
                y: 9
            }, {
                x: 220,
                y: 8.4
            }, {
                x: 201,
                y: 9.7
            }, {
                x: 288,
                y: 1.2
            }, {
                x: 333,
                y: 7.4
            }, {
                x: 308,
                y: 1.9
            }, {
                x: 330,
                y: 8
            }, {
                x: 408,
                y: 1.7
            }, {
                x: 274,
                y: .8
            }, {
                x: 296,
                y: 3.1
            }, {
                x: 279,
                y: 4.3
            }, {
                x: 379,
                y: 5.6
            }, {
                x: 175,
                y: 6.8
            }], e.legend = new am4charts.Legend, e.cursor = new am4charts.RadarCursor;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-3dpie-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-3dpie-chart", am4charts.PieChart3D);
            e.hiddenState.properties.opacity = 0, e.legend = new am4charts.Legend, e.data = [{
                country: "Lithuania",
                litres: 501.9,
                fill: "red"
            }, {
                country: "Germany",
                litres: 165.8
            }, {
                country: "Australia",
                litres: 139.9
            }, {
                country: "Austria",
                litres: 128.3
            }, {
                country: "UK",
                litres: 99
            }, {
                country: "Belgium",
                litres: 60
            }];
            var a = e.series.push(new am4charts.PieSeries3D);
            a.colors.list = [am4core.color("#4788ff"), am4core.color("#37e6b0"), am4core.color("#ff4b4b"), am4core.color("#fe721c"), am4core.color("#876cfe"), am4core.color("#01041b")], a.dataFields.value = "litres", a.dataFields.category = "country", e.rtl = !0;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#am-layeredcolumn-chart").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("am-layeredcolumn-chart", am4charts.XYChart);
            e.colors.list = [am4core.color("#37e6b0"), am4core.color("#4788ff")], e.numberFormatter.numberFormat = "#.#'%'", e.data = [{
                country: "USA",
                year2004: 3.5,
                year2005: 4.2
            }, {
                country: "UK",
                year2004: 1.7,
                year2005: 3.1
            }, {
                country: "Canada",
                year2004: 2.8,
                year2005: 2.9
            }, {
                country: "Japan",
                year2004: 2.6,
                year2005: 2.3
            }, {
                country: "France",
                year2004: 1.4,
                year2005: 2.1
            }, {
                country: "Brazil",
                year2004: 2.6,
                year2005: 4.9
            }];
            var a = e.xAxes.push(new am4charts.CategoryAxis);
            a.dataFields.category = "country", a.renderer.grid.template.location = 0, a.renderer.minGridDistance = 30;
            var r = e.yAxes.push(new am4charts.ValueAxis);
            r.title.text = "GDP growth rate", r.title.fontWeight = 800;
            var o = e.series.push(new am4charts.ColumnSeries);
            o.dataFields.valueY = "year2004", o.dataFields.categoryX = "country", o.clustered = !1, o.tooltipText = "GDP grow in {categoryX} (2004): [bold]{valueY}[/]";
            var n = e.series.push(new am4charts.ColumnSeries);
            n.dataFields.valueY = "year2005", n.dataFields.categoryX = "country", n.clustered = !1, n.columns.template.width = am4core.percent(50), n.tooltipText = "GDP grow in {categoryX} (2005): [bold]{valueY}[/]", e.cursor = new am4charts.XYCursor, e.cursor.lineX.disabled = !0, e.cursor.lineY.disabled = !0, e.rtl = !0;
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#morris-line-chart").length && new Morris.Line({
            element: "morris-line-chart",
            data: [{
                year: "2008",
                value: 20
            }, {
                year: "2009",
                value: 10
            }, {
                year: "2010",
                value: 5
            }, {
                year: "2011",
                value: 5
            }, {
                year: "2012",
                value: 20
            }],
            xkey: "year",
            ykeys: ["value"],
            labels: ["Value"],
            lineColors: ["#4788ff"]
        }), e("#morris-bar-chart").length && Morris.Bar({
            element: "morris-bar-chart",
            data: [{
                x: "2011 Q1",
                y: 3,
                z: 2,
                a: 3
            }, {
                x: "2011 Q2",
                y: 2,
                z: null,
                a: 1
            }, {
                x: "2011 Q3",
                y: 0,
                z: 2,
                a: 4
            }, {
                x: "2011 Q4",
                y: 2,
                z: 4,
                a: 3
            }],
            xkey: "x",
            ykeys: ["y", "z", "a"],
            labels: ["Y", "Z", "A"],
            barColors: ["#4788ff", "#fe721c", "#37e6b0"],
            hoverCallback: function (e, a, t, r) {
                return ""
            }
        }).on("click", (function (e, a) {
            console.log(e, a)
        })), e("#morris-area-chart").length) new Morris.Area({
        element: "morris-area-chart",
        resize: !0,
        data: [{
            y: "2011 Q1",
            item1: 2666,
            item2: 2666
        }, {
            y: "2011 Q2",
            item1: 2778,
            item2: 2294
        }, {
            y: "2011 Q3",
            item1: 4912,
            item2: 1969
        }, {
            y: "2011 Q4",
            item1: 3767,
            item2: 3597
        }, {
            y: "2012 Q1",
            item1: 6810,
            item2: 1914
        }, {
            y: "2012 Q2",
            item1: 5670,
            item2: 4293
        }, {
            y: "2012 Q3",
            item1: 4820,
            item2: 3795
        }, {
            y: "2012 Q4",
            item1: 15073,
            item2: 5967
        }, {
            y: "2013 Q1",
            item1: 10687,
            item2: 4460
        }, {
            y: "2013 Q2",
            item1: 8432,
            item2: 5713
        }],
        xkey: "y",
        ykeys: ["item1", "item2"],
        labels: ["Item 1", "Item 2"],
        lineColors: ["#75e275", "#75bcff"],
        hoverCallback: function (e, a, t, r) {
            return ""
        }
    });
    if (e("#morris-donut-chart").length) new Morris.Donut({
        element: "morris-donut-chart",
        resize: !0,
        colors: ["#4788ff", "#ff4b4b", "#37e6b0"],
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        hideHover: "auto"
    });
    if (e("#high-basicline-chart").length && Highcharts.chart("high-basicline-chart", {
            chart: {
                type: "spline",
                inverted: !0
            },
            title: {
                text: "Atmosphere Temperature by Altitude"
            },
            subtitle: {
                text: "According to the Standard Atmosphere Model"
            },
            xAxis: {
                reversed: !1,
                title: {
                    enabled: !0,
                    text: "Altitude"
                },
                labels: {
                    format: "{value} km"
                },
                maxPadding: .05,
                showLastLabel: !0
            },
            yAxis: {
                title: {
                    text: "Temperature"
                },
                labels: {
                    format: "{value}°"
                },
                lineWidth: 2
            },
            legend: {
                enabled: !1
            },
            tooltip: {
                headerFormat: "<b>{series.name}</b><br/>",
                pointFormat: "{point.x} km: {point.y}°C"
            },
            plotOptions: {
                spline: {
                    marker: {
                        enable: !1
                    }
                }
            },
            series: [{
                name: "Temperature",
                color: "#4788ff",
                data: [
                    [0, 15],
                    [10, -50],
                    [20, -56.5],
                    [30, -46.5],
                    [40, -22.1],
                    [50, -2.5],
                    [60, -27.7],
                    [70, -55.7],
                    [80, -76.5]
                ]
            }]
        }), e("#high-area-chart").length && Highcharts.chart("high-area-chart", {
            chart: {
                type: "areaspline"
            },
            title: {
                text: "Average fruit consumption during one week"
            },
            legend: {
                layout: "vertical",
                align: "left",
                verticalAlign: "top",
                x: 150,
                y: 100,
                floating: !0,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || "#FFFFFF"
            },
            xAxis: {
                categories: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                plotBands: [{
                    from: 4.5,
                    to: 6.5,
                    color: "rgba(68, 170, 213, .2)"
                }]
            },
            yAxis: {
                title: {
                    text: "Fruit units"
                }
            },
            tooltip: {
                shared: !0,
                valueSuffix: " units"
            },
            credits: {
                enabled: !1
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: .5
                }
            },
            series: [{
                name: "John",
                color: "#4788ff",
                data: [3, 4, 3, 5, 4, 10, 12]
            }, {
                name: "Jane",
                color: "#37e6b0",
                data: [1, 3, 4, 3, 3, 5, 4]
            }]
        }), e("#high-columnndbar-chart").length && Highcharts.chart("high-columnndbar-chart", {
            chart: {
                type: "bar"
            },
            title: {
                text: "Stacked bar chart"
            },
            xAxis: {
                categories: ["Apples", "Oranges", "Pears", "Grapes", "Bananas"]
            },
            yAxis: {
                min: 0,
                title: {
                    text: "Total fruit consumption"
                }
            },
            legend: {
                reversed: !0
            },
            plotOptions: {
                series: {
                    stacking: "normal"
                }
            },
            series: [{
                name: "John",
                color: "#4788ff",
                data: [5, 3, 4, 7, 2]
            }, {
                name: "Jane",
                color: "#ff4b4b",
                data: [2, 2, 3, 2, 1]
            }, {
                name: "Joe",
                color: "#37e6b0",
                data: [3, 4, 4, 2, 5]
            }]
        }), e("#high-pie-chart").length && Highcharts.chart("high-pie-chart", {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: !1,
                type: "pie"
            },
            colorAxis: {},
            title: {
                text: "Browser market shares in January, 2018"
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
            },
            plotOptions: {
                pie: {
                    allowPointSelect: !0,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: !0,
                        format: "<b>{point.name}</b>: {point.percentage:.1f} %"
                    }
                }
            },
            series: [{
                name: "Brands",
                colorByPoint: !0,
                data: [{
                    name: "Chrome",
                    y: 61.41,
                    sliced: !0,
                    selected: !0,
                    color: "#4788ff"
                }, {
                    name: "Internet Explorer",
                    y: 11.84,
                    color: "#ff4b4b"
                }, {
                    name: "Firefox",
                    y: 10.85,
                    color: "#65f9b3"
                }, {
                    name: "Edge",
                    y: 4.67,
                    color: "#6ce6f4"
                }, {
                    name: "Other",
                    y: 2.61
                }]
            }]
        }), e("#high-scatterplot-chart").length && Highcharts.chart("high-scatterplot-chart", {
            chart: {
                type: "scatter",
                zoomType: "xy"
            },
            accessibility: {
                description: "A scatter plot compares the height and weight of 507 individuals by gender. Height in centimeters is plotted on the X-axis and weight in kilograms is plotted on the Y-axis. The chart is interactive, and each data point can be hovered over to expose the height and weight data for each individual. The scatter plot is fairly evenly divided by gender with females dominating the left-hand side of the chart and males dominating the right-hand side. The height data for females ranges from 147.2 to 182.9 centimeters with the greatest concentration between 160 and 165 centimeters. The weight data for females ranges from 42 to 105.2 kilograms with the greatest concentration at around 60 kilograms. The height data for males ranges from 157.2 to 198.1 centimeters with the greatest concentration between 175 and 180 centimeters. The weight data for males ranges from 53.9 to 116.4 kilograms with the greatest concentration at around 80 kilograms."
            },
            title: {
                text: "Height Versus Weight of 507 Individuals by Gender"
            },
            subtitle: {
                text: "Source: Heinz  2003"
            },
            xAxis: {
                title: {
                    enabled: !0,
                    text: "Height (cm)"
                },
                startOnTick: !0,
                endOnTick: !0,
                showLastLabel: !0
            },
            yAxis: {
                title: {
                    text: "Weight (kg)"
                }
            },
            legend: {
                layout: "vertical",
                align: "left",
                verticalAlign: "top",
                x: 100,
                y: 70,
                floating: !0,
                backgroundColor: Highcharts.defaultOptions.chart.backgroundColor,
                borderWidth: 1
            },
            plotOptions: {
                scatter: {
                    marker: {
                        radius: 5,
                        states: {
                            hover: {
                                enabled: !0,
                                lineColor: "rgb(100,100,100)"
                            }
                        }
                    },
                    states: {
                        hover: {
                            marker: {
                                enabled: !1
                            }
                        }
                    },
                    tooltip: {
                        headerFormat: "<b>{series.name}</b><br>",
                        pointFormat: "{point.x} cm, {point.y} kg"
                    }
                }
            },
            series: [{
                name: "Female",
                color: "rgba(223, 83, 83, .5)",
                data: [
                    [161.2, 51.6],
                    [167.5, 59],
                    [159.5, 49.2],
                    [157, 63],
                    [155.8, 53.6],
                    [170, 59],
                    [159.1, 47.6],
                    [166, 69.8],
                    [176.2, 66.8],
                    [160.2, 75.2],
                    [172.7, 62],
                    [155, 49.2],
                    [156.5, 67.2],
                    [164, 53.8],
                    [160.9, 54.4]
                ],
                color: "#4788ff"
            }, {
                name: "Male",
                color: "rgba(119, 152, 191, .5)",
                data: [
                    [174, 65.6],
                    [175.3, 71.8],
                    [193.5, 80.7],
                    [186.5, 72.6],
                    [187.2, 78.8],
                    [181.5, 74.8],
                    [184, 86.4],
                    [184.5, 78.4],
                    [175, 62],
                    [184, 81.6],
                    [180.1, 93],
                    [175.5, 80.9],
                    [180.6, 72.7],
                    [184.4, 68],
                    [175.5, 70.9],
                    [180.3, 83.2],
                    [180.3, 83.2]
                ],
                color: "#ff4b4b"
            }]
        }), e("#high-linendcolumn-chart").length && Highcharts.chart("high-linendcolumn-chart", {
            chart: {
                zoomType: "xy"
            },
            title: {
                text: "Average Monthly Temperature and Rainfall in Tokyo"
            },
            subtitle: {
                text: "Source: WorldClimate.com"
            },
            xAxis: [{
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                crosshair: !0
            }],
            yAxis: [{
                labels: {
                    format: "{value}°C",
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: "Temperature",
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, {
                title: {
                    text: "Rainfall",
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    format: "{value} mm",
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: !0
            }],
            tooltip: {
                shared: !0
            },
            legend: {
                layout: "vertical",
                align: "left",
                x: 120,
                verticalAlign: "top",
                y: 100,
                floating: !0,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || "rgba(255,255,255,0.25)"
            },
            series: [{
                name: "Rainfall",
                type: "column",
                yAxis: 1,
                data: [49.9, 71.5, 106.4, 129.2, 144, 176, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                color: "#4788ff",
                tooltip: {
                    valueSuffix: " mm"
                }
            }, {
                name: "Temperature",
                type: "spline",
                data: [7, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                color: "#ff4b4b",
                tooltip: {
                    valueSuffix: "°C"
                }
            }]
        }), e("#high-dynamic-chart").length && Highcharts.chart("high-dynamic-chart", {
            chart: {
                type: "spline",
                animation: Highcharts.svg,
                marginRight: 10,
                events: {
                    load: function () {
                        var e = this.series[0];
                        setInterval((function () {
                            var a = (new Date).getTime(),
                                t = Math.random();
                            e.addPoint([a, t], !0, !0)
                        }), 1e3)
                    }
                }
            },
            time: {
                useUTC: !1
            },
            title: {
                text: "Live random data"
            },
            accessibility: {
                announceNewData: {
                    enabled: !0,
                    minAnnounceInterval: 15e3,
                    announcementFormatter: function (e, a, t) {
                        return !!t && "New point added. Value: " + t.y
                    }
                }
            },
            xAxis: {
                type: "datetime",
                tickPixelInterval: 150
            },
            yAxis: {
                title: {
                    text: "Value"
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: "#808080"
                }]
            },
            tooltip: {
                headerFormat: "<b>{series.name}</b><br/>",
                pointFormat: "{point.x:%Y-%m-%d %H:%M:%S}<br/>{point.y:.2f}"
            },
            legend: {
                enabled: !1
            },
            exporting: {
                enabled: !1
            },
            series: [{
                name: "Random data",
                color: "#4788ff",
                data: function () {
                    var e, a = [],
                        t = (new Date).getTime();
                    for (e = -19; e <= 0; e += 1) a.push({
                        x: t + 1e3 * e,
                        y: Math.random()
                    });
                    return a
                }()
            }]
        }), e("#high-3d-chart").length) {
        var n = new Highcharts.Chart({
            chart: {
                renderTo: "high-3d-chart",
                type: "column",
                options3d: {
                    enabled: !0,
                    alpha: 15,
                    beta: 15,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: "Chart rotation demo"
            },
            subtitle: {
                text: "Test options by dragging the sliders below"
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            series: [{
                data: [29.9, 71.5, 106.4, 129.2, 144, 176, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                color: "#4788ff"
            }]
        });

        function l() {
            $("#alpha-value").html(n.options.chart.options3d.alpha), $("#beta-value").html(n.options.chart.options3d.beta), $("#depth-value").html(n.options.chart.options3d.depth)
        }
        $("#sliders input").on("input change", (function () {
            n.options.chart.options3d[this.id] = parseFloat(this.value), l(), n.redraw(!1)
        })), l()
    }
    if (e("#high-gauges-chart").length && Highcharts.chart("high-gauges-chart", {
            chart: {
                type: "gauge",
                plotBackgroundColor: null,
                plotBackgroundImage: null,
                plotBorderWidth: 0,
                plotShadow: !1
            },
            title: {
                text: "Speedometer"
            },
            pane: {
                startAngle: -150,
                endAngle: 150,
                background: [{
                    backgroundColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, "#FFF"],
                            [1, "#333"]
                        ]
                    },
                    borderWidth: 0,
                    outerRadius: "109%"
                }, {
                    backgroundColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, "#333"],
                            [1, "#FFF"]
                        ]
                    },
                    borderWidth: 1,
                    outerRadius: "107%"
                }, {}, {
                    backgroundColor: "#DDD",
                    borderWidth: 0,
                    outerRadius: "105%",
                    innerRadius: "103%"
                }]
            },
            yAxis: {
                min: 0,
                max: 200,
                minorTickInterval: "auto",
                minorTickWidth: 1,
                minorTickLength: 10,
                minorTickPosition: "inside",
                minorTickColor: "#666",
                tickPixelInterval: 30,
                tickWidth: 2,
                tickPosition: "inside",
                tickLength: 10,
                tickColor: "#666",
                labels: {
                    step: 2,
                    rotation: "auto"
                },
                title: {
                    text: "km/h"
                },
                plotBands: [{
                    from: 0,
                    to: 120,
                    color: "#55BF3B"
                }, {
                    from: 120,
                    to: 160,
                    color: "#DDDF0D"
                }, {
                    from: 160,
                    to: 200,
                    color: "#DF5353"
                }]
            },
            series: [{
                name: "Speed",
                data: [80],
                tooltip: {
                    valueSuffix: " km/h"
                }
            }]
        }, (function (e) {
            e.renderer.forExport || setInterval((function () {
                var a, t = e.series[0].points[0],
                    r = Math.round(20 * (Math.random() - .5));
                ((a = t.y + r) < 0 || a > 200) && (a = t.y - r), t.update(a)
            }), 3e3)
        })), e("#high-barwithnagative-chart").length) {
        var i = ["0-4", "5-9", "10-14", "15-19", "20-24", "25-29", "30-34", "35-39", "40-44", "45-49", "50-54", "55-59", "60-64", "65-69", "70-74", "75-79", "80-84", "85-89", "90-94", "95-99", "100 + "];
        Highcharts.chart("high-barwithnagative-chart", {
            chart: {
                type: "bar"
            },
            title: {
                text: "Population pyramid for Germany, 2018"
            },
            subtitle: {
                text: 'Source: <a href="http://populationpyramid.net/germany/2018/">Population Pyramids of the World from 1950 to 2100</a>'
            },
            accessibility: {
                point: {
                    descriptionFormatter: function (e) {
                        return e.index + 1 + ", Age " + e.category + ", " + Math.abs(e.y) + "%. " + e.series.name + "."
                    }
                }
            },
            xAxis: [{
                categories: i,
                reversed: !1,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: "Age (male)"
                }
            }, {
                opposite: !0,
                reversed: !1,
                categories: i,
                linkedTo: 0,
                labels: {
                    step: 1
                },
                accessibility: {
                    description: "Age (female)"
                }
            }],
            yAxis: {
                title: {
                    text: null
                },
                labels: {
                    formatter: function () {
                        return Math.abs(this.value) + "%"
                    }
                },
                accessibility: {
                    description: "Percentage population",
                    rangeDescription: "Range: 0 to 5%"
                }
            },
            plotOptions: {
                series: {
                    stacking: "normal"
                }
            },
            tooltip: {
                formatter: function () {
                    return "<b>" + this.series.name + ", age " + this.point.category + "</b><br/>Population: " + Highcharts.numberFormat(Math.abs(this.point.y), 1) + "%"
                }
            },
            series: [{
                name: "Male",
                data: [-2.2, -2.1, -2.2, -2.4, -2.7, -3, -3.3, -3.2, -2.9, -3.5, -4.4, -4.1, -0],
                color: "#4788ff"
            }, {
                name: "Female",
                data: [2.1, 2, 2.1, 2.3, 2.6, 2.9, 3.2, 3.1, 2.9, 3.4, 0],
                color: "#ff4b4b"
            }]
        })
    }
    o = {
        chart: {
            height: 80,
            type: "area",
            sparkline: {
                enabled: !0
            },
            group: "sparklines"
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .5,
                opacityTo: 0
            }
        },
        series: [{
            name: "series1",
            data: [60, 15, 50, 30, 70]
        }],
        colors: ["#50b5ff"],
        xaxis: {
            type: "datetime",
            categories: ["2018-08-19T00:00:00", "2018-09-19T01:30:00", "2018-10-19T02:30:00", "2018-11-19T01:30:00", "2018-12-19T01:30:00"]
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm"
            }
        }
    };
    e("#chart-1").length && (n = new ApexCharts(document.querySelector("#chart-1"), o)).render();
    o = {
        chart: {
            height: 80,
            type: "area",
            sparkline: {
                enabled: !0
            },
            group: "sparklines"
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .5,
                opacityTo: 0
            }
        },
        series: [{
            name: "series1",
            data: [70, 40, 60, 30, 60]
        }],
        colors: ["#fd7e14"],
        xaxis: {
            type: "datetime",
            categories: ["2018-08-19T00:00:00", "2018-09-19T01:30:00", "2018-10-19T02:30:00", "2018-11-19T01:30:00", "2018-12-19T01:30:00"]
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm"
            }
        }
    };
    e("#chart-2").length && (n = new ApexCharts(document.querySelector("#chart-2"), o)).render();
    o = {
        chart: {
            height: 80,
            type: "area",
            sparkline: {
                enabled: !0
            },
            group: "sparklines"
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .5,
                opacityTo: 0
            }
        },
        series: [{
            name: "series1",
            data: [60, 40, 60, 40, 70]
        }],
        colors: ["#49f0d3"],
        xaxis: {
            type: "datetime",
            categories: ["2018-08-19T00:00:00", "2018-09-19T01:30:00", "2018-10-19T02:30:00", "2018-11-19T01:30:00", "2018-12-19T01:30:00"]
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm"
            }
        }
    };
    e("#chart-3").length && (n = new ApexCharts(document.querySelector("#chart-3"), o)).render();
    o = {
        chart: {
            height: 80,
            type: "area",
            sparkline: {
                enabled: !0
            },
            group: "sparklines"
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            width: 3,
            curve: "smooth"
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .5,
                opacityTo: 0
            }
        },
        series: [{
            name: "series1",
            data: [75, 30, 60, 35, 60]
        }],
        colors: ["#ff9b8a"],
        xaxis: {
            type: "datetime",
            categories: ["2018-08-19T00:00:00", "2018-09-19T01:30:00", "2018-10-19T02:30:00", "2018-11-19T01:30:00", "2018-12-19T01:30:00"]
        },
        tooltip: {
            x: {
                format: "dd/MM/yy HH:mm"
            }
        }
    };
    e("#chart-4").length && (n = new ApexCharts(document.querySelector("#chart-4"), o)).render();
    if (e("#iq-chart-box1").length) {
        o = {
            series: [{
                name: "Total sales",
                data: [10, 10, 35, 10]
            }],
            colors: ["#50b5ff"],
            chart: {
                height: 50,
                width: 100,
                type: "line",
                sparkline: {
                    enabled: !0
                },
                zoom: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "straight"
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar"]
            }
        };
        (n = new ApexCharts(document.querySelector("#iq-chart-box1"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#iq-chart-box2").length) {
        o = {
            series: [{
                name: "Sale Today",
                data: [10, 10, 35, 10]
            }],
            colors: ["#ff9b8a"],
            chart: {
                height: 50,
                width: 100,
                type: "line",
                sparkline: {
                    enabled: !0
                },
                zoom: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "straight"
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar"]
            }
        };
        (n = new ApexCharts(document.querySelector("#iq-chart-box2"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#iq-chart-box3").length) {
        o = {
            series: [{
                name: "Total Classon",
                data: [10, 10, 35, 10]
            }],
            colors: ["#49f0d3"],
            chart: {
                height: 50,
                width: 100,
                type: "line",
                sparkline: {
                    enabled: !0
                },
                zoom: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "straight"
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar"]
            }
        };
        (n = new ApexCharts(document.querySelector("#iq-chart-box3"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#iq-chart-box4").length) {
        o = {
            series: [{
                name: "Total Profit",
                data: [10, 10, 35, 10]
            }],
            colors: ["#fd7e14"],
            chart: {
                height: 50,
                width: 100,
                type: "line",
                sparkline: {
                    enabled: !0
                },
                zoom: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "straight"
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar"]
            }
        };
        (n = new ApexCharts(document.querySelector("#iq-chart-box4"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#ethernet-chart-01").length) {
        o = {
            series: [{
                name: "Desktops",
                data: [5, 30, 6, 20, 5, 18, 10]
            }],
            colors: ["#4788ff"],
            chart: {
                height: 60,
                width: 100,
                type: "line",
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
            }
        };
        (n = new ApexCharts(document.querySelector("#ethernet-chart-01"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#ethernet-chart-02").length) {
        o = {
            series: [{
                name: "Desktops",
                data: [5, 20, 4, 18, 3, 15, 10]
            }],
            colors: ["#1ee2ac"],
            chart: {
                height: 60,
                width: 100,
                type: "line",
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
            }
        };
        (n = new ApexCharts(document.querySelector("#ethernet-chart-02"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#ethernet-chart-03").length) {
        o = {
            series: [{
                name: "Desktops",
                data: [5, 20, 6, 18, 5, 15, 4]
            }],
            colors: ["#ff4b4b"],
            chart: {
                height: 60,
                width: 100,
                type: "line",
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
            }
        };
        (n = new ApexCharts(document.querySelector("#ethernet-chart-03"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#ethernet-chart-04").length) {
        o = {
            series: [{
                name: "Desktops",
                data: [5, 15, 3, 20, 5, 18, 13]
            }],
            colors: ["#4788ff"],
            chart: {
                height: 60,
                width: 100,
                type: "line",
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            title: {
                text: "",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"]
            }
        };
        (n = new ApexCharts(document.querySelector("#ethernet-chart-04"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#chart-9").length) {
        var s = new ApexCharts(document.querySelector("#chart-9"), o);
        s.render(), window.setInterval((function () {
            (function (e, a) {
                var t = e + TICKINTERVAL;
                lastDate = t;
                for (var r = 0; r < data.length - 10; r++) data[r].x = t - XAXISRANGE - TICKINTERVAL, data[r].y = 0;
                data.push({
                    x: t,
                    y: Math.floor(Math.random() * (a.max - a.min + 1)) + a.min
                })
            })(lastDate, {
                min: 10,
                max: 90
            }), e("#chart-9").length && s.updateSeries([{
                data: data
            }])
        }), 1e3)
    }

    function r(e, a, t) {
        for (var r = 0, o = []; r < a;) {
            var n = Math.floor(750 * Math.random()) + 1,
                l = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min,
                i = Math.floor(61 * Math.random()) + 15;
            o.push([n, l, i]), r++
        }
        return o
    }
    if (o = {
            chart: {
                height: 440,
                type: "bubble",
                stacked: !1,
                toolbar: {
                    show: !1
                },
                animations: {
                    enabled: !0,
                    easing: "linear",
                    dynamicAnimation: {
                        speed: 1e3
                    }
                },
                sparkline: {
                    enabled: !0
                },
                group: "sparklines"
            },
            dataLabels: {
                enabled: !1
            },
            series: [{
                name: "Bubble1",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 10, {
                    min: 10,
                    max: 60
                })
            }, {
                name: "Bubble2",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 10, {
                    min: 10,
                    max: 60
                })
            }, {
                name: "Bubble3",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 10, {
                    min: 10,
                    max: 60
                })
            }, {
                name: "Bubble4",
                data: r(new Date("11 Feb 2017 GMT").getTime(), 10, {
                    min: 10,
                    max: 60
                })
            }],
            fill: {
                opacity: .8
            },
            title: {
                show: !1
            },
            xaxis: {
                tickAmount: 8,
                type: "category",
                labels: {
                    show: !1
                }
            },
            yaxis: {
                max: 70,
                labels: {
                    show: !1
                }
            },
            legend: {
                show: !1
            }
        }, e("#site-trafic-chart").length) {
        o = {
            series: [{
                name: "series1",
                data: [0, 70, 30, 90, 80, 150]
            }, {
                name: "series2",
                data: [0, 20, 90, 70, 130, 110]
            }],
            colors: ["#fe721c", "#4788ff"],
            chart: {
                height: 365,
                type: "line",
                zoom: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth"
            },
            title: {
                text: "Product Trends by Month",
                align: "left"
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: 0
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"]
            },
            yaxis: {
                title: {
                    text: ""
                },
                labels: {
                    offsetX: -20,
                    offsetY: 0
                }
            }
        };
        if ("undefined" != typeof ApexCharts) {
            (n = new ApexCharts(document.querySelector("#site-trafic-chart"), o)).render();
            document.querySelector("body").classList.contains("dark") && a(n, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (e) {
                a(n, e.detail)
            }))
        }
    }
    const d = $("#table"),
        c = $("#export-btn"),
        u = $("#export");
    if ($(".table-add").on("click", "i", (() => {
            const e = d.find("tbody tr").last().clone(!0).removeClass("hide table-line");
            0 === d.find("tbody tr").length && $("tbody").append('\n<tr class="hide">\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half" contenteditable="true">Example</td>\n  <td class="pt-3-half">\n    <span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>\n    <span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>\n  </td>\n  <td>\n    <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light">Remove</button></span>\n  </td>\n</tr>'), d.find("table").append(e)
        })), d.on("click", ".table-remove", (function () {
            $(this).parents("tr").detach()
        })), d.on("click", ".table-up", (function () {
            const e = $(this).parents("tr");
            1 !== e.index() && e.prev().before(e.get(0))
        })), d.on("click", ".table-down", (function () {
            const e = $(this).parents("tr");
            e.next().after(e.get(0))
        })), e.fn.pop = [].pop, e.fn.shift = [].shift, c.on("click", (() => {
            const e = d.find("tr:not(:hidden)"),
                a = [],
                t = [];
            $(e.shift()).find("th:not(:empty)").each((function () {
                a.push($(this).text().toLowerCase())
            })), e.each((function () {
                const e = $(this).find("td"),
                    r = {};
                a.forEach(((a, t) => {
                    r[a] = e.eq(t).text()
                })), t.push(r)
            })), u.text(JSON.stringify(t))
        })), $(document).ready((function () {
            var e, a, t, r, o = 1,
                n = $("fieldset").length;

            function l(e) {
                var a = parseFloat(100 / n) * e;
                a = a.toFixed(), $(".progress-bar").css("width", a + "%")
            }
            l(o), $(".next").click((function () {
                e = $(this).parent(), a = $(this).parent().next(), $("#top-tab-list li").eq($("fieldset").index(a)).addClass("active"), $("#top-tab-list li").eq($("fieldset").index(e)).addClass("done"), a.show(), e.animate({
                    opacity: 0
                }, {
                    step: function (t) {
                        r = 1 - t, e.css({
                            display: "none",
                            position: "relative"
                        }), a.css({
                            opacity: r
                        })
                    },
                    duration: 500
                }), l(++o)
            })), $(".previous").click((function () {
                e = $(this).parent(), t = $(this).parent().prev(), $("#top-tab-list li").eq($("fieldset").index(e)).removeClass("active"), $("#top-tab-list li").eq($("fieldset").index(t)).removeClass("done"), t.show(), e.animate({
                    opacity: 0
                }, {
                    step: function (a) {
                        r = 1 - a, e.css({
                            display: "none",
                            position: "relative"
                        }), t.css({
                            opacity: r
                        })
                    },
                    duration: 500
                }), l(--o)
            })), $(".submit").click((function () {
                return !1
            }))
        })), $(document).ready((function () {
            var e = $("div.setup-panel div a"),
                a = $(".setup-content"),
                t = $(".nextBtn");
            a.hide(), e.click((function (t) {
                t.preventDefault();
                var r = $($(this).attr("href")),
                    o = $(this);
                o.hasClass("disabled") || (e.addClass("active"), o.parent().addClass("active"), a.hide(), r.show(), r.find("input:eq(0)").focus())
            })), t.click((function () {
                var e = $(this).closest(".setup-content"),
                    a = e.attr("id"),
                    t = $('div.setup-panel div a[href="#' + a + '"]').parent().next().children("a"),
                    r = e.find("input[type='text'],input[type='email'],input[type='password'],input[type='url'],textarea"),
                    o = !0;
                $(".form-group").removeClass("has-error");
                for (var n = 0; n < r.length; n++) r[n].validity.valid || (o = !1, $(r[n]).closest(".form-group").addClass("has-error"));
                o && t.removeAttr("disabled").trigger("click")
            })), $("div.setup-panel div a.active").trigger("click")
        })), $(document).ready((function () {
            var e, a, t, r, o = 1,
                n = $("fieldset").length;

            function l(e) {
                var a = parseFloat(100 / n) * e;
                a = a.toFixed(), $(".progress-bar").css("width", a + "%")
            }
            l(o), $(".next").click((function () {
                e = $(this).parent(), a = $(this).parent().next(), $("#top-tabbar-vertical li").eq($("fieldset").index(a)).addClass("active"), a.show(), e.animate({
                    opacity: 0
                }, {
                    step: function (t) {
                        r = 1 - t, e.css({
                            display: "none",
                            position: "relative"
                        }), a.css({
                            opacity: r
                        })
                    },
                    duration: 500
                }), l(++o)
            })), $(".previous").click((function () {
                e = $(this).parent(), t = $(this).parent().prev(), $("#top-tabbar-vertical li").eq($("fieldset").index(e)).removeClass("active"), t.show(), e.animate({
                    opacity: 0
                }, {
                    step: function (a) {
                        r = 1 - a, e.css({
                            display: "none",
                            position: "relative"
                        }), t.css({
                            opacity: r
                        })
                    },
                    duration: 500
                }), l(--o)
            })), $(".submit").click((function () {
                return !1
            }))
        })), $(document).ready((function () {
            $(".file-upload").on("change", (function () {
                ! function (e) {
                    if (e.files && e.files[0]) {
                        var a = new FileReader;
                        a.onload = function (e) {
                            $(".profile-pic").attr("src", e.target.result)
                        }, a.readAsDataURL(e.files[0])
                    }
                }(this)
            })), $(".upload-button").on("click", (function () {
                $(".file-upload").click()
            }))
        })), $((function () {
            void 0 !== $.fn.barrating && ($("#example").barrating({
                theme: "fontawesome-stars"
            }), $("#bars-number").barrating({
                theme: "bars-1to10"
            }), $("#movie-rating").barrating("show", {
                theme: "bars-movie"
            }), $("#movie-rating").barrating("set", "Mediocre"), $("#pill-rating").barrating({
                theme: "bars-pill",
                showValues: !0,
                showSelectedRating: !1,
                onSelect: function (e, a) {
                    alert("Selected rating: " + e)
                }
            })), void 0 !== $.fn.mdbRate && ($("#rateMe1").mdbRate(), $("#face-rating").mdbRate())
        })), e("#editor").length) new Quill("#editor", {
        theme: "snow"
    });
    if (e("#quill-toolbar").length) {
        new Quill("#quill-toolbar", {
            modules: {
                toolbar: "#quill-tool"
            },
            placeholder: "Compose an epic...",
            theme: "snow"
        });
        $('[data-toggle="tooltip"]').tooltip(), $(".ql-italic").mouseover(), setTimeout((function () {
            $(".ql-italic").mouseout()
        }), 2500)
    }
    $(".custom-file-input").on("change", (function () {
        var e = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(e)
    })), void 0 !== $.fn.magnificPopup && $(".image-popup-vertical-fit").magnificPopup({
        type: "image",
        mainClass: "mfp-with-zoom",
        gallery: {
            enabled: !0
        },
        zoom: {
            enabled: !0,
            duration: 300,
            easing: "ease-in-out",
            opener: function (e) {
                return e.is("img") ? e : e.find("img")
            }
        }
    });
    var m = $(".masonry").masonry({
        itemSelector: ".item",
        columnWidth: ".grid-sizer",
        percentPosition: !0
    });
    if (m.imagesLoaded().progress((function () {
            m.masonry("layout")
        })), void 0 !== $.fn.magnificPopup && $(".gallery").magnificPopup({
            delegate: "a",
            type: "image",
            gallery: {
                enabled: !0,
                navigateByImgClick: !0,
                preload: [0, 1]
            }
        }), e("#calendar1").length && document.addEventListener("DOMContentLoaded", (function () {
            var e = document.getElementById("calendar1");
            new FullCalendar.Calendar(e, {
                plugins: ["dayGrid"],
                timeZone: "UTC",
                defaultView: "dayGridMonth",
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth"
                },
                events: [{
                    groupId: "999",
                    title: "Repeating Event",
                    start: "2020-11-16T16:00:00",
                    color: "#01041b"
                }, {
                    title: "Birthday Party",
                    start: "2020-11-28T07:00:00",
                    color: "#4731b6"
                }, {
                    title: "Meeting",
                    start: "2020-11-12T14:30:00",
                    color: "#15ca92"
                }, {
                    title: "Birthday Party",
                    start: "2020-11-02T07:00:00",
                    color: "#fe721c"
                }, {
                    title: "Birthday Party",
                    start: "2020-11-13T07:00:00",
                    color: "#ff4b4b"
                }, {
                    title: "Meeting",
                    start: "2020-11-12T14:30:00",
                    color: "#15ca92"
                }, {
                    title: "Click for Google",
                    url: "http://google.com/",
                    start: "2020-11-28",
                    color: "#4731b6"
                }, {
                    title: "All Day Event",
                    start: "2020-12-10",
                    color: "#4788ff"
                }, {
                    title: "Long Event",
                    start: "2020-12-07",
                    end: "2020-02-10",
                    color: "#876cfe"
                }, {
                    groupId: "999",
                    title: "Repeating Event",
                    start: "2020-12-10T16:00:00",
                    color: "#4788ff"
                }, {
                    groupId: "999",
                    title: "Repeating Event",
                    start: "2020-12-16T16:00:00",
                    color: "#37e6b0"
                }]
            }).render()
        })), e("#layout-1-chart-01").length) {
        o = {
            series: [70, 30],
            chart: {
                height: 300,
                type: "radialBar"
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: "22px"
                        },
                        value: {
                            fontSize: "16px"
                        },
                        total: {
                            show: !0,
                            label: "Total",
                            formatter: function (e) {
                                return 249
                            }
                        }
                    },
                    track: {
                        strokeWidth: "42%"
                    }
                }
            },
            colors: ["#05bbc9", "#876cfe"],
            stroke: {
                lineCap: "round"
            }
        };
        (n = new ApexCharts(document.querySelector("#layout-1-chart-01"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#layout-1-chart-02").length) {
        o = {
            series: [{
                data: [18, 22, 28, 45, 34, 20]
            }],
            chart: {
                height: 200,
                type: "bar",
                events: {
                    click: function (e, a, t) {}
                },
                sparkline: {
                    enabled: !0
                }
            },
            colors: ["#fe721c", "#4788ff", "#05bbc9", "#876cfe", "#00cc96", "#e72c30"],
            plotOptions: {
                bar: {
                    columnWidth: "35%",
                    distributed: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            legend: {
                show: !1
            },
            xaxis: {
                categories: [
                    ["India"],
                    ["U.S.A"],
                    ["Canada"],
                    ["Africa"]
                ],
                labels: {
                    style: {
                        colors: ["#4788ff", "#37e6b0", "#fe721c", "#876cfe"],
                        fontSize: "12px"
                    }
                }
            }
        };
        (n = new ApexCharts(document.querySelector("#layout-1-chart-02"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#layout-1-chart-03").length) {
        o = {
            series: [{
                name: " Clicks",
                type: "column",
                data: [23, 11, 22, 27, 13, 22, 37, 21]
            }, {
                name: " Sales",
                type: "area",
                data: [44, 55, 41, 67, 22, 43, 21, 41]
            }, {
                name: "Commission",
                type: "line",
                data: [30, 25, 36, 30, 45, 35, 64, 52]
            }],
            chart: {
                height: 370,
                type: "line",
                stacked: !1
            },
            stroke: {
                width: [0, 2, 5],
                curve: "smooth"
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%"
                }
            },
            fill: {
                opacity: [.85, .25, 1],
                gradient: {
                    inverseColors: !1,
                    shade: "light",
                    type: "vertical",
                    opacityFrom: .85,
                    opacityTo: .55,
                    stops: [0, 100, 100, 100]
                }
            },
            labels: ["01/01/2019", "02/01/2019", "03/01/2019", "04/01/2019", "05/01/2019", "06/01/2019", "07/01/2019", "08/01/2019"],
            colors: ["#05bbc9", "#fe721c", "#00cc96"],
            markers: {
                size: 0
            },
            xaxis: {
                type: "datetime"
            },
            yaxis: {
                show: !0,
                labels: {
                    minWidth: 20,
                    maxWidth: 20
                }
            },
            tooltip: {
                shared: !0,
                intersect: !1,
                y: {
                    formatter: function (e) {
                        return void 0 !== e ? e.toFixed(0) + " points" : e
                    }
                }
            }
        };
        (n = new ApexCharts(document.querySelector("#layout-1-chart-03"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#layout-1-chart-04").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = {
                    AF: 0,
                    AN: 1,
                    AS: 2,
                    EU: 3,
                    NA: 4,
                    OC: 5,
                    SA: 6
                },
                a = am4core.create("layout-1-chart-04", am4maps.MapChart);
            a.projection = new am4maps.projections.Miller;
            var r = a.series.push(new am4maps.MapPolygonSeries);
            r.useGeodata = !0, r.geodata = am4geodata_worldLow, r.exclude = ["AQ"];
            var o = r.mapPolygons.template;
            o.tooltipText = "{name}", o.nonScalingStroke = !0, o.strokeOpacity = .5, o.fill = am4core.color("#eee"), o.propertyFields.fill = "color", a.rtl = !0, o.states.create("hover").properties.fill = a.colors.getIndex(9);
            var n = a.series.push(new am4maps.MapPolygonSeries);
            n.useGeodata = !0, n.hide(), n.geodataSource.events.on("done", (function (e) {
                r.hide(), n.show()
            }));
            var l = n.mapPolygons.template;
            l.tooltipText = "{name}", l.nonScalingStroke = !0, l.strokeOpacity = .5, l.fill = am4core.color("#eee"), l.states.create("hover").properties.fill = a.colors.getIndex(9), o.events.on("hit", (function (e) {
                e.target.series.chart.zoomToMapObject(e.target);
                var a = e.target.dataItem.dataContext.map;
                a && (e.target.isHover = !1, n.geodataSource.url = "https://www.amcharts.com/lib/4/geodata/json/" + a + ".json", n.geodataSource.load())
            }));
            var i = [];
            for (var s in am4geodata_data_countries2)
                if (am4geodata_data_countries2.hasOwnProperty(s)) {
                    var d = am4geodata_data_countries2[s];
                    d.maps.length && i.push({
                        id: s,
                        color: a.colors.getIndex(e[d.continent_code]),
                        map: d.maps[0]
                    })
                } r.data = i, a.zoomControl = new am4maps.ZoomControl;
            var c = new am4core.Button;
            c.events.on("hit", (function () {
                r.show(), n.hide(), a.goHome()
            })), c.icon = new am4core.Sprite, c.padding(7, 5, 7, 5), c.width = 30, c.icon.path = "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8", c.marginBottom = 10, c.parent = a.zoomControl, c.insertBefore(a.zoomControl.plusButton);
            document.querySelector("body").classList.contains("dark") && t(a, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (e) {
                t(a, e.detail)
            }))
        })), e("#layout-1-chart-05").length) {
        const e = {
                series: [{
                    name: "Week",
                    data: [80, 50, 30, 40, 100, 20]
                }, {
                    name: "Month",
                    data: [20, 30, 40, 80, 20, 80]
                }, {
                    name: "Year",
                    data: [44, 76, 78, 13, 43, 10]
                }],
                colors: ["#43d396", "#fe721c", "#876cfe"],
                chart: {
                    height: 360,
                    type: "radar",
                    dropShadow: {
                        enabled: !0,
                        blur: 1,
                        left: 1,
                        top: 1
                    }
                },
                stroke: {
                    width: 2
                },
                fill: {
                    opacity: .1
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: ["2011", "2012", "2013", "2014", "2015", "2016"]
                }
            },
            t = new ApexCharts(document.querySelector("#layout-1-chart-05"), e);
        t.render();
        document.querySelector("body").classList.contains("dark") && a(t, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(t, e.detail)
        }))
    }
    if (e("#layout-1-chart-06").length) {
        o = {
            series: [{
                name: "Total Likes",
                data: [86, 65, 96, 46, 30, 58, 97]
            }, {
                name: "Total Share",
                data: [55, 95, 45, 98, 55, 99, 44]
            }],
            chart: {
                type: "bar",
                height: 310
            },
            colors: ["#05bbc9", "#876cfe"],
            plotOptions: {
                bar: {
                    horizontal: !1,
                    columnWidth: "25%",
                    endingShape: "rounded"
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                show: !0,
                width: 2,
                colors: ["transparent"]
            },
            xaxis: {
                categories: ["2020 Q1", "2020 Q2", "2020 Q3", "2020 Q4", "2020 Q5", "2020 Q6", "2020 Q7"]
            },
            yaxis: {
                show: !0,
                labels: {
                    minWidth: 20,
                    maxWidth: 20
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (e) {
                        return "$ " + e + " thousands"
                    }
                }
            }
        };
        (n = new ApexCharts(document.querySelector("#layout-1-chart-06"), o)).render()
    }
    if (e("#layout-2-chart-01").length) {
        const e = {
                series: [{
                    name: "Successful deals",
                    data: [30, 50, 35, 60, 40, 60, 60]
                }, {
                    name: "Failed deals",
                    data: [40, 50, 55, 50, 30, 80, 30]
                }],
                chart: {
                    type: "bar",
                    height: 330,
                    stacked: !0
                },
                colors: ["#05bbc9", "#dff6f8"],
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "15%",
                        endingShape: "rounded"
                    }
                },
                legend: {
                    show: !1
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 2,
                    colors: ["transparent"]
                },
                xaxis: {
                    categories: ["S", "M", "T", "W", "T", "F", "S"],
                    labels: {
                        minHeight: 20,
                        maxHeight: 20
                    }
                },
                yaxis: {
                    title: {
                        text: ""
                    },
                    labels: {
                        minWidth: 19,
                        maxWidth: 19
                    }
                },
                xaxis: {
                    labels: {
                        maxHight: 50
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (e) {
                            return "$ " + e + " thousands"
                        }
                    }
                }
            },
            t = new ApexCharts(document.querySelector("#layout-2-chart-01"), e);
        t.render();
        document.querySelector("body").classList.contains("dark") && a(t, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(t, e.detail)
        }))
    }
    if (e("#layout-2-chart-02").length) {
        o = {
            series: [{
                name: "Top",
                data: [20, 65, 10, 120, 30, 80, 40]
            }, {
                name: "New",
                data: [40, 0, 100, 50, 90, 40, 20]
            }],
            colors: ["#05bbc9", "#ff4b4b"],
            chart: {
                height: 300,
                type: "line",
                zoom: {
                    enabled: !1
                },
                sparkline: {
                    enabled: !1
                }
            },
            dataLabels: {
                enabled: !1
            },
            stroke: {
                curve: "smooth",
                width: 3
            },
            title: {
                text: "",
                align: "left"
            },
            fill: {
                opacity: 1
            },
            grid: {
                row: {
                    colors: ["#f3f3f3", "transparent"],
                    opacity: .5
                }
            },
            xaxis: {
                categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                labels: {
                    minHeight: 22,
                    maxHeight: 35
                }
            },
            yaxis: {
                labels: {
                    offsetY: 0,
                    minWidth: 15,
                    maxWidth: 15
                }
            },
            legend: {
                position: "top",
                offsetX: -20
            }
        };
        (n = new ApexCharts(document.querySelector("#layout-2-chart-02"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#layout-2-chart-03").length) {
        Highcharts.chart("layout-2-chart-03", {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: !1,
                height: 300,
                type: "pie"
            },
            title: {
                text: ""
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
            },
            accessibility: {
                point: {
                    valueSuffix: "%"
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: !0,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: !1
                    },
                    showInLegend: !0
                }
            },
            colors: ["#fe721c", "#05bbc9", "#876cfe"],
            series: [{
                name: "Brands",
                colorByPoint: !0,
                data: [{
                    name: "Desktop",
                    y: 30,
                    sliced: !0,
                    selected: !0
                }, {
                    name: "Mobile",
                    y: 40
                }, {
                    name: "Tablet",
                    y: 30
                }]
            }]
        });
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
    if (e("#layout-2-chart-04").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = {
                    AF: 0,
                    AN: 1,
                    AS: 2,
                    EU: 3,
                    NA: 4,
                    OC: 5,
                    SA: 6
                },
                a = am4core.create("layout-2-chart-04", am4maps.MapChart);
            a.projection = new am4maps.projections.Miller;
            var r = a.series.push(new am4maps.MapPolygonSeries);
            r.useGeodata = !0, r.geodata = am4geodata_worldLow, r.exclude = ["AQ"];
            var o = r.mapPolygons.template;
            o.tooltipText = "{name}", o.nonScalingStroke = !0, o.strokeOpacity = .5, o.fill = am4core.color("#eee"), o.propertyFields.fill = "color", a.rtl = !0, o.states.create("hover").properties.fill = a.colors.getIndex(9);
            var n = a.series.push(new am4maps.MapPolygonSeries);
            n.useGeodata = !0, n.hide(), n.geodataSource.events.on("done", (function (e) {
                r.hide(), n.show()
            }));
            var l = n.mapPolygons.template;
            l.tooltipText = "{name}", l.nonScalingStroke = !0, l.strokeOpacity = .5, l.fill = am4core.color("#eee"), l.states.create("hover").properties.fill = a.colors.getIndex(9), o.events.on("hit", (function (e) {
                e.target.series.chart.zoomToMapObject(e.target);
                var a = e.target.dataItem.dataContext.map;
                a && (e.target.isHover = !1, n.geodataSource.url = "https://www.amcharts.com/lib/4/geodata/json/" + a + ".json", n.geodataSource.load())
            }));
            var i = [];
            for (var s in am4geodata_data_countries2)
                if (am4geodata_data_countries2.hasOwnProperty(s)) {
                    var d = am4geodata_data_countries2[s];
                    d.maps.length && i.push({
                        id: s,
                        color: a.colors.getIndex(e[d.continent_code]),
                        map: d.maps[0]
                    })
                } r.data = i, a.zoomControl = new am4maps.ZoomControl;
            var c = new am4core.Button;
            c.events.on("hit", (function () {
                r.show(), n.hide(), a.goHome()
            })), c.icon = new am4core.Sprite, c.padding(7, 5, 7, 5), c.width = 30, c.icon.path = "M16,8 L14,8 L14,16 L10,16 L10,10 L6,10 L6,16 L2,16 L2,8 L0,8 L8,0 L16,8 Z M16,8", c.marginBottom = 10, c.parent = a.zoomControl, c.insertBefore(a.zoomControl.plusButton);
            document.querySelector("body").classList.contains("dark") && t(a, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (e) {
                t(a, e.detail)
            }))
        })), e("#layout-3-chart-01").length && am4core.ready((function () {
            am4core.useTheme(am4themes_animated);
            var e = am4core.create("layout-3-chart-01", am4maps.MapChart);
            e.geodata = am4geodata_worldLow, e.projection = new am4maps.projections.Miller;
            var a = e.series.push(new am4maps.MapPolygonSeries);
            a.exclude = ["AQ"], a.useGeodata = !0;
            var r = a.mapPolygons.template;
            r.fill = "#585858", r.tooltipText = "{name}", r.polygon.fillOpacity = .6, r.states.create("hover").properties.fill = e.colors.getIndex(0);
            var o = e.series.push(new am4maps.MapImageSeries);
            o.mapImages.template.propertyFields.longitude = "longitude", o.mapImages.template.propertyFields.latitude = "latitude", o.mapImages.template.tooltipText = "{title}", o.mapImages.template.propertyFields.url = "url";
            var n = o.mapImages.template.createChild(am4core.Circle);
            n.radius = 3, n.propertyFields.fill = "color";
            var l = o.mapImages.template.createChild(am4core.Circle);

            function i(e) {
                e.animate([{
                    property: "scale",
                    from: 1,
                    to: 5
                }, {
                    property: "opacity",
                    from: 1,
                    to: 0
                }], 1e3, am4core.ease.circleOut).events.on("animationended", (function (e) {
                    i(e.target.object)
                }))
            }
            l.radius = 3, l.propertyFields.fill = "color", l.events.on("inited", (function (e) {
                i(e.target)
            }));
            var s = new am4core.ColorSet;
            o.data = [{
                title: "Brussels",
                latitude: 50.8371,
                longitude: 4.3676,
                color: s.next()
            }, {
                title: "Copenhagen",
                latitude: 55.6763,
                longitude: 12.5681,
                color: s.next()
            }, {
                title: "Paris",
                latitude: 48.8567,
                longitude: 2.351,
                color: s.next()
            }, {
                title: "Reykjavik",
                latitude: 64.1353,
                longitude: -21.8952,
                color: s.next()
            }, {
                title: "Moscow",
                latitude: 55.7558,
                longitude: 37.6176,
                color: s.next()
            }, {
                title: "Madrid",
                latitude: 40.4167,
                longitude: -3.7033,
                color: s.next()
            }, {
                title: "London",
                latitude: 51.5002,
                longitude: -.1262,
                url: "http://www.google.co.uk",
                color: s.next()
            }, {
                title: "Peking",
                latitude: 39.9056,
                longitude: 116.3958,
                color: s.next()
            }, {
                title: "New Delhi",
                latitude: 28.6353,
                longitude: 77.225,
                color: s.next()
            }, {
                title: "Tokyo",
                latitude: 35.6785,
                longitude: 139.6823,
                url: "http://www.google.co.jp",
                color: s.next()
            }, {
                title: "Ankara",
                latitude: 39.9439,
                longitude: 32.856,
                color: s.next()
            }, {
                title: "Buenos Aires",
                latitude: -34.6118,
                longitude: -58.4173,
                color: s.next()
            }, {
                title: "Brasilia",
                latitude: -15.7801,
                longitude: -47.9292,
                color: s.next()
            }, {
                title: "Ottawa",
                latitude: 45.4235,
                longitude: -75.6979,
                color: s.next()
            }, {
                title: "Washington",
                latitude: 38.8921,
                longitude: -77.0241,
                color: s.next()
            }, {
                title: "Kinshasa",
                latitude: -4.3369,
                longitude: 15.3271,
                color: s.next()
            }, {
                title: "Cairo",
                latitude: 30.0571,
                longitude: 31.2272,
                color: s.next()
            }, {
                title: "Pretoria",
                latitude: -25.7463,
                longitude: 28.1876,
                color: s.next()
            }];
            document.querySelector("body").classList.contains("dark") && t(e, {
                dark: !0
            }), document.addEventListener("ChangeColorMode", (function (a) {
                t(e, a.detail)
            }))
        })), e("#layout-3-chart-02").length && Highcharts.chart("layout-3-chart-02", {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: !1,
                height: 300,
                type: "pie"
            },
            title: {
                text: ""
            },
            tooltip: {
                pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>"
            },
            accessibility: {
                point: {
                    valueSuffix: "%"
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: !0,
                    cursor: "pointer",
                    dataLabels: {
                        enabled: !1
                    },
                    showInLegend: !0
                }
            },
            colors: ["#876cfe", "#05bbc9"],
            series: [{
                name: "Brands",
                colorByPoint: !0,
                data: [{
                    name: "Man : 3,272978",
                    y: 80,
                    sliced: !0,
                    selected: !0
                }, {
                    name: "Woman : 83,272978",
                    y: 30
                }]
            }]
        }), e("#layout-3-chart-03").length) {
        const e = {
                series: [{
                    name: "Frauds",
                    data: [53, 55, 45, 40, 40, 28, 35, 25, 2]
                }, {
                    name: "Paid Clicks",
                    data: [63, 62, 52, 72, 55, 80, 70, 50, 60]
                }, {
                    name: "Total Clicks",
                    data: [150, 135, 144, 115, 120, 114, 133, 124, 100]
                }],
                colors: ["#05bbc9", "#ffca44", "#876cfe"],
                labels: ["20 Feb", "21 Feb", "22 Feb", "23 Feb", "24 Feb", "25 Feb", "25 Feb", "26 Feb", "27 Feb", "28 Feb"],
                chart: {
                    type: "bar",
                    height: 330,
                    stacked: !0,
                    zoom: {
                        enabled: !0
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        legend: {
                            position: "bottom",
                            offsetX: -10,
                            offsetY: 0
                        }
                    }
                }],
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "12%",
                        endingShape: "rounded"
                    }
                },
                xaxis: {
                    show: !0
                },
                yaxis: {
                    show: !0,
                    labels: {
                        minWidth: 20,
                        maxWidth: 20
                    }
                },
                legend: {
                    position: "bottom",
                    offsetX: 0,
                    offsetY: -10
                },
                fill: {
                    opacity: 1
                },
                dataLabels: {
                    enabled: !1
                }
            },
            t = new ApexCharts(document.querySelector("#layout-3-chart-03"), e);
        t.render();
        document.querySelector("body").classList.contains("dark") && a(t, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(t, e.detail)
        }))
    }
    if (e("#layout-3-chart-04").length) {
        o = {
            series: [86, 40, 53, 63],
            chart: {
                height: 350,
                type: "radialBar"
            },
            plotOptions: {
                radialBar: {
                    dataLabels: {
                        name: {
                            fontSize: "22px"
                        },
                        value: {
                            fontSize: "16px"
                        },
                        total: {
                            show: !0,
                            label: "Total",
                            formatter: function (e) {
                                return 249
                            }
                        }
                    }
                }
            },
            colors: ["#876cfe", "#4788ff", "#ffca44", "#fe721c"],
            labels: ["Picture view", "Comments", "Video plays", "Impressions"]
        };
        (n = new ApexCharts(document.querySelector("#layout-3-chart-04"), o)).render();
        document.querySelector("body").classList.contains("dark") && a(n, {
            dark: !0
        }), document.addEventListener("ChangeColorMode", (function (e) {
            a(n, e.detail)
        }))
    }
}(jQuery);