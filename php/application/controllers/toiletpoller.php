<?php

class Toiletpoller extends CI_Controller
{

    public function index()
    {
        $url = 'dptknokke.ns01.info:8080/TESTTEST:dkHf4ksP/api/gpio/23';
        $availableCount = 0;
        $usedCount = 0;
        for ($i = 0; $i < 5; ++$i) {
            //  Initiate curl
            $ch = curl_init();
            // Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // Set the url
            curl_setopt($ch, CURLOPT_URL, $url);
            // Execute
            $result = curl_exec($ch);
            // Closing
            curl_close($ch);
            $json = json_decode($result);
            if ($json->state == 0) {
                ++$usedCount;
            } else {
                ++$availableCount;
            }
            sleep(1);
        }

        $lastStatus = $this->model_polling->getLastStatus(1);
        echo $lastStatus[0]->status;
        if ($availableCount > $usedCount) {
            if ($lastStatus[0]->status == '0') {
                echo 'Last status was true, storing false (1) in db';
                $this->model_polling->insertStatus(1, 1);
                $this->model_polling->updateDailyChart(1);
            }
        } else if ($lastStatus[0]->status == '1') {
            echo 'Last status was false, storing true (0) in db';
            $this->model_polling->insertStatus(1, 0);
        }
    }
}

?>