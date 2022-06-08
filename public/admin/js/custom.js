$(document).ready(function () {
    $(".btnPayment").click(function (e) {
        e.preventDefault();
        var orderId = $(".order_id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "GET",
            url: "print-pdf",
            data: {
                order_id: orderId,
                
            },

            success: function (response) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000,
                }).then((_)=>{
                    window.location.reload();
                });
                    
                
            },
        });
    });
});