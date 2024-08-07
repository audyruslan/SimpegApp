$(document).ready(function() {
    
    $('#collapseOne').on('shown.bs.collapse', function () {
        $('#headingOne .badge').text('Tutup');
        $('.select-cari').show();
        $('.tombol-cari').show();
        $('.form-cari').show();
    }).on('hidden.bs.collapse', function () {
        $('#headingOne .badge').text('Lihat');
        $('.select-cari').hide();
        $('.tombol-cari').hide();
        $('.form-cari').hide();
    });

    $('#collapseTwo').on('shown.bs.collapse', function () {
        $('#headingTwo .badge').text('Tutup');
    }).on('hidden.bs.collapse', function () {
        $('#headingTwo .badge').text('Lihat');
    });

    $('#collapseThree').on('shown.bs.collapse', function () {
        $('#headingThree .badge').text('Tutup');
    }).on('hidden.bs.collapse', function () {
        $('#headingThree .badge').text('Lihat');
    });


    // Cari Berkas Pegawai dari Admin
    $("#dataBerkasPegawai").on("keyup", function() {
        var searchText = $(this).val();
        var pegawaiID = $("#detailBerkas").data("pegawai-id");

        $.ajax({
            url: "admin/cari.php",
            type: "GET",
            data: { query: searchText, pegawai_id: pegawaiID },
            success: function(data) {
                $("#berkasPegawaiList").html(data);
            }
        });
    });

    // Cari Berkas Pegawai dari Staff Pegawai
    $("#namaBerkasPegawai").on("keyup", function() {
        var searchText = $(this).val();
        var pegawaiID = $("#berkasStaf").data("pegawai-id");

        $.ajax({
            url: "berkas/cari.php",
            type: "GET",
            data: { query: searchText, pegawai_id: pegawaiID },
            success: function(data) {
                $("#berkasList").html(data);
            }
        });
    });


    // Hapus Data Berkas Pegawai
    $(document).on('click', '.hapus_berkas_pegawai', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Berkas Pegawai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });

    // Hapus Data Pegawai
    $(document).on('click', '.hapus_pegawai', function(e) {

        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Ingin Menghapus Data Pegawai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }

        })

    });

    $('.tolak-berkas').on('click', function() {
        var berkasId = $(this).data('berkas-id');
        var adminId = $(this).data('admin-id');
        var pegawaiId = $(this).data('pegawai-id');

        $.ajax({
            url: 'berkas/validasi.php',
            type: 'POST',
            data: {
                berkas_id: berkasId,
                admin_id: adminId,
                pegawai_id: pegawaiId
            },
            success: function(response) {
                console.log(`berkasID = ${berkasId}, adminID = ${adminId}, pegawaiID = ${pegawaiId}`);
            },
            error: function(xhr, status, error) {
                console.error('Error: ' + error);
            }
        });
    });
    
});

// previewBerkas
function previewFile() {
    const file = document.getElementById('fileInput').files[0];
    const previewImage = document.getElementById('previewImage');
    const previewFile = document.getElementById('previewFile');
    const previewName = document.getElementById('previewName');
    const reader = new FileReader();

    if (file) {
        const fileType = file.type;
        if (fileType.startsWith('image/')) {
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
                previewFile.style.display = 'none';
                previewName.style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else if (fileType === 'application/pdf') {
            reader.onload = function(e) {
                previewFile.src = e.target.result;
                previewFile.style.display = 'block';
                previewImage.style.display = 'none';
                previewName.style.display = 'none';
            };
            reader.readAsDataURL(file);
        } else {
            alert('Format file tidak didukung');
            previewImage.style.display = 'none';
            previewFile.style.display = 'none';
            previewName.style.display = 'none';
        }
    }
}

// previewSurat
function previewSurat() {
    const file = document.getElementById('fileInput').files[0];
    const previewSuratFile = document.getElementById('previewSuratFile');
    const reader = new FileReader();

    if (file) {
        const fileType = file.type;
        if (fileType.startsWith('image/')) {
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else if (fileType === 'application/pdf') {
            reader.onload = function(e) {
                previewSuratFile.src = e.target.result;
                previewSuratFile.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            alert('Format file tidak didukung');
            previewImage.style.display = 'none';
        }
    }
}

// Memastikan preview yang sudah ada di database tetap ditampilkan saat halaman di-load
document.addEventListener('DOMContentLoaded', function() {
    const previewSuratImage = document.getElementById('previewSuratImage');
    const previewSuratFile = document.getElementById('previewSuratFile');
    const previewSuratName = document.getElementById('previewSuratName');

    if (previewSuratImage.src) {
        previewSuratImage.style.display = 'block';
        previewSuratFile.style.display = 'none';
        previewSuratName.style.display = 'none';
    } else if (previewSuratFile.src) {
        previewSuratFile.style.display = 'block';
        previewSuratImage.style.display = 'none';
        previewSuratName.style.display = 'none';
    } else {
        previewSuratName.style.display = 'block';
        previewSuratImage.style.display = 'none';
        previewSuratFile.style.display = 'none';
    }
});

// Toggle Password
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});