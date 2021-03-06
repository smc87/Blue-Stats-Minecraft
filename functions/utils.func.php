<?php
function secondsToTime($seconds, $contract = true)
{
    if (!empty($seconds)) {
        $dtF = new DateTime("@0");
        $dtT = new DateTime("@$seconds");
        if ($contract) {
            $mins = floor($seconds/60);
            $hours = floor($mins/60);
            $days = floor($hours/24);
            $weeks = floor($days/7);
            $months = floor($weeks/4.348125);
            $years = floor($months/12);

            $seconds -= $mins * 60;
            $mins -= $hours * 60;
            $hours -= $days * 24;
            $days -= $weeks * 7;
            $weeks -= $months * 4.348125;
            $months -= $years * 12;

            /* Text seconds */
            if (round($seconds)>0){
                if (round($seconds)>1){
                    $tseconds = $seconds . " seconds";
                }else{
                    $tseconds = $seconds . " second";
                }
            }else{
                $tseconds = "0 seconds";
            }

            /* Text mins */
            if (round($mins)>0){
                if (round($mins)>1){
                    $tmins = $mins . " mins";
                }else{
                    $tmins = $mins . " min";
                }
            }else{
                $tmins = "0 mins";
            }

            /* Text hours */
            if (round($hours)>0){
                if (round($hours)>1){
                    $thours = $hours . " hours";
                }else{
                    $thours = $hours . " hours";
                }
            }else{
                $thours = "0 hours";
            }

            /* Text days */
            if (round($days)>0){
                if (round($days)>1){
                    $tdays = $days . " days";
                }else{
                    $tdays = $days . " day";
                }
            }else{
                $tdays = "0 days";
            }

            /* Text weeks */
            if (round($weeks)>0){
                if (round($weeks)>1){
                    $tweeks = round($weeks) . " weeks";
                }else{
                    $tweeks = round($weeks) . " week";
                }
            }else{
                $tweeks = " 0 weeks";
            }

            /* Text months */
            if (round($months)>0){
                if (round($months)>1){
                    $tmonths = $months . " months";
                }else{
                    $tmonths = $months . " month";
                }
            }else{
                $tmonths = "0 months";
            }

            /* Text years */
            if (round($years)>0){
                if (round($years)>1){
                    $tyears = $years . " years";
                }else{
                    $tyears = $years . " year";
                }
            }else{
                $tyears = "0 years";
            }

            if ($years > 0){
                return "$tyears, $tmonths and $tweeks";
            }else if ($months > 0){
                return "$tmonths, $tweeks and $tdays";
            }else if($weeks> 0){
                return "$tweeks, $tdays and $thours";
            }else if($days > 0){
                return "$tdays and $thours";
            }else if ($hours > 0){
                return "$thours and $tmins";
            }else if($mins > 0){
                return "$tmins and $tseconds";
            }else{
                return $tseconds;
            }
        } else {
            if ($seconds >= 86400) {
                return $dtF->diff($dtT)->format('%ad:%hh:%mm:%ss');
            } elseif ($seconds >= 3600) {
                return $dtF->diff($dtT)->format('%hh:%im:%ss');
            } elseif ($seconds >= 60) {
                return $dtF->diff($dtT)->format('%im:%ss');
            } else {
                return $seconds . " seconds";
            }
        }
    }
    return false;
}