<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/sweetalert2@11.0.0/dist/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert2@11.0.0/dist/sweetalert2.min.js"></script>>
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<script>
function showLoadingSwal() {
  return Swal.fire({
    title: 'Loading...',
    text: 'Vui lòng chờ trong giây lát!',
    timer: 5000,
    showConfirmButton: false,
    imageUrl: '/view/image/gif/loading.gif',
    onBeforeOpen: function() {
      Swal.showLoading();
    },
    allowOutsideClick: false // Không cho phép đóng khi click ra ngoài
  });
}
showLoadingSwal();
</script>