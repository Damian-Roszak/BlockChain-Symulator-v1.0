
<?php

function CountDown($hour, $minute, $second, $month, $day, $year) {
        $eventDate = mktime($hour, $minute, $second, $month, $day, $year);
        $today = mktime();
       
        $secondsTo = $eventDate - $today;
        $minutesTo = round($secondsTo / 60);
        $hoursTo = round($minutesTo / 60);
        $daysTo = round($hoursTo / 24);
        $weeksTo = round($daysTo / 7);
        $monthsTo = round($weeksTo / 4);
        $yearsTo = round($monthsTo / 12);
       
        $values = array(
                "seconds" => $secondsTo,
                "minutes" => $minutesTo,
                "hours" => $hoursTo,
                "days" => $daysTo,
                "weeks" => $weeksTo,
                "months" => $monthsTo,
                "years" => $yearsTo
        );
       
        return $values;
}

?>
