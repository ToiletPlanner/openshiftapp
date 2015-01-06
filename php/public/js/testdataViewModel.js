/**
 * Created by matthieu on 13/11/14.
 */
var ViewModel = function() {
    var self = this;
    self.changeStatusTable = ko.observableArray();

    self.loadChangeStatusTable = function() {
        $.getJSON('/api/room', function(data) {
            $.each(data, function (i, item) {
                self.loadStatus(item.id, item.name);
            });
        });
    };

    self.loadStatus = function(id, name) {
        $.getJSON('/api/roomstatus/' + id, function(data) {
            $.each(data, function (i, item) {
                self.addChangeStatusTableData(item.roomid, name, item.status);
            });
        });
    }

    self.addChangeStatusTableData = function(roomid, name, state) {
        var status;
        if(state == 1) {
            status = {id: roomid, name: name, tstate: "Beschikbaar"};
        } else {
            status = {id: roomid, name: name,  tstate: "Bezet"};
        }
        self.changeStatusTable.push(status);

        $('#changebtn-' + roomid).bind('click', function(event, data){
            changeState(roomid);
            event.stopPropagation();

        });
    };

    self.cleartable = function() {
        gvm.changeStatusTable.removeAll();
    }
};

function changeState(id) {
    $.ajax({
        url: "/api/changeroomstatus/" + id,
        type: "POST",
        success: function() {
            location.reload();
        }
    });
}


var vm = new ViewModel();
ko.applyBindings(vm);
vm.loadChangeStatusTable();

