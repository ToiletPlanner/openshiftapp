<?php

class Model_api extends CI_Model {
    function getAllRooms()
    {
        $query = $this->db->query("SELECT * FROM room");
        return $query->result();
    }

    function getRoomStatusById($id) {
        $sql = "SELECT * FROM available WHERE roomid = ? ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql, $id);
        return $query->result();
    }

    function getRoomUsageById($id) {
        $sql = "SELECT * FROM available WHERE roomid = ? AND DATE(lastaccessed) = ?";
        $query = $this->db->query($sql, array($id, date("Y-m-d")));
        return $query->result();
    }

    function getUsageByIdAndDate($id, $date) {
        $sql = "SELECT * FROM available WHERE roomid = ? AND DATE(lastaccessed) = ?";
        $query = $this->db->query($sql, array($id, $date));
        return $query->result();
    }

    function getUsageByDate($id, $date) {
        $sql = "SELECT * FROM available WHERE roomid = ? AND DATE(lastaccessed) = ?";
        $query = $this->db->query($sql, array($id, $date));
        return $query->result();
    }

    function getWeekChart($id) {
        $sql = "SELECT * FROM dailyusage WHERE roomid = ? AND DATE(date) BETWEEN CURDATE() - INTERVAL 7 DAY and CURDATE()";
        $query = $this->db->query($sql, $id);
        return $query->result();
    }

    function changeRoomStatusById($id) {
        $currentstatus = $this->getRoomStatusById($id);
        if($currentstatus[0]->status == 0) {
            $this->model_polling->insertStatus($id, 1);
            $this->model_polling->updateDailyChart($id);
        } else {
            $this->model_polling->insertStatus($id, 0);
        }
    }

}