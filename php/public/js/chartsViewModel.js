/**
 * Created by matthieu on 13/11/14.
 */
var ViewModel = function() {
    var self = this;
    self.weeklyUsage = [];

    self.room1 = [];
    self.room2 = [];

    self.loadTable = function() {
        $.getJSON('/api/weeklyChart', function(data) {
            $.each(data, function (i, item) {
                $.each(item, function (i, item) {
                    var obj = {date: item.date, used: item.timesaccessed, roomid : item.roomid};
                    if(item.roomid == 1) {
                        self.room1.push(obj);
                    } else {
                        self.room2.push(obj);
                    }
                });
            });
            addMorris();
        });
    }
};

function addMorris() {
    var chart = [];
    for(i = 0; i < 7; i++) {
        var obj = {date: vm.room1[i].date, room1: vm.room1[i].used, room2: vm.room2[i].used};
        chart.push(obj);
    }

    new Morris.Line({
        element: 'weekchart',
        data: chart,
        xkey: 'date',
        ykeys: ['room1', 'room2'],

        xLabels : "day",

        labels: ['Toilet', 'Vergaderzaal 1']
    });
}


var vm = new ViewModel();
ko.applyBindings(vm);
vm.loadTable();


