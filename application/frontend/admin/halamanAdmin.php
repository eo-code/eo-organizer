<?php
include '../../backend/config/koneksi.php';
$data_produk = mysqli_query($koneksi, "SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori");
$query_produk = mysqli_fetch_array($data_produk);
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
      <a href="halamanAdmin.php" class="item">
        <i class="box icon"></i> Product
      </a>
      <a href="halamanAdmin.php?p=invoice" class="item">
        <i class="payment icon"></i> Kategori
      </a>
    </div>
    <div class="pusher">
      <div class="ui basic segment">
        <div class="main ui fluid container mt-20">
          <div class="ui center aligned header">
            Selamat Datang Admin
          </div>
          <div class="ui top attached button mt-20" id="tambahBarang" tabindex="0">Tambah Data</div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>Id Produk</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Deskripsi Produk</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($produk = mysqli_fetch_array($data_produk)) { ?>
                  <tr>
                    <td><?= $produk['id_produk']; ?></td>
                    <td><?= $produk['nama_produk']; ?></td>
                    <td><?= $produk['kategori']; ?></td>
                    <td><?= $produk['harga']; ?></td>
                    <td><?= $produk['deskripsi']; ?></td>
                    <td>
                      <a href="halamanAdmin.php?p=edit&id=<?= $produk['id_produk']; ?>">
                        <button class="ui blue tiny button">Edit</button>
                      </a>
                      <a href="../.././config/config.php?idBarang=<?= $produk['id_produk']; ?>">
                        <button class="ui blue tiny button">Hapus</button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="ui small modal barang">
            <div class="header">Tambah Barang</div>
            <div class="content">
              <form action="../../backend/admin/produk/tambah.php" method="post" enctype="multipart/form-data">
                <div class="ui form">
                  <div class="field">
                    <label for="">Nama Barang</label>
                    <input type="text" name="namaProduk" id="" placeholder="Nama barang">
                  </div>
                  <div class="field">
                    <label for="">Harga Barang</label>
                    <input type="number" name="hargaProduk" id="" placeholder="Harga Barang">
                  </div>
                  <div class="field">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id=""></textarea>
                  </div>
                  <div class="field">
                    <label for="">Kategori</label>
                    <select name="kategori" id="">
                      <option value="">None</option>
                      <?php $data_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                      while ($k = mysqli_fetch_array($data_kategori)) {
                        echo "<option values='$k[id_kategori]'>$k[kategori]</option>";
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
            $query = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE id_barang='$id'");
            $queryData = mysqli_fetch_assoc($query);
            ?>
            <div class="main ui fluid container mt-20">
              <div class="ui center aligned header">
                Selamat Datang Admin
              </div>
              <form action="../.././config/config.php" method="post" enctype="multipart/form-data">
                <div class="ui form">
                  <div class="field">
                    <label for="">Nama Barang</label>
                    <input type="text" name="namaBarang" id="" placeholder="Nama barang" value="<?= $queryData['nama_barang']; ?>">
                  </div>
                  <div class="field">
                    <label for="">Harga Barang</label>
                    <input type="number" name="hargaBarang" id="" placeholder="Harga Barang" value="<?= $queryData['harga_barang']; ?>">
                  </div>
                  <div class="field">
                    <label for="">Deskripsi</label>
                    <textarea name="deskripsi" id=""><?= $queryData['deskripsi']; ?></textarea>
                  </div>
                  <div class="field">
                    <label for="">Kategori</label>
                    <input type="text" name="kategori" id="" placeholder="Masukkan Kategori" value="<?= $queryData['kategori']; ?>">
                  </div>
                  <div class="field">
                    <label for="">Stok</label>
                    <input type="number" name="stok" id="" placeholder="Masukkan stok" value="<?= $queryData['stok']; ?>">
                    <input type="hidden" name="" id="queryGambar" value="<?= $queryData['gambar']; ?>">
                    <input type="hidden" name="ket" id="ket">
                    <input type="hidden" name="id" value="<?= $queryData['id_barang']; ?>">
                  </div>
                  <div class="field" id="fieldGambar">
                    <label for="">Apakah ingin mengubah gambar?</label>
                    <button class="ui black button" id="yaGambar">Ya</button>
                    <button class="ui black button" id="tidakGambar">Tidak</button>
                  </div>
                  <button class="ui blue fluid button" name="editBarang">Edit</button>
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

</html>