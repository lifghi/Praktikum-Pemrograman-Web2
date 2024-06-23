<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body {
        background-image: url('https://images.pexels.com/photos/877971/pexels-photo-877971.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
    }

    .btn-tambah-data {
        background-color: #c2724f;
        color: white;
        transition: background-color 0.3s ease;
    }

    .btn-tambah-data:hover {
        background-color: #a5593e;
        color: white;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.9);
    }

    .card-header {
        background-color: rgba(115, 62, 39, 0.9);
    }

    .table {
        background-color: rgba(255, 255, 255, 0.8);
    }

    .table thead {
        background-color: rgba(194, 114, 79, 0.9);
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">My Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if (session()->get('logged_in')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome, <?= session()->get('username'); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login/logout'); ?>">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('login'); ?>">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register'); ?>">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header text-white">
                    <h5 class="mb-0">List Buku</h5>
                    <a href="<?= base_url('buku/create'); ?>" class="btn btn-sm float-right btn-tambah-data">Tambah Data</a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($posts) && is_array($posts)) : ?>
                                <?php foreach ($posts as $row) : ?>
                                    <tr>
                                        <td><?= $row['judul']; ?></td>
                                        <td><?= $row['penulis']; ?></td>
                                        <td><?= $row['penerbit']; ?></td>
                                        <td><?= $row['tahun_terbit']; ?></td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?= base_url('buku/delete/' . $row['id']); ?>" method="POST">
                                                <input type="hidden" name="{csrf_token}" value="{csrf_hash}">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="<?= base_url('buku/edit/' . $row['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="text-center">No post found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        <?= $pager->links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $('.pagination li').addClass('page-item').css('background-color', '#000000');
        $('.pagination li a').addClass('page-link').css('background-color', '#000000');
    });
</script>
<?= $this->endSection() ?>
