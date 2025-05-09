

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment - Egyptian Museum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('../assets/img//ar2.jpg');
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
      box-shadow: 0 0 30px goldenrod;
    }
    label {
      color: #fff;
    }
    h1 {
      color: gold;
    }
    .ticket {
      width: 350px;
      padding: 20px;
      text-align: center;
      background: linear-gradient(135deg, #fff8dc, #f5deb3);
      border: 5px double #a67c00;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      position: relative;
      font-family: 'Segoe UI', sans-serif;
      margin: auto;
    }
    .ticket h2 {
      font-size: 24px;
      color: #7a5901;
    }
    .ticket p {
      font-size: 16px;
      color: #3a2c00;
      margin: 5px 0;
    }
    #qrcode canvas {
      margin-top: 15px;
    }
    .download-btn {
      margin-top: 15px;
      padding: 8px 20px;
      background-color: #d4af37;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    .btn-close-custom {
      position: absolute;
      top: 10px;
      right: 10px;
      background: none;
      border: none;
      font-size: 20px;
      font-weight: bold;
      color: #000;
      z-index: 99;
    }
  </style>
</head>
<body>
  <a href="index.php" class="btn btn-dark position-absolute top-0 end-0 m-4 ">Home</a>
  <div class="container">
    <div class="overlay">
      <h1 class="text-center mb-4">Payment Confirmation💳</h1>
      <form id="paymentForm">
        <div class="mb-3">
          <label for="paymentMethod" class="form-label">Select Payment Method</label>
          <select class="form-select" id="paymentMethod" required>
            <option value="">Choose a method</option>
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Wallet">Wallet</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cardNumber" class="form-label">Card / Wallet Number</label>
          <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" required />
        </div>
        <button type="submit" class="btn btn-warning w-100 ">Pay Now</button>
      </form>
    </div>
  </div>

  <div class="modal fade" id="ticketModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0 bg-transparent">
        <div class="modal-body" id="ticketArea"></div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script>
    const form = document.getElementById('paymentForm');
    const modal = new bootstrap.Modal(document.getElementById('ticketModal'));

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const ticketData = JSON.parse(localStorage.getItem('ticketData')) || {
  title: 'Unknown Event',
  description: 'No description',
  date: 'Unknown date',
  count: 1,
  price: 50,
  total: 50
};
const method = document.getElementById('paymentMethod').value;

const ticketHTML = `
  <div class="ticket" id="ticketContent">
    <button type="button" class="btn-close-custom" onclick="closeModal()">×</button>
    <h2>🎫 Egyptian Museum Ticket</h2>
    <p><strong>Event Title:</strong> ${ticketData.title}</p>
    <p><strong>Description:</strong> ${ticketData.description}</p>
    <p><strong>Date:</strong> ${ticketData.date}</p>
    <p><strong>Number of Visitors:</strong> ${ticketData.count}</p>
    <p><strong>Price per Ticket:</strong> ${ticketData.price} EGP</p>
    <p><strong>Total Paid:</strong> ${ticketData.total} EGP</p>
    <hr>
    <p><strong>Payment Method:</strong> ${method}</p>
    <p><strong>Ref No.:</strong> ${Math.floor(100000 + Math.random() * 900000)}</p>
    <div id="qrcode"></div>
    <button class="download-btn" onclick="downloadTicket()">Download as Image</button>
  </div>
`;



      document.getElementById('ticketArea').innerHTML = ticketHTML;

      setTimeout(() => {
        QRCode.toCanvas(document.getElementById('qrcode'), 'Museum Visit - ' + ticketData.date, function (error) {
          if (error) console.error(error);
        });
      }, 100);

      modal.show();
    });

    function closeModal() {
      const modalElement = document.getElementById('ticketModal');
      const modalInstance = bootstrap.Modal.getInstance(modalElement);
      modalInstance.hide();
    }

    function downloadTicket() {
      const ticket = document.getElementById('ticketContent');
      html2canvas(ticket).then(canvas => {
        const link = document.createElement('a');
        link.href = canvas.toDataURL('image/png');
        link.download = 'egyptian_museum_ticket.png';
        link.click();
      });
    }
  </script>
</body>
</html>
