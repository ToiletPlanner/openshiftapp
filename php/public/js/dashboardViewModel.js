var ViewModel = function() {
    var self = this;
    self.statusTable = ko.observableArray();
    self.usageTable = ko.observableArray();

    //Global function
    /**
     * Get all existing toilets from the api
     */
    self.loadRooms = function() {
        $.getJSON('/api/room', function(data) {
            $.each(data, function (i, item) {
                self.loadStatus(item.id, item.name);
                self.loadUsage(item.id, item.name);
            });
        });
    };

    //Functions for the StatusTable
    /**
     * Get the state per toilet from the api
     * @param id The toiletid
     */
    self.loadStatus = function(id, name) {
        $.getJSON('/api/roomstatus/' + id, function(data) {
            $.each(data, function (i, item) {
                self.addStatusTableData(item.roomid, name, item.status);
            });
        });
    };

    /**
     * Adds the data from the LoadStatus function and adds it to the observable array
     * @param id
     * @param status
     */
    self.addStatusTableData = function(id, name, state) {
        var status;
        if(state == 1) {
            status = {stateid: id, name: name, tstate: "Beschikbaar"};
        } else {
            status = {stateid: id, name: name,  tstate: "Bezet"};
        }
        self.statusTable.push(status);
    };

    //Functions for the usageTable
    /**
     * Get the usage per toilet from the api
     * @param id
     */
    self.loadUsage = function(id, name) {
        $.getJSON('/api/roomusage/' + id, function(data) {
            $.each(data, function (i, item) {
                self.addUsageTableData(item.roomid, name,  item.usage);
            });
        });
    }

    /**
     * Adds the data from the loadUsage-function and adds it to the observable array
     * @param id
     * @param usage
     */
    self.addUsageTableData = function(id, name,  usage) {
        var usage = {usageid: id, name: name, tusage: usage};
        self.usageTable.push(usage);
    };
};

function polling() {
    vm.loadRooms();
    setTimeout(polling, 1000);
}


var vm = new ViewModel();
ko.applyBindings(vm);
vm.loadRooms();