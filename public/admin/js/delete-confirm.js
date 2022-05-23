
    $('.delete-confirm').on('click', function (event) {
       event.preventDefault();
       const url = $(this).attr('href');
       Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1137F4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                
            }
        })
    
    });
 