<?PHP
   $datetimes = [
    "15-05-2023 09:30:00",
    "16-05-2023 12:45:00",
    "14-05-2023 18:20:00",
    "17-05-2023 15:10:00"
];

// Chuyển đổi mảng datetime thành timestamp
$timestamps = array_map(function($datetime) {
    return strtotime($datetime);
}, $datetimes);

// Tìm thời gian lớn nhất trong mảng timestamp
$maxTimestamp = max($timestamps);

// Chuyển đổi thời gian lớn nhất từ timestamp về định dạng "d-m-Y H:i:s"
$maxDatetime = date("d-m-Y H:i:s", $maxTimestamp);

// In ra thời gian lớn nhất
echo "Thời gian lớn nhất: " . $maxDatetime;



?>