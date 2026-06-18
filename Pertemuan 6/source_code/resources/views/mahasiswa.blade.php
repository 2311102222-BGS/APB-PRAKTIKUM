<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manajemen Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            padding: 2rem;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 40%, rgba(74, 144, 217, 0.08) 0%, transparent 60%),
                        radial-gradient(circle at 70% 60%, rgba(124, 58, 237, 0.06) 0%, transparent 60%);
            z-index: 0;
            pointer-events: none;
        }

        .container-main {
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .header-glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 2rem 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .header-glass h1 {
            color: #ffffff;
            font-size: 2.4rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #4A90D9, #7C3AED);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-glass h1 span {
            border-left: 3px solid rgba(124, 58, 237, 0.5);
            padding-left: 1rem;
            margin-left: 0.5rem;
        }

        .header-glass .sub {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            letter-spacing: 3px;
            margin-top: 0.5rem;
            font-weight: 300;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 1.8rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .card-glass:hover {
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
            transform: translateY(-2px);
        }

        .btn-glass {
            background: linear-gradient(135deg, #4A90D9, #7C3AED);
            border: none;
            color: white;
            padding: 0.7rem 1.8rem;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(74, 144, 217, 0.3);
        }

        .btn-glass:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(74, 144, 217, 0.4);
        }

        .btn-glass-secondary {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: none;
        }

        .btn-glass-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
        }

        .btn-glass-danger {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .btn-glass-danger:hover {
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
        }

        .form-control-glass {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 0.7rem 1rem;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            width: 100%;
            transition: all 0.3s ease;
            outline: none;
            color: #ffffff;
        }

        .form-control-glass::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .form-control-glass:focus {
            border-color: #7C3AED;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
            background: rgba(255, 255, 255, 0.1);
        }

        select.form-control-glass option {
            background: #1a1a2e;
            color: #ffffff;
        }

        .table-glass {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .table-glass thead {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
        }

        .table-glass th {
            padding: 1rem 0.8rem;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
        }

        .table-glass td {
            padding: 0.8rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            vertical-align: middle;
        }

        .table-glass tbody tr:hover {
            background: rgba(255, 255, 255, 0.04);
        }

        .hobi-tag {
            display: inline-block;
            background: rgba(124, 58, 237, 0.15);
            color: #a78bfa;
            padding: 0.15rem 0.6rem;
            font-size: 0.7rem;
            margin: 0.1rem 0.2rem;
            border-radius: 6px;
            border: 1px solid rgba(124, 58, 237, 0.2);
        }

        .modal-glass {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .modal-glass.active {
            display: flex;
        }

        .modal-content-glass {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            max-width: 600px;
            width: 92%;
            padding: 2rem;
            max-height: 90vh;
            overflow-y: auto;
        }

        .modal-header-glass {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header-glass h2 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ffffff;
        }

        .modal-close {
            font-size: 1.8rem;
            cursor: pointer;
            background: none;
            border: none;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
            line-height: 1;
        }

        .modal-close:hover {
            color: #e74c3c;
            transform: rotate(90deg);
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.3rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .form-group .hobi-checkbox {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            padding-top: 0.3rem;
        }

        .form-group .hobi-checkbox label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 400;
            text-transform: none;
            font-size: 0.85rem;
            cursor: pointer;
            background: rgba(255, 255, 255, 0.06);
            padding: 0.3rem 0.8rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }

        .form-group .hobi-checkbox label:hover {
            background: rgba(124, 58, 237, 0.1);
            border-color: rgba(124, 58, 237, 0.3);
        }

        .form-group .hobi-checkbox input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #7C3AED;
        }

        .toast-glass {
            background: rgba(26, 26, 46, 0.9);
            backdrop-filter: blur(12px);
            color: #a78bfa;
            padding: 0.8rem 1.5rem;
            border-left: 4px solid #7C3AED;
            border-radius: 12px;
            margin-bottom: 1rem;
            font-weight: 600;
            display: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .toast-glass.show {
            display: block;
            animation: slideIn 0.3s ease;
        }

        .toast-glass.error {
            border-left-color: #e74c3c;
            color: #f5a6a6;
        }

        .toast-glass.success {
            border-left-color: #27ae60;
            color: #88d8a8;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: rgba(255, 255, 255, 0.5);
            font-weight: 500;
        }

        .empty-state i {
            font-size: 3rem;
            display: block;
            margin-bottom: 1rem;
            color: rgba(255, 255, 255, 0.15);
        }

        .action-group {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn-sm {
            padding: 0.4rem 0.9rem;
            font-size: 0.7rem;
        }

        .gender-badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            font-weight: 600;
            font-size: 0.7rem;
            border-radius: 6px;
            border: 1px solid;
        }

        .gender-badge.pria {
            background: rgba(74, 144, 217, 0.15);
            color: #6bb5ff;
            border-color: rgba(74, 144, 217, 0.3);
        }

        .gender-badge.wanita {
            background: rgba(231, 76, 60, 0.15);
            color: #f5a6a6;
            border-color: rgba(231, 76, 60, 0.3);
        }

        .section-title {
            font-weight: 700;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
        }

        .section-title i {
            color: #7C3AED;
            margin-right: 0.5rem;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            .header-glass h1 {
                font-size: 1.6rem;
            }
            .table-glass {
                font-size: 0.7rem;
            }
            .table-glass th, .table-glass td {
                padding: 0.5rem;
            }
            .card-glass {
                padding: 1rem;
            }
            .modal-content-glass {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="container-main">
    <div class="header-glass">
        <h1>DATA <span>MAHASISWA</span></h1>
        <div class="sub">MANAJEMEN CRUD · JSON LOKAL · GLASSMORPHISM</div>
    </div>

    <div class="card-glass">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem;">
            <h2 class="section-title">
                <i class="fas fa-users"></i> Daftar Mahasiswa
            </h2>
            <button class="btn-glass" id="btnTambah">
                <i class="fas fa-plus"></i> Tambah Data
            </button>
        </div>
        <div id="toastContainer" class="toast-glass"></div>
        <div id="tableContainer">
            <div class="empty-state"><i class="fas fa-spinner fa-spin"></i>Memuat data...</div>
        </div>
    </div>
</div>

<div class="modal-glass" id="modalMahasiswa">
    <div class="modal-content-glass">
        <div class="modal-header-glass">
            <h2 id="modalTitle">Tambah Mahasiswa</h2>
            <button class="modal-close" id="modalClose">&times;</button>
        </div>
        <form id="formMahasiswa">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control-glass" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM (10 digit)</label>
                <input type="number" class="form-control-glass" id="nim" name="nim" placeholder="Contoh: 2311102222" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control-glass" id="email" name="email" placeholder="email@domain.com" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control-glass" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label>Hobi (pilih minimal 1)</label>
                <div class="hobi-checkbox">
                    <label><input type="checkbox" name="hobi[]" value="Coding"> Coding</label>
                    <label><input type="checkbox" name="hobi[]" value="Gaming"> Gaming</label>
                    <label><input type="checkbox" name="hobi[]" value="Membaca"> Membaca</label>
                    <label><input type="checkbox" name="hobi[]" value="Menulis"> Menulis</label>
                    <label><input type="checkbox" name="hobi[]" value="Musik"> Musik</label>
                    <label><input type="checkbox" name="hobi[]" value="Traveling"> Traveling</label>
                    <label><input type="checkbox" name="hobi[]" value="Olahraga"> Olahraga</label>
                    <label><input type="checkbox" name="hobi[]" value="Fotografi"> Fotografi</label>
                    <label><input type="checkbox" name="hobi[]" value="Memasak"> Memasak</label>
                </div>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <select class="form-control-glass" id="pendidikan" name="pendidikan" required>
                    <option value="">Pilih Pendidikan</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.5rem; flex-wrap: wrap;">
                <button type="button" class="btn-glass btn-glass-secondary" id="btnBatal">Batal</button>
                <button type="submit" class="btn-glass" id="btnSubmit">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    const baseUrl = '/mahasiswa';
    let isEdit = false;

    function loadData() {
        $.ajax({
            url: baseUrl + '/data',
            method: 'GET',
            success: function(response) {
                renderTable(response);
            },
            error: function() {
                showToast('Gagal memuat data', 'error');
            }
        });
    }

    function renderTable(data) {
        if (!data || data.length === 0) {
            $('#tableContainer').html('<div class="empty-state"><i class="fas fa-database"></i>Belum ada data mahasiswa</div>');
            return;
        }

        let html = `<div style="overflow-x: auto;">
            <table class="table-glass">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>JK</th>
                        <th>Hobi</th>
                        <th>Pend</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>`;

        data.forEach((item, index) => {
            const genderClass = item.jenis_kelamin === 'Pria' ? 'pria' : 'wanita';
            const hobiHtml = item.hobi.map(h => `<span class="hobi-tag">${h}</span>`).join('');

            html += `<tr>
                <td>${index + 1}</td>
                <td><strong>${item.nama}</strong></td>
                <td>${item.nim}</td>
                <td>${item.email}</td>
                <td><span class="gender-badge ${genderClass}">${item.jenis_kelamin}</span></td>
                <td style="min-width: 120px;">${hobiHtml}</td>
                <td><strong>${item.pendidikan}</strong></td>
                <td style="text-align: center;">
                    <div class="action-group">
                        <button class="btn-glass btn-sm btn-edit" data-id="${item.id}">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-glass btn-glass-danger btn-sm btn-hapus" data-id="${item.id}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
        });

        html += `</tbody></table></div>`;
        $('#tableContainer').html(html);
    }

    function showToast(message, type = 'success') {
        const toast = $('#toastContainer');
        toast.text(message);
        toast.removeClass('show error success').addClass('show ' + type);
        setTimeout(() => {
            toast.removeClass('show');
        }, 3500);
    }

    function resetForm() {
        $('#formMahasiswa')[0].reset();
        $('#id').val('');
        $('input[name="hobi[]"]').prop('checked', false);
        isEdit = false;
        $('#modalTitle').text('Tambah Mahasiswa');
        $('#btnSubmit').text('Simpan');
    }

    function openModal() {
        $('#modalMahasiswa').addClass('active');
    }

    function closeModal() {
        $('#modalMahasiswa').removeClass('active');
        resetForm();
    }

    function setHobiCheckboxes(hobiArray) {
        $('input[name="hobi[]"]').prop('checked', false);
        if (hobiArray && Array.isArray(hobiArray)) {
            hobiArray.forEach(function(h) {
                $('input[name="hobi[]"][value="' + h + '"]').prop('checked', true);
            });
        }
    }

    $('#btnTambah').on('click', function() {
        resetForm();
        openModal();
    });

    $('#modalClose, #btnBatal').on('click', function() {
        closeModal();
    });

    $(document).on('click', function(e) {
        if ($(e.target).closest('.modal-content-glass').length === 0 && $(e.target).closest('.modal-glass').length > 0) {
            closeModal();
        }
    });

    $(document).on('click', '.btn-edit', function() {
        const id = $(this).data('id');
        $.ajax({
            url: baseUrl + '/data',
            method: 'GET',
            success: function(response) {
                const data = response.find(item => item.id === id);
                if (data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#nim').val(data.nim);
                    $('#email').val(data.email);
                    $('#jenis_kelamin').val(data.jenis_kelamin);
                    $('#pendidikan').val(data.pendidikan);
                    setHobiCheckboxes(data.hobi);
                    isEdit = true;
                    $('#modalTitle').text('Edit Mahasiswa');
                    $('#btnSubmit').text('Update');
                    openModal();
                }
            }
        });
    });

    $(document).on('click', '.btn-hapus', function() {
        const id = $(this).data('id');
        if (confirm('Yakin ingin menghapus data mahasiswa ini?')) {
            $.ajax({
                url: baseUrl + '/' + id,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    showToast(response.message, 'success');
                    loadData();
                },
                error: function(xhr) {
                    showToast(xhr.responseJSON?.message || 'Gagal menghapus data', 'error');
                }
            });
        }
    });

    $('#formMahasiswa').on('submit', function(e) {
        e.preventDefault();
        const id = $('#id').val();
        const url = isEdit ? baseUrl + '/' + id : baseUrl;
        const method = isEdit ? 'PUT' : 'POST';

        const hobiValues = [];
        $('input[name="hobi[]"]:checked').each(function() {
            hobiValues.push($(this).val());
        });

        const formData = {
            nama: $('#nama').val(),
            nim: $('#nim').val(),
            email: $('#email').val(),
            jenis_kelamin: $('#jenis_kelamin').val(),
            hobi: hobiValues,
            pendidikan: $('#pendidikan').val()
        };

        $.ajax({
            url: url,
            method: method,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showToast(response.message, 'success');
                closeModal();
                loadData();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    let msg = '';
                    $.each(errors, function(key, value) {
                        if (key === 'hobi') {
                            msg += 'Hobi: ' + value[0] + '\n';
                        } else if (key === 'hobi.*') {
                            msg += 'Hobi tidak valid\n';
                        } else {
                            msg += value[0] + '\n';
                        }
                    });
                    showToast(msg.trim(), 'error');
                } else {
                    showToast(xhr.responseJSON?.message || 'Terjadi kesalahan', 'error');
                }
            }
        });
    });

    loadData();
});
</script>
</body>
</html>