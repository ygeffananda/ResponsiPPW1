


// Ambil semua elemen dengan class "details"
const jobDetails = document.querySelectorAll('.details');

// Loop melalui setiap elemen "details"
jobDetails.forEach((details) => {
  // Ambil elemen dengan tag "h3" di dalam elemen "details"
  const jobTitle = details.querySelector('h3').innerText;
  
  // Ambil elemen dengan class "description" di dalam elemen "details"
  const description = details.querySelector('.description');
  
  // Tambahkan event listener pada tombol "apply now"
  const applyButton = details.querySelector('input[name="apply"]');
  applyButton.addEventListener('click', () => {
    // Tampilkan deskripsi pekerjaan yang sesuai
    console.log(`Job Title: ${jobTitle}`);
    console.log(`Job Description: ${description.querySelector('p').innerText}`);
  });
});

// Mendapatkan referensi elemen form
var form = document.querySelector('form');

// Menambahkan event listener pada form saat dikirim
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Mencegah form dikirim secara default

  // Mendapatkan referensi elemen input
  var nameInput = document.querySelector('input[name="name"]');
  var emailInput = document.querySelector('input[name="email"]');
  var passwordInput = document.querySelector('input[name="pass"]');
  var confirmPasswordInput = document.querySelector('input[name="c_pass"]');

  // Mendapatkan nilai dari input
  var name = nameInput.value;
  var email = emailInput.value;
  var password = passwordInput.value;
  var confirmPassword = confirmPasswordInput.value;

  // Validasi jika form belum terisi lengkap
  if (name === '' || email === '' || password === '' || confirmPassword === '') {
    alert('Harap isi semua field!');
    return;
  }

  // Validasi jika password dan konfirmasi password tidak cocok
  if (password !== confirmPassword) {
    alert('Konfirmasi password tidak cocok!');
    return;
  }

  // Registrasi berhasil, menampilkan pop-up
  alert('Registrasi berhasil!');

  // Mengosongkan nilai input setelah registrasi berhasil
  nameInput.value = '';
  emailInput.value = '';
  passwordInput.value = '';
  confirmPasswordInput.value = '';
});