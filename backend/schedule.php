<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

function fetch_course_data($url) {
    if (strpos($url, "https://") === 0) {
        $url = "http://" . substr($url, 8);
    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
        return [];
    }

    curl_close($ch);

    return json_decode($response, true);
}

function parse_course_time($course_time) {
    preg_match_all('/([一二三四五六日])([A-H1-8]+)/u', $course_time, $matches, PREG_SET_ORDER);
    $parsed_times = [];

    foreach ($matches as $match) {
        $day_char = $match[1];
        $periods = $match[2];
        $parsed_times[] = [$day_char, $periods];
    }

    return $parsed_times;
}

function get_schedule($url) {
    $data = fetch_course_data($url);

    $schedule = [
        'A' => array_fill(0, 7, ""),
        'B' => array_fill(0, 7, ""),
        '1' => array_fill(0, 7, ""),
        '2' => array_fill(0, 7, ""),
        '3' => array_fill(0, 7, ""),
        '4' => array_fill(0, 7, ""),
        'C' => array_fill(0, 7, ""),
        'D' => array_fill(0, 7, ""),
        '5' => array_fill(0, 7, ""),
        '6' => array_fill(0, 7, ""),
        '7' => array_fill(0, 7, ""),
        '8' => array_fill(0, 7, ""),
        'E' => array_fill(0, 7, ""),
        'F' => array_fill(0, 7, ""),
        'G' => array_fill(0, 7, ""),
        'H' => array_fill(0, 7, "")
    ];

    $day_map = [
        '一' => 0,
        '二' => 1,
        '三' => 2,
        '四' => 3,
        '五' => 4,
        '六' => 5,
        '日' => 6
    ];

    foreach ($data as $course) {
        $course_name = isset($course["subNam"]) ? $course["subNam"] : "無課名";
        $course_time = isset($course["subTime"]) ? $course["subTime"] : "";

        if ($course_time) {
            $parsed_times = parse_course_time($course_time);
            foreach ($parsed_times as $time) {
                $day_char = $time[0];
                $periods = $time[1];

                if (isset($day_map[$day_char])) {
                    $day = $day_map[$day_char];
                    for ($i = 0; $i < strlen($periods); $i++) {
                        $period = $periods[$i];
                        if (isset($schedule[$period][$day])) {
                            if ($schedule[$period][$day]) {
                                $schedule[$period][$day] .= " / " . $course_name;
                            } else {
                                $schedule[$period][$day] = $course_name;
                            }
                        }
                    }
                }
            }
        }
    }

    return json_encode($schedule);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request = json_decode(file_get_contents("php://input"), true);
    $url = $request['url'];
    echo get_schedule($url);
}
?>
