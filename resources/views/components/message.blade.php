@if (Session::has('success') || Session::has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.style.marginTop = '60px'; 
                }
            });

            @if (Session::has('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ Session::get('success') }}'
                });
            @endif

            @if (Session::has('error'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ Session::get('error') }}'
                });
            @endif
        });
    </script>
@endif
