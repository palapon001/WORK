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

  // ไม่เปลี่ยนหน้าออกจากระบบทันที
  return false;
}
