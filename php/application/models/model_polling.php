<?php

class Model_polling extends CI_Model {
    function getLastStatus($id) {
        $sql = "SELECT * FROM available WHERE roomid = ? ORDER BY id DESC LIMIT 1";
        $query = $this->db->query($sql, $id);
        return $query->result();
    }

    function geThreetLastStatusses($id) {
        $sql = "SELECT * FROM available WHERE roomid = ? ORDER BY id DESC LIMIT 3";
        $query = $this->db->query($sql, $id);
        return $query->result();
    }

    function insertStatus($roomid, $status) {
        $data = array(
            'roomid' => $roomid,
            'status' => $status,
            'lastaccessed' => date('Y-m-d H:i:s')
        );
        $this->db->insert('available', $data);
    }

    function updateDailyChart($roomid) {
        $lastStatus = $this->geThreetLastStatusses($roomid);
        $day = date('Y-m-d', strtotime($lastStatus[2]->lastaccessed));
        $today = date('Y-m-d');
        if( $day == $today ) {
            $this->incrementDailyChart($roomid);
        } else {
            $this->insertDailyChart($roomid);
        }
    }

    function insertDailyChart($roomid) {
        $data = array(
            'roomid' => $roomid,
            'date' => date('Y-m-d'),
            'timesaccessed' => 1
        );
        $this->db->insert('dailyusage', $data);
    }

    function incrementDailyChart($roomid) {
        $sql = "UPDATE dailyusage SET timesaccessed = timesaccessed+1 WHERE roomid = ? ";
        $this->db->query($sql, $roomid);
    }


}