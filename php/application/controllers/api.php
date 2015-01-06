<?php
include(APPPATH.'libraries/REST_Controller.php');
class Api extends REST_Controller {

    /**
     * Get all available rooms from database
     */
    public function room_get() {
        $rooms = $this->model_api->getAllRooms();
        $this->response($rooms, 200);
    }

    /**
     * Get the current status from a specific room
     * @param $id Roomid
     */
    public function roomStatus_get($id) {
        $roomStatus = $this->model_api->getRoomStatusById($id);
        $this->response($roomStatus, 200);
    }

    /**
     * Returns the amount of times the room is used today
     * @param $id
     */
    public function roomUsage_get($id) {
        $queryResult = $this->model_api->getRoomUsageById($id);
        $toiletUsage[0]["roomid"] = $id;
        $toiletUsage[0]["usage"] = 0;
        foreach ($queryResult as $row) {
            $toiletUsage[0]["usage"]++;
        }
        $toiletUsage[0]["usage"] = round(($toiletUsage[0]["usage"] / 2), 0, PHP_ROUND_HALF_DOWN);
        $this->response($toiletUsage, 200);
    }

    /**
     * Get all the rooms with their current status
     */
    public function allRoomStatus_get()
    {
        $rooms = $this->model_api->getAllRooms();
        $roomWithStatus = array();
        foreach ($rooms as $room) {
            $currentRoomStatus = $this->model_api->getRoomStatusById($room->id);
            $currobj = array();
            $currobj["id"] = $currentRoomStatus[0]->id;
            $currobj["roomid"] = $currentRoomStatus[0]->roomid;
            $currobj["roomname"] = $room->name;
            $currobj["status"] = $currentRoomStatus[0]->status;
            $currobj["lastaccessed"] = $currentRoomStatus[0]->lastaccessed;
            array_push($roomWithStatus, $currobj);
        }
        $this->response($roomWithStatus, 200);
    }

    public function changeroomstatus_post($id) {
        $this->model_api->changeRoomStatusById($id);
    }

    public function weeklyChart_get() {
        $queryResult = $this->model_api->getAllRooms();

        $data = array();
        foreach($queryResult as $room) {
           $queryResult2 = $this->model_api->getWeekChart($room->id);
            array_push($data, $queryResult2);
        }
        $this->response($data, 200);
    }
}
?>
