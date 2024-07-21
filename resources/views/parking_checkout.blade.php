<!-- resources/views/checkout/show.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Item Information</title>
</head>

<body>
    <h2>Thông tin thanh toán</h2>
    <p>Họ tên: {{ $item->sender->full_name }}</p>
    <p>Biển số xe: {{ $item->informationVehicle->license_plates }}</p>
    <p>Thời gian vào: {{ $formattedEntryTime }}</p>
    <p>Thời gian ra: {{ $formattedExitTime }}</p>
    <p>Tổng thời gian đỗ: {{ $totalHours }} giờ</p>
    <p>Tổng chi phí: {{ $totalCost }} VNĐ</p>
</body>

</html>