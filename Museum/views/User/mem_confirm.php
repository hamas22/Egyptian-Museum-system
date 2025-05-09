<?php

$selectedType = $_GET['type'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Membership Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            color: white;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.75);
            padding: 40px;
            border-radius: 20px;
            margin-top: 60px;
            box-shadow: 0 0 30px gold;
        }

        label {
            color: #f8f9fa;
        }

        h1 {
            color: gold;
        }
    </style>
</head>

<body>
    <button onclick="history.back()" class="btn btn-dark position-absolute top-0 end-0 m-4">
        🔙 Back
    </button>

    <div class="container">
        <div class="overlay">
            <h1 class="text-center mb-4">Membership Confirmation 💳</h1>
            <form id="visitForm" action="payment_mem.php" method="POST">

                <div class="mb-3">
                    <label for="type_of_membership" class="form-label">Membership Type</label>
                    <input type="text" class="form-control" id="type_of_membership" name="type_of_membership" value="<?php echo $selectedType; ?>" readonly required />
                </div>

                <div class="mb-3">
                    <label for="startDate" class="form-label">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="start_date" required min="" />
                </div>

                <div class="mb-3">
                    <label for="last_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="last_date" name="last_date" required />
                </div>

                <button type="submit" class="btn btn-warning w-100">Continue to Payment</button>
            </form>
        </div>
    </div>

    <script>
        // تعيين الحد الأدنى لتاريخ البدء ليكون اليوم
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('startDate').setAttribute('min', today);

        // حساب تاريخ النهاية بناءً على تاريخ البداية
        document.getElementById('startDate').addEventListener('change', function() {
            const startDate = new Date(this.value);
            if (!isNaN(startDate.getTime())) {
                const last_date = new Date(startDate);
                last_date.setFullYear(last_date.getFullYear() + 1);

                const formattedEndDate = last_date.toISOString().split('T')[0];
                document.getElementById('last_date').value = formattedEndDate;
            }
        });

        // التحقق من تاريخ البدء قبل إرسال النموذج
        document.getElementById('visitForm').addEventListener('submit', function(e) {
            const startDateInput = document.getElementById('startDate');
            const startDate = new Date(startDateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0); // تطبيع المقارنة لتاريخ فقط

            if (startDate < today) {
                e.preventDefault(); // منع الإرسال
                alert("Start date cannot be in the past.");
                startDateInput.focus();
            }
        });
    </script>
</body>

</html>