$(document).ready(function () {
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1137F4",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var prod_Id = $(this)
                    .closest(".product_data")
                    .find(".prod_id")
                    .val();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    method: "POST",
                    url: "/delete_cart_item",
                    data: {
                        prod_id: prod_Id,
                    },
                    success: function (response) {
                        window.location.reload();
                    },
                });
            }
        });
    });

    $(".btnAddToCart").click(function (e) {
        e.preventDefault();
        var prodId = $(this).closest(".product_data").find(".prod_id").val();
        var prodqty = $(this).closest(".product_data").find(".prod_qty").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "POST",
            url: "/addtocart",
            data: {
                prod_id: prodId,
                prod_qty: prodqty,
            },

            success: function (response) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: response.status,
                    showConfirmButton: false,
                    timer: 2000,
                });
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();
        // var inc_val=$('.prod_qty').val();
        var inc_val = $(this).closest(".product_data").find(".prod_qty").val();
        var value = parseInt(inc_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            // $('.prod_qty').val(value);
            $(this).closest(".product_data").find(".prod_qty").val(value);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        // var dec_val=$('.prod_qty').val();
        var dec_val = $(this).closest(".product_data").find(".prod_qty").val();
        var value = parseInt(dec_val, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            // $('.prod_qty').val(value);
            $(this).closest(".product_data").find(".prod_qty").val(value);
        }
    });
});
