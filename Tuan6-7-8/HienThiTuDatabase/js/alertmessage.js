function showSuccessAlert() {
    Swal.fire(
        'Thành công',
        'Thêm sữa thành công',
        'success'
    )
}

function fireInfoAlert() {
    Swal.fire({
        icon: 'info',
        title: 'Thông báo',
        text: 'You clicked the button!'
    })
}

function showError() {
    Swal.fire({
        icon: 'error',
        title: 'Lỗi rồi :(',
        text: 'Something went wrong!'
    })
}

function showMessage() {
    Swal.fire('Đây là message')
}

function showAlertTopEnd() {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Thông báo từ phải sang trái',
        showConfirmButton: false,
        timer: 2500
    })
}

function showDialogWithPassingParams() {
    Swal.fire({
        title: 'Bạn đã chắc chưa?',
        text: "Bạn sẽ không thể khôi phục!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận xóa'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Đã xóa',
                'Bạn đã xóa thành công',
                'success'
            )
        }
    })
}