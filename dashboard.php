<?php
session_start();
include "config.php";

// pastikan hanya admin yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// load PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function kirimEmail($to, $subject, $message){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'emrysimarmata7@gmail.com';
        $mail->Password   = 'endcpuvfuczzzwbl';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('emrysimarmata7@gmail.com','HR Perusahaan X');
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch(Exception $e){
        return false;
    }
}

// proses update status
$popupMessage = "";
if(isset($_POST['update_status'])){
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query = "SELECT email, nama FROM pendaftaran_karyawan WHERE id='$id'";
    $result = $conn->query($query);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $nama  = $row['nama'];

        if(!empty($email)){
            $sql = "UPDATE pendaftaran_karyawan SET status='$status' WHERE id='$id'";
            if($conn->query($sql) === TRUE){
                if($status == "diterima"){
                    $subject = "Hasil Lamaran Kerja - DITERIMA";
                    $message = "<h3>Halo $nama,</h3><p>Selamat! Lamaran kerja Anda <b>DITERIMA</b> di Perusahaan X.</p>";
                } elseif($status == "ditolak"){
                    $subject = "Hasil Lamaran Kerja - DITOLAK";
                    $message = "<h3>Halo $nama,</h3><p>Mohon maaf, lamaran Anda <b>DITOLAK</b>.</p>";
                } else {
                    $subject = "Update Status Lamaran";
                    $message = "<h3>Halo $nama,</h3><p>Status lamaran Anda diperbarui: $status</p>";
                }

                if(kirimEmail($email, $subject, $message)){
                    $popupMessage = "Email terkirim ke $email";
                } else {
                    $popupMessage = "Status diperbarui tapi email gagal terkirim!";
                }
            } else {
                $popupMessage = "Gagal update status ke database!";
            }
        } else {
            $popupMessage = "Email pelamar kosong! Tidak bisa mengirim email.";
        }
    } else {
        $popupMessage = "Data pelamar tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { font-family: 'Segoe UI', Tahoma, sans-serif; background:#e6f2e6; padding:20px; }
.container { background:#fff8e7; padding:30px; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1); }
h2 { color:#d4af37; text-shadow:1px 1px 4px rgba(212,175,55,0.4); margin-bottom:20px; }
a.logout { background:linear-gradient(135deg,#ffd700,#daa520); color:#1a1a1a; padding:10px 20px; border-radius:8px; text-decoration:none; font-weight:bold; transition:0.3s; }
a.logout:hover { background:linear-gradient(135deg,#ffec8b,#e6be2d); }
table { width:100%; border-collapse: collapse; margin-top:10px; }
table th, table td { border:1px solid #d4af37; padding:10px; text-align:center; }
table th { background: linear-gradient(135deg,#ffd700,#daa520); color:#1a1a1a; font-weight:bold; }
table tr:nth-child(even) { background: rgba(212,175,55,0.1); }
select { padding:6px 8px; border-radius:6px; border:1px solid #d4af37; }
button.update-btn { background: linear-gradient(135deg,#ffd700,#daa520); color:#1a1a1a; border:none; padding:6px 12px; border-radius:6px; font-weight:bold; cursor:pointer; transition:0.3s; }
button.update-btn:hover { background: linear-gradient(135deg,#ffec8b,#e6be2d); }
a.cv-link { color:#d4af37; font-weight:bold; text-decoration:none; }
a.cv-link:hover { text-shadow:1px 1px 3px rgba(212,175,55,0.5); }
</style>
</head>
<body>
<div class="container">
<h2>Dashboard Admin - Data Pelamar</h2>
<a href="logout.php" class="logout">Logout</a>
<table class="table table-hover">
<tr>
<th>No</th><th>Nama</th><th>Email</th><th>Telepon</th><th>CV</th><th>Status</th><th>Aksi</th>
</tr>
<?php
$no=1;
$sql = "SELECT * FROM pendaftaran_karyawan";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>".$no++."</td>
        <td>".$row['nama']."</td>
        <td>".$row['email']."</td>
        <td>".$row['telepon']."</td>
        <td><a class='cv-link' href='uploads/".$row['cv']."' target='_blank'>Lihat CV</a></td>
        <td>".$row['status']."</td>
        <td>
            <form method='POST' class='d-flex justify-content-center align-items-center'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <select name='status' class='form-select form-select-sm me-2'>
                    <option value='pending' ".($row['status']=='pending'?'selected':'').">Pending</option>
                    <option value='diterima' ".($row['status']=='diterima'?'selected':'').">Diterima</option>
                    <option value='ditolak' ".($row['status']=='ditolak'?'selected':'').">Ditolak</option>
                </select>
                <button type='submit' name='update_status' class='update-btn btn btn-sm'>Update</button>
            </form>
        </td>
    </tr>";
}
?>
</table>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Informasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <?php echo $popupMessage; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-gold" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<?php if(!empty($popupMessage)): ?>
<script>
var myModal = new bootstrap.Modal(document.getElementById('statusModal'));
myModal.show();
</script>
<?php endif; ?>
</body>
</html>
