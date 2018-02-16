$(document).ready(function() {
    $(function() {
        $(".preloader").fadeOut();
        $('#side-menu').metisMenu();
        $("body").trigger("resize");
    });

    //Loads the correct sidebar on window load,
    //collapses the sidebar on window resize.
    // Sets the min-height of #page-wrapper to window size
    $(function() {
        $(window).bind("load resize", function() {
            topOffset = 50;
            width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            if (width < 768) {
                $('div.navbar-collapse').addClass('collapse');
                topOffset = 100; // 2-row-menu
            } else {
                $('div.navbar-collapse').removeClass('collapse');
            }

            height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
            height = height - topOffset;
            if (height < 1) height = 1;
            if (height > topOffset) {
                $("#page-wrapper").css("min-height", (height) + "px");
            }
        });

        var url = window.location;
        var element = $('ul.nav a').filter(function() {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }).addClass('active').parent().parent().addClass('in').parent();
        if (element.is('li')) {
            element.addClass('active');
        }
    });

    $(function() {
        $(window).bind("load resize", function() {
            width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
            if (width < 1025) {
                $('body').addClass('content-wrapper');
                $(".open-close i").removeClass('ti-arrow-circle-left');
                $(".logo span").hide();
            } else {
                $('body').removeClass('content-wrapper');
                $(".open-close i").addClass('ti-arrow-circle-left');
                $(".logo span").show();
            }
        });
    });

    $(document).ready(function () {
        $('#example').DataTable();
        if (window.location.pathname === '/reports'){
            $('#report-date-range').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        }
    });

    // Sidebar open close
    $(".open-close").click(function() {
        $(".open-close i").toggleClass("ti-arrow-circle-left");
        $(".logo span").toggle();
        $("body").toggleClass("content-wrapper");
    });

    if (window.location.pathname === '/dashboard'){
        $.ajax({
            url: 'transactions/count/months',
            type: 'GET'
        }).then( function (data) {
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

            Morris.Area({
                element: 'morris-area-chart',
                data: data,
                xkey: 'month',
                ykeys: ['Total', 'Failed', 'Successful'],
                labels: ['Total Transactions', 'Failed Transactions', 'Successful Transactions'],
                xLabelFormat: function(x){
                    var month = months[x.getMonth()];
                    return month;
                },
                dateFormat: function(x){
                    var month = months [new Date(x).getMonth()];
                    return month;
                },
                pointSize: 0,
                fillOpacity: 0.6,
                pointStrokeColors: ['#BFBFBF', '#51e4ff', '#16198d'],
                behaveLikeLine: true,
                gridLineColor: '#eef0f2',
                lineWidth: 1,
                hideHover: 'auto',
                lineColors: ['#BFBFBF', '#51e4ff', '#16198d'],


                resize: true

            });
        });
    }
});
