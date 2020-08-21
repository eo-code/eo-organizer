<?php
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
$data_akun = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'");
$d = mysqli_fetch_array($data_akun)
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
          <div class="ui grid mt-50" style="justify-content: center;">
            <div class="four wide column">
              <div class="ui card ">
                <div class="image fluid">
                  <img src="../../../assets/images/<?= $d['foto'] ?>" alt="" srcset="">
                </div>
                <div class="content mt-20" style="text-align: center;">
                  <div class="header"><?= $d['nama'] ?></div>
                  <div class="meta">Admin</div>
                </div>
              </div>
            </div>
            <div class="ten wide column ">
              <div class="ui card fluid">
                <div class="content">
                  <div class="header ">Admin</div>
                  <div class="ui form mt-20">
                    <form action="../../backend/admin/akun_admin/edit.php?cookie=<?= $username ?>" method="post" enctype="multipart/form-data">
                      <div class="field">
                        <label for="">Username</label>
                        <input type="text" name="username" id="" value="<?= $d['username'] ?>" placeholder="Username">
                      </div>
                      <div class="field">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="nama" id="" value="<?= $d['nama'] ?>" placeholder="Nama Lengkap">
                      </div>
                      <div class="field">
                        <label for="">E-Mail</label>
                        <input type="text" name="email" id="" value="<?= $d['email'] ?>" placeholder="E-Mail">
                      </div>
                      <div class="field">
                        <label for="">Change Password</label>
                        <input type="password" name="password" id="" placeholder="Ganti Password">
                      </div>
                      <div class="field">
                        <label for="">Change Profil Picture</label>
                        <input type="hidden" name="picture_sebelumnya" value="<?= $d['foto'] ?>">
                        <input type="file" name="picture" id="" placeholder="Ganti Foto Profil">
                      </div>
                      <button class="ui blue fluid button">Ubah</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="ui small modal barang">
          <div class="header">Tambah Produk</div>
          <div class="content">
            <form action="../../backend/admin/produk/tambah.php" method="post" enctype="multipart/form-data">
              <div class="ui form">
                <div class="field">
                  <label for="">Nama Produk</label>
                  <input type="text" name="namaProduk" id="" placeholder="Nama Produk">
                </div>
                <div class="field">
                  <label for="">Harga Produk</label>
                  <input type="number" name="harga" id="" placeholder="Harga Produk">
                </div>
                <div class="field">
                  <label for="">Deskripsi</label>
                  <textarea name="deskripsi" id="summernote" placeholder="Deskripsi Produk"></textarea>
                </div>
                <div class="field">
                  <label for="">Kategori</label>
                  <select name="kategori" id="">
                    <option value="">Pilih Kategori</option>
                    <?php $data_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($k = mysqli_fetch_array($data_kategori)) {
                      echo "<option value='$k[id_kategori]'>$k[kategori]</option>";
                    } ?>
                  </select>
                </div>
                <div class="field">
                  <label for="">Gambar</label>
                  <input type="file" name="gambar" id="">
                </div>
                <button class="ui blue fluid button" name="tambahBarang">Tambah</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <?php if (isset($_GET['p'])) : ?>

        <?php if ($_GET['p'] == 'edit') : ?>
          <?php
          $id = $_GET['id'];
          $query = mysqli_query($koneksi, "SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_produk='$id'");
          $queryData = mysqli_fetch_assoc($query);
          ?>
          <div class="main ui fluid container mt-20">
            <div class="ui center aligned header">
              Edit Produk
            </div>
            <form action="../../backend/admin/produk/edit.php?id=<?= $queryData['id_produk'] ?>" method="post" enctype="multipart/form-data">
              <div class="ui form">
                <div class="field">
                  <label for="">Nama Produk</label>
                  <input type="text" name="namaProduk" id="" placeholder="Nama Produk" value="<?= $queryData['nama_produk']; ?>">
                </div>
                <div class="field">
                  <label for="">Harga Produk</label>
                  <input type="number" name="harga" id="" placeholder="Harga Produk" value="<?= $queryData['harga']; ?>">
                </div>
                <div class="field">
                  <label for="">Deskripsi</label>
                  <textarea name="deskripsi" id=""><?= $queryData['deskripsi']; ?></textarea>
                </div>

                <div class="field">
                  <label for="">Kategori</label>
                  <select name="kategori" id="">

                    <option value="">Pilih Kategori</option>
                    <?php $a = mysqli_query($koneksi, "SELECT * FROM kategori");
                    while ($l = mysqli_fetch_array($a)) { ?>
                      <?php echo $l['id_kategori']; ?>
                      <option <?php if ($queryData['id_kategori'] === $l['id_kategori']) {
                                echo 'selected';
                              } ?>value="<?= $l['id_kategori'] ?>"><?= $l['kategori'] ?></option>
                    <?php }  ?>
                  </select> </div>
                <div class="field" id="fieldGambar">
                  <label for="">Gambar</label>
                  <input type="hidden" name="a" value="<?= $queryData['gambar'] ?>">
                  <input type="file" name="gambar">
                  <!-- <label for="">Apakah ingin mengubah gambar?</label>
                    <button class="ui black button" id="yaGambar">Ya</button>
                    <button class="ui black button" id="tidakGambar">Tidak</button> -->
                </div>
                <button type="submit" class="ui blue fluid button" name="editBarang">Edit</button>
              </div>
            </form>

          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if (isset($_GET['p'])) : ?>
        <?php if ($_GET['p'] == 'invoice') : ?>
          <?php include 'invoice.php'; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>

  <script src="../../../assets/jquery/jquery.min.js"></script>
  <script src="../../../assets/semantic/semantic.min.js"></script>
  <script>
    $('#tambahBarang').on('click', function() {
      $('.ui.modal.small.barang')
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
<script src="../../../assets/summernote/summernote.min.js"></script>

</html>