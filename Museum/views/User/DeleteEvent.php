<?php
require_once '../../controllers/controle.php'; // تأكد من المسار الصحيح

$museumController = new museum_controller();

// التحقق من اتصال قاعدة البيانات
if (!$museumController->openconnection()) {
    die("Failed to connect to the database.");
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $eventId = $museumController->escape_string($_GET['id']);

    // إنشاء استعلام الحذف باستخدام دالة delete من المتحكم
    $query = "DELETE FROM event WHERE event_Id = $eventId";
    $deleteResult = $museumController->delete($query);

    if ($deleteResult === true) {
        // تم الحذف بنجاح، قم بتوجيه المستخدم إلى صفحة الأحداث
        header("Location: event.php");
        exit();
    } else {
        // حدث خطأ أثناء الحذف، يمكنك عرض رسالة خطأ هنا
        echo "Error deleting event: " . $deleteResult;
    }
} else {
    // إذا لم يتم تمرير مُعرّف صالح، يمكنك توجيه المستخدم أو عرض رسالة خطأ
    echo "Invalid event ID.";
}

$museumController->closeconnection(); // إغلاق الاتصال
?>