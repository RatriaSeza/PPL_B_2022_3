var nama_mhs = document.forms.form.nama_mhs
var NIM = document.forms.form.NIM
var angkatan = document.forms.form.angkatan
var status_mhs = document.forms.form.status_mhs
var jalur_masuk = document.forms.form.jalur_masuk
var jenis_kelamin = document.forms.form.jenis_kelamin
var alamat = document.forms.form.alamat
var provinsi = document.forms.form.provinsi
var kabupaten = document.forms.form.kabupaten
var email = document.forms.form.email
var nohp = document.forms.form.nohp

function submitForm() {
    resetError()
    var valid = true

    if (nama.value == '') {
        error('nama_mhs', 'Nama harus diisi')
        valid = false
    }

    if (nim.value == '') {
        error('NIM', 'NIM harus diisi')
        valid = false
    }

    if (angkatan.value == '') {
        error('angkatan', 'Angkatan harus diisi')
        valid = false
    }
    
    if (status_kuliah.value == '') {
        error('status_mhs', 'Status Kuliah harus diisi')
        valid = false
    }
    
    if (jalur_masuk.value == '') {
        error('jalur_masuk', 'Jalur Masuk harus diisi')
        valid = false
    }

    if (jenis_kelamin.value == '') {
        error('jenis_kelamin', 'Jenis kelamin harus dipilih')
        valid = false
    }

    if (alamat.value == '') {
        error('alamat', 'Alamat harus diisi')
        valid = false
    }

    if (provinsi.value == 0) {
        error('provinsi', 'Provinsi harus diisi')
        valid = false
    }

    if (kabupaten.value == 0) {
        error('kabupaten', 'Kabupaten/Kota harus diisi')
        valid = false
    }

    if (email.value == '') {
        error('email', 'Email harus diisi')
        valid = false
    }

    if (nohp.value == '') {
        error('nohp', 'No Handphone harus diisi')
        valid = false
    }
    return valid
}

function error(id, error) {
    var element = document.getElementById(id + '_error')
    element.innerHTML = error
    element.style.display = 'block'
}

function hideError(id) {
    document.getElementById(id + '_error').style.display = 'none'
}

function resetError() {
    document.querySelectorAll('[id$="_error"]')
        .forEach(function (element) {
            element.style.display = 'none'
        })
    document.getElementById('email_success').style.display = 'none'
}

email.onkeyup = function () {
    var success = document.getElementById('email_success')
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'check_email.php?email=' + email.value)

    xhr.onload = function () {
        if (xhr.responseText == false) {
            error('email', 'Email sudah dipakai')
            success.style.display = 'none'
        } else {
            hideError('email')
            success.style.display = 'block'
        }
    }
    xhr.send()
}

provinsi.onchange = function () {
    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'get_kabupaten.php?id=' + provinsi.value)

    xhr.onload = function() {
        kabupaten.innerHTML = xhr.responseText
    }
    
    xhr.send()
}

console.log(provinsi);

resetError()