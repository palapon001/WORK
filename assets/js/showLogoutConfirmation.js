// ในไฟล์ main.js หรือส่วนที่เกี่ยวข้อง

// ... โค้ดอื่น ๆ ...

function showLogoutConfirmation() {
  Swal.fire({
    title: "ต้องการออกจากระบบหรือไม่?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "ใช่",
    cancelButtonText: "ยกเลิก",
  }).then((result) => {
    if (result.isConfirmed) {
      // เมื่อคลิกใช่ในการยืนยัน ให้เรียกลิงก์ออกจากระบบ
      window.location.href = "actions/logout.php";
    }
  });

  // ปิดเมนูบนมือถือ
  const body = document.querySelector('body');
  const navbarToggle = document.querySelector('.mobile-nav-toggle');

  if (body.classList.contains('mobile-nav-active')) {
    body.classList.remove('mobile-nav-active');
    navbarToggle.classList.toggle('bi-list');
    navbarToggle.classList.toggle('bi-x');
  }

  // ไม่เปลี่ยนหน้าออกจากระบบทันที
  return false;
}

// ... โค้ดอื่น ๆ ...
