<?php
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
    header('location:login.php');
}
$data_gallery = mysqli_query($koneksi, "SELECT * FROM gallery");
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
                        Gallery
                    </div>
                    <div class="ui top attached teal button mt-20" id="tambahBarang" tabindex="0">Tambah Data</div>
                    <div class="ui attached segment mt-20">
                        <table class="ui very basic table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($gallery = mysqli_fetch_array($data_gallery)) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="../../../assets/images/<?= $gallery['foto']; ?>" style="width: 100px; height:100px; object-fit:cover"></td>
                                        <td>
                                            <a href="gallery.php?p=edit&id=<?= $gallery['id_gallery']; ?>">
                                                <button class="ui blue tiny button">Edit</button>
                                            </a>
                                            <a href="../../backend/admin/gallery/hapus.php?id=<?= $gallery['id_gallery']; ?>">
                                                <button class="ui red tiny button">Hapus</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="ui small modal barang">
                        <div class="header">Tambah Gallery</div>
                        <div class="content">
                            <form action="../../backend/admin/gallery/tambah.php" method="post" enctype="multipart/form-data">
                                <div class="ui form">
                                    <div class="field">
                                        <label for="">Foto</label>
                                        <input type="file" name="foto" id="">
                                        <sup style="color:red">*maksimal ukuran gambar adalah 1 MB</sup>
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
                        $query = mysqli_query($koneksi, "SELECT * FROM gallery  WHERE id_gallery='$id'");
                        $queryData = mysqli_fetch_assoc($query);
                        ?>
                        <div class="main ui fluid container mt-20">
                            <div class="ui center aligned header">
                                Edit gallery
                            </div>
                            <form action="../../backend/admin/gallery/edit.php?id=<?= $queryData['id_gallery'] ?>" method="post" enctype="multipart/form-data">
                                <div class="ui form">
                                    <div class="field">
                                        <label for="">Foto</label>
                                        <input type="hidden" name="a" value="<?= $queryData['foto'] ?>">
                                        <input type="file" name="foto" id="" value="<?= $queryData['foto']; ?>">
                                        <sup style="color:red">*maksimal ukuran gambar adalah 1 MB</sup>
                                    </div>
                                    <button type="submit" class="ui blue fluid button" name="editBarang">Edit</button>
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
            $('#summernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
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