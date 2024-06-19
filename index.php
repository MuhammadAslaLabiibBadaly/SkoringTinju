<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leaderboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style type="text/css">
    .center-block {
      display: table;
      margin-left: auto;
      margin-right: auto;
      height: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">LEADERBOARD</a>
    </div>
  </nav>
  <h2 align="center">SKOR TINJU TIMEZONE</h2>
  <div class="content" align="center">
    <table class="table table-dark table-striped-columns" style="text-align:center; width: 500px;">
      <?php
      require_once('koneksi.php');
      $query1 = "SELECT * from ranking order by nama ";
      $pola = 'asc';
      $polabaru = 'asc';
      if (isset($_GET['orderby'])) {
        $orderby = $_GET['orderby'];
        $pola = $_GET['pola'];

        $query1 = "SELECT * FROM  ranking order by $orderby $pola ";
        if ($pola == 'asc') {
          $polabaru = 'desc';
        } else {
          $polabaru = 'asc';
        }
      }
      ?>

      <form action='index.php' method="POST">
        <div class="input-group" style="width: 300px; height: 35px; padding: 10px 0px 10px 0px;">
          <input type='text' value='' name='qcari' class="qcari" placeholder='  cari data...' style="height: 35px; width: 200px;">
          <input type='submit' value='cari' class="btn btn-success cari" style="height: 35px;"><a href='index.php' class="btn btn-primary all" role="button" style="height: 35px;">All</a>
        </div>
      </form>
      <thead>
        <tr>
          <td>Ranking</td>
          <td><a href='index.php?orderby=nama&pola=<?= $polabaru; ?>'>Nama</a></td>
          <td><a href='index.php?orderby=skor&pola=<?= $polabaru; ?>'>Skor</a></td>
          <td>Aksi</td>
        </tr>
      </thead>
      <br>
      <?php
      //query database 
      if (isset($_POST['qcari'])) {
        $qcari = $_POST['qcari'];
        $query1 = "SELECT * FROM  ranking where nama like '%$qcari%' or nama like '%$qcari%' and skor like '%$qcari%' or skor like '%$qcari%'  ";
      }

      $result = mysqli_query($host, $query1) or die(mysqli_error($host));
      $no = 1; //penomoran 
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = mysqli_fetch_object($result)) {
      ?>
          <tr>
            <td><?php echo "#" . $no; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->skor; ?></td>
            <td>
              <form action="edit_data.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin mengedit data ini?');">Edit</button>
              </form> |
              <form action="delete_data.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</button>
              </form>
            </td>
          </tr>
      <?php
          $no++;
        }
      } else {
        echo "0 results";
      } ?>
    </table>
    <a href="tambah_data.php" class="btn btn-primary" role="button">Tambah Data</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
