<?php
    namespace App\Traits;

    trait CommonFunctions
    {
        public function format_date($date)
        {
            return date('d M, Y',strtotime($date));
        }

        public function format_time($time)
        {
            return date('h:i A',strtotime($time));
        }
    }
