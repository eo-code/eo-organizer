<?php
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
$data_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
$produk = mysqli_query($koneksi, "SELECT * FROM produk");

$listIdKategori = array();


while ($IdKategori = mysqli_fetch_array($produk)) {
  array_push($listIdKategori, $IdKategori["id_kategori"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="../../../assets/semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../assets/semantic/style.css">
</head>

<body>

  <div class="ui top attached demo menu">
    <a class="item">
      <i class="sidebar icon"></i> Menu
    </a>

  </div>
  <div class="ui bottom attached segment">
    <div class="ui inverted labeled icon left inline vertical demo sidebar menu">
      <a href="daftarMember.php" class="item">
        <i class="address card icon"></i> Member
      </a>
      <a href="daftarBooking.php" class="item">
        <i class="book icon"></i> Booking
      </a>
      <a href="produk.php" class="item">
        <i class="shopping cart icon"></i> Product
      </a>
      <a href="kategori.php" class="item">
        <i class="th large icon"></i> Kategori
      </a>
      <a href="gallery.php" class="item">
        <i class="image icon"></i> Gallery
      </a>
      <a href="akun_admin.php" class="item">
        <i class="user circle icon"></i> Account
      </a>
      <a href="../../backend/admin/akun_admin/logout.php" class="item">
        <i class="sign out icon"></i> Logout
      </a>
    </div>
    <div class="pusher">
      <div class="ui basic segment">
        <div class="main ui fluid container mt-20">
          <div class="ui center aligned header">
            Selamat Datang Admin
          </div>
          <div class="ui top attached teal button mt-20" id="tambahKategori" tabindex="0">Tambah Data</div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Id Kategori</th>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($kategori = mysqli_fetch_array($data_kategori)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $kategori['id_kategori']; ?></td>
                    <td><?= $kategori['kategori']; ?></td>
                    <td>
                      <?php ?>
                      <a href="kategori.php?p=edit&id=<?= $kategori['id_kategori']; ?>">
                        <button class="ui blue tiny button">Edit</button>
                      </a>
                      <?php if (in_array($kategori["id_kategori"], $listIdKategori)) { ?>
                        <div class="ui red tiny button mt-20 button btn-warning" tabindex="0">Hapus</div>
                      <?php
                      } else {
                      ?>
                        <a href="../../backend/admin/kategori/hapus.php?id=<?= $kategori['id_kategori']; ?>">
                          <button class="ui blue tiny button">Hapus</button>
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="ui small modal kategori">
            <div class="header">Tambah Kategori</div>
            <div class="content">
              <form action="../../backend/admin/kategori/tambah.php" method="post">
                <div class="ui form">
                  <div class="field">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="kategori" id="" placeholder="Nama Kategori">
                  </div>
                  <button class="ui blue fluid button" name="tambahKategori">Tambah</button>
                </div>
              </form>
            </div>
          </div>
          <div class="ui small modal warning">
            <div class="header" style="text-align: center; color:red;">Perhatian!!!</div>
            <div class="content">
              <div class="ui form">
                <div class="field" style="text-align: center;">
                  <h3>Kategori tidak dapat di hapus</h3>
                  <label for="">Karena ada produk yang menggunakan kategori ini</label>
                </div>
              </div>
            </div>
          </div>

        </div>
        <?php if (isset($_GET['p'])) : ?>

          <?php if ($_GET['p'] == 'edit') : ?>
            <?php
            $id = $_GET['id'];
            $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE kategori.id_kategori='$id'");
            $queryData = mysqli_fetch_assoc($query);
            ?>
            <div class="main ui fluid container mt-20">
              <div class="ui center aligned header">
                Edit Kategori
              </div>
              <form action="../../backend/admin/kategori/edit.php?id=<?= $queryData['id_kategori'] ?>" method="post">
                <div class="ui form">
                  <div class="field">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="kategori" id="" placeholder="Nama kategori" value="<?= $queryData['kategori']; ?>">
                  </div>
                  <button type="submit" class="ui blue fluid button" name="editKategori">Edit</button>
                </div>
              </form>

            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>

    <script src="../../../assets/jquery/jquery.min.js"></script>
    <script src="../../../assets/semantic/semantic.min.js"></script>
    <script>
      $('#tambahKategori').on('click', function() {
        $('.ui.modal.small.kategori')
          .modal("show");
      })
      $('.btn-warning').on('click', function() {
        $('.ui.modal.small.warning')
          .modal("show");
      })
      $('.ui.sidebar').sidebar({
          context: $('.bottom.segment')
        })
        .sidebar('attach events', '.menu .item');

      $('.ui.accordion')
        .accordion();
    </script>

    <?php if (isset($_GET['p'])) : ?>
      <?php if ($_GET['p'] == 'edit') : ?>

        <script>
          const yaGambar = document.querySelector('#yaGambar');
          const tidakGambar = document.querySelector('#tidakGambar');
          const fieldGambar = document.querySelector('#fieldGambar');
          const ket = document.querySelector('#ket');
          let queryGambar = document.querySelector('#queryGambar').value;

          yaGambar.addEventListener('click', function() {
            fieldGambar.innerHTML = `
          <label>Gambar</label>
          <input type="file" name="gambar">
        `;
            ket.value = 'ada';
          });
          tidakGambar.addEventListener('click', function() {
            fieldGambar.innerHTML = `
          <input type="hidden" name="gambar" value="${queryGambar}">
        `;
            ket.value = 'gaada';
          });
        </script>
      <?php endif; ?>
    <?php endif; ?>
</body>

</html>