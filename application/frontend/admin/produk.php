<?php
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
$data_produk = mysqli_query($koneksi, "SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="../../../assets/semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../assets/semantic/style.css">
  <link rel="stylesheet" href="../../../assets/summernote/summernote.min.css">
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
            Produk
          </div>
          <div class="ui top attached teal button mt-20" id="tambahBarang" tabindex="0">Tambah Data</div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar Produk</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Deskripsi Produk</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($produk = mysqli_fetch_array($data_produk)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="../../../assets/images/<?= $produk['gambar']; ?>" style="width: 100px; height:100px; object-fit:cover"></td>
                    <td><?= $produk['nama_produk']; ?></td>
                    <td><?= $produk['kategori']; ?></td>
                    <td>Rp.<?= number_format($produk['harga'], 0, ",", ".")  ?>,-</td>
                    <td><?= $produk['deskripsi']; ?></td>
                    <td>
                      <a href="produk.php?p=edit&id=<?= $produk['id_produk']; ?>">
                        <button class="ui blue tiny button">Edit</button>
                      </a>
                      <a href="../../backend/admin/produk/hapus.php?id=<?= $produk['id_produk']; ?>">
                        <button class="ui blue tiny button">Hapus</button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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
                        <option <?php if ($queryData['id_kategori'] === $l['id_kategori']) {
                                  echo 'selected="selected"';
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