{{-- DataTable --}}
<script>
    $(document).ready(function (){
        $('#table').DataTable()
    });
</script>

{{-- DetailPesanan Delete --}}
{{-- <script>
    $(document).ready(function() {
        // Add a click event handler to the delete buttons
        $(".delete-button").on("click", function(e) {
            e.preventDefault();

            // Get the data attributes from the delete button
            let idDetail = $(this).data("id");
            let url = $(this).data("url");

            // Send an AJAX request to the server to perform the delete operation
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the success response, remove the deleted row from the table
                    // without a page refresh
                    $("#row-" + idDetail).remove();
                },
                error: function(xhr) {
                    // Handle the error response
                    // Display the error message returned by the server
                    if (xhr.status === 404) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert("Error deleting item. Please try again later.");
                    }
                }
            });
        });
    });
</script> --}}

{{-- logout --}}
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Logout?',
            text: 'Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/logout';
            }
        });
    }
</script>



{{-- Menu --}}
<script>
    function confirmDelete(id_menu) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/delete/' + id_menu + '/menu';
            }
        });
    }
</script>

{{-- Meja --}}
<script>
    function confirmDeleteMeja(no_meja) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/delete/' + no_meja + '/meja';
            }
        });
    }
</script>

{{-- Detail --}}
<script>
    function confirmDeleteDetail() {
        Swal.fire({
            title: 'Konfirmasi Transaksi Baru',
            text: 'Anda yakin ingin membuat transaksi baru?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/detail/transaksi';
            }
        });
    }
</script>

{{-- User --}}
<script>
    function confirmDeleteUser(id_user) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/delete/' + id_user + '/user';
            }
        });
    }
</script>

{{-- User --}}
<script>
    function confirmDeleteRiwayat(id_pesanan) {
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: 'Anda yakin ingin menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Arahkan ke route penghapusan dengan ID yang sesuai
                window.location.href = '/delete/' + id_pesanan + '/pesanan';
            }
        });
    }
</script>

{{-- Preview Image --}}
<script>
    function previewImage(event, previewId) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var preview = document.getElementById(previewId);
            preview.src = reader.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
</script>

{{-- Auto Save Status Meja --}}
<script>
    $(document).ready(function() {
        $('select[name="status_meja"]').on('change', function() {
            const noMeja = $(this).closest('tr').find('td:first-child').text();
            const statusMeja = $(this).val();

            // Kirim data menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: '/update-status-meja',
                data: {
                    no_meja: noMeja,
                    status_meja: statusMeja,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Tampilkan pesan sukses jika diperlukan
                    console.log(response); // atau tampilkan pesan menggunakan alert, toastr, dsb.
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error jika diperlukan
                    console.log(error); // atau tampilkan pesan menggunakan alert, toastr, dsb.
                }
            });
        });
    });
</script>

{{-- batas suci --}}
<script>
    // Function to calculate and update subtotal for a specific menu row
    function updateSubtotal(row) {
        var quantity = parseInt($(row).find('.quantity-input').val());
        var price = parseFloat($(row).find('.menu-price').data('price'));
        var subtotal = quantity * price;

        // Check if subtotal is a valid number
        if (!isNaN(subtotal)) {
            // Format the subtotal with comma as thousand separator and two decimal places
            $(row).find('.subtotal').text('Rp. ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 0 }));

            // Set the calculated subtotal value to the corresponding hidden input
            $(row).find('[name="sub_total"]').val(subtotal);
        } else {
            $(row).find('.subtotal').text('Rp. 0.00');
            $(row).find('[name="sub_total"]').val('');
        }
    }

    $(document).ready(function() {
        // Function to calculate and update subtotal for a specific menu row (for outside call)
        function updateSubtotalOutside(outerQuantityInput) {
            var id = outerQuantityInput.id.split('quantityOutside')[1];
            var innerQuantityInput = document.getElementById('quantity' + id);

            innerQuantityInput.value = outerQuantityInput.value;
            updateSubtotal(innerQuantityInput); // Panggil fungsi updateSubtotal untuk menghitung subtotal dan mengubah nilainya sesuai dengan nilai input quantity baru.
        }

        // Calculate initial subtotals on page load
        $('.menu-row').each(function() {
            updateSubtotal(this);
        });

        // Update subtotal on quantity change
        $(document).on('input', '.quantity-input', function() {
            updateSubtotal($(this).closest('.menu-row'));
        });

        // Attach outside call to update subtotal (for other use case)
        window.updateSubtotalOutside = updateSubtotalOutside;
    });
</script>

{{-- tanpa minus v1--}}
{{-- <script>
    // Function to format the number with a specific format
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    // Function to update the total value
    function updateTotal() {
        let total = 0;
        // Loop through each .sub-total class and sum up the values
        document.querySelectorAll('.sub-total').forEach(subTotalElement => {
            total += parseFloat(subTotalElement.textContent);
        });
        // Update the #total span with the formatted total value
        document.getElementById('total').innerHTML = '<b>' + formatNumber(total) + '</b>';
        // Update the hidden input field with the calculated total value
        document.getElementById('hidden-total').value = total;

        // Get the current Bayar value
        let bayarValue = parseFloat(document.getElementById('floatingnumber').value);
        // Check if the input value is valid
        if (isNaN(bayarValue) || bayarValue < 0) {
            bayarValue = 0;
        }
        // Update the #bayar span with the formatted Bayar value
        document.getElementById('bayar').innerHTML = '<b>' + formatNumber(bayarValue) + '</b>';

        // Update the Kembalian value based on the new total and Bayar value
        updateKembalian(bayarValue);
    }

    // Function to update the Kembalian value
    function updateKembalian(bayarValue) {
        let total = parseFloat(document.getElementById('hidden-total').value);
        let kembalian = 0;
        // Check if the total is greater than zero before calculating the Kembalian
        if (total > 0) {
            kembalian = bayarValue - total;
        }
        // Set Kembalian to zero if it's negative or if total is zero
        if (kembalian < 0 || total === 0) {
            kembalian = 0;
        }
        // Update the #kembalian span with the formatted Kembalian value
        document.getElementById('kembalian').innerHTML = '<b>' + formatNumber(kembalian) + '</b>';
        // Update the hidden input field with the calculated Kembalian value
        document.getElementById('hidden-kembalian').value = kembalian;
    }

    // Call the updateTotal function initially to set the total to the correct value
    updateTotal();

    // Add event listener for the 'input' event on the Bayar input field
    document.getElementById('floatingnumber').addEventListener('input', function() {
        let bayarValue = parseFloat(this.value);
        updateTotal();
    });

    // DetailPesanan Delete
    $(document).ready(function() {
        // Add a click event handler to the delete buttons
        $(".delete-button").on("click", function(e) {
            e.preventDefault();

            // Get the data attributes from the delete button
            let idDetail = $(this).data("id");
            let url = $(this).data("url");

            // Send an AJAX request to the server to perform the delete operation
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the success response, remove the deleted row from the table
                    // without a page refresh
                    $("#row-" + idDetail).remove();
                    // Update the total and Bayar values after a successful delete
                    updateTotal();
                },
                error: function(xhr) {
                    // Handle the error response
                    // Display the error message returned by the server
                    if (xhr.status === 404) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert("Error deleting item. Please try again later.");
                    }
                }
            });
        });
    });
</script> --}}

{{-- dengan minus v1 --}}
{{-- <script>
    // Function to format the number with a specific format
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    // Function to update the total value
    function updateTotal() {
        let total = 0;
        // Loop through each .sub-total class and sum up the values
        document.querySelectorAll('.sub-total').forEach(subTotalElement => {
            total += parseFloat(subTotalElement.textContent);
        });
        // Update the #total span with the formatted total value
        document.getElementById('total').innerHTML = '<b>' + formatNumber(total) + '</b>';
        // Update the hidden input field with the calculated total value
        document.getElementById('hidden-total').value = total;

        // Get the current Bayar value
        let bayarValue = parseFloat(document.getElementById('floatingnumber').value);
        // Check if the input value is valid
        if (isNaN(bayarValue) || bayarValue < 0) {
            bayarValue = 0;
        }
        // Update the #bayar span with the formatted Bayar value
        document.getElementById('bayar').innerHTML = '<b>' + formatNumber(bayarValue) + '</b>';

        // Update the Kembalian value based on the new total and Bayar value
        updateKembalian(bayarValue);
    }

    // Function to update the Kembalian value
    function updateKembalian(bayarValue) {
        let total = parseFloat(document.getElementById('hidden-total').value);
        let kembalian = bayarValue - total;
        // Check if the calculated Kembalian is valid
        if (isNaN(kembalian)) {
            kembalian = 0;
        }
        // Update the #kembalian span with the formatted Kembalian value
        document.getElementById('kembalian').innerHTML = '<b>' + formatNumber(kembalian) + '</b>';
        // Update the hidden input field with the calculated Kembalian value
        document.getElementById('hidden-kembalian').value = kembalian;
    }

    // Call the updateTotal function initially to set the total to the correct value
    updateTotal();

    // Add event listener for the 'input' event on the Bayar input field
    document.getElementById('floatingnumber').addEventListener('input', function() {
        let bayarValue = parseFloat(this.value);
        updateTotal();
    });

    // DetailPesanan Delete
    $(document).ready(function() {
        // Add a click event handler to the delete buttons
        $(".delete-button").on("click", function(e) {
            e.preventDefault();

            // Get the data attributes from the delete button
            let idDetail = $(this).data("id");
            let url = $(this).data("url");

            // Send an AJAX request to the server to perform the delete operation
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the success response, remove the deleted row from the table
                    // without a page refresh
                    $("#row-" + idDetail).remove();
                    // Update the total and Bayar values after a successful delete
                    updateTotal();
                },
                error: function(xhr) {
                    // Handle the error response
                    // Display the error message returned by the server
                    if (xhr.status === 404) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert("Error deleting item. Please try again later.");
                    }
                }
            });
        });
    });
</script> --}}

{{-- dengan minus v2 --}}
<script>
    // Function to format the number with a specific format
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    // Function to update the total value
    function updateTotal() {
        let total = 0;
        // Loop through each .sub-total class and sum up the values
        document.querySelectorAll('.sub-total').forEach(subTotalElement => {
            total += parseFloat(subTotalElement.textContent);
        });
        // Update the #total span with the formatted total value
        document.getElementById('total').innerHTML = '<b>' + formatNumber(total) + '</b>';
        // Update the hidden input field with the calculated total value
        document.getElementById('hidden-total').value = total;

        // Get the current Bayar value
        let bayarValue = parseFloat(document.getElementById('floatingnumber').value);
        // Check if the input value is valid
        if (isNaN(bayarValue) || bayarValue < 0) {
            bayarValue = 0;
        }
        // Update the #bayar span with the formatted Bayar value
        document.getElementById('bayar').innerHTML = '<b>' + formatNumber(bayarValue) + '</b>';

        // Update the Kembalian value based on the new total and Bayar value
        updateKembalian(bayarValue);
    }

    // Function to update the Kembalian value
    function updateKembalian(bayarValue) {
        let total = parseFloat(document.getElementById('hidden-total').value);
        let kembalian = bayarValue - total;
        // Check if the calculated Kembalian is valid
        if (isNaN(kembalian)) {
            kembalian = 0;
        }
        // If the total is zero, reset the Kembalian to zero as well
        if (total === 0) {
            kembalian = 0;
        }
        // Update the #kembalian span with the formatted Kembalian value
        document.getElementById('kembalian').innerHTML = '<b>' + formatNumber(kembalian) + '</b>';
        // Update the hidden input field with the calculated Kembalian value
        document.getElementById('hidden-kembalian').value = kembalian;
    }

    // Call the updateTotal function initially to set the total to the correct value
    updateTotal();

    // Add event listener for the 'input' event on the Bayar input field
    document.getElementById('floatingnumber').addEventListener('input', function() {
        let bayarValue = parseFloat(this.value);
        updateTotal();
    });

    // DetailPesanan Delete
    $(document).ready(function() {
        // Add a click event handler to the delete buttons
        $(".delete-button").on("click", function(e) {
            e.preventDefault();

            // Get the data attributes from the delete button
            let idDetail = $(this).data("id");
            let url = $(this).data("url");

            // Send an AJAX request to the server to perform the delete operation
            $.ajax({
                url: url,
                type: "DELETE",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle the success response, remove the deleted row from the table
                    // without a page refresh
                    $("#row-" + idDetail).remove();
                    // Update the total and Bayar values after a successful delete
                    updateTotal();
                },
                error: function(xhr) {
                    // Handle the error response
                    // Display the error message returned by the server
                    if (xhr.status === 404) {
                        alert(xhr.responseJSON.message);
                    } else {
                        alert("Error deleting item. Please try again later.");
                    }
                }
            });
        });
    });
</script>


{{-- yang ini tidak ada minus kembalian --}}
{{-- <script>
    // Function to format the number with a specific format
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
    }

    // Function to update the Bayar value
    function updateBayar(bayarValue) {
        let bayar = parseFloat(bayarValue);
        // Check if the input value is valid
        if (isNaN(bayar) || bayar < 0) {
            bayar = 0;
        }
        // Update the #bayar span with the formatted Bayar value
        document.getElementById('bayar').innerHTML = '<b>' + formatNumber(bayar) + '</b>';

        // Call the function to update the Kembalian value
        updateKembalian(bayar);
    }

    // Function to update the Kembalian value
    function updateKembalian(bayar) {
        let total = parseFloat(document.getElementById('hidden-total').value);
        let kembalian = bayar - total;
        // Check if the Kembalian is negative, set it to 0 if so
        if (kembalian < 0) {
            kembalian = 0;
        }
        // Update the #kembalian span with the formatted Kembalian value
        document.getElementById('kembalian').innerHTML = '<b>' + formatNumber(kembalian) + '</b>';
        // Update the hidden input field with the calculated Kembalian value
        document.getElementById('hidden-kembalian').value = kembalian;
    }

    // Call the updateBayar function initially to set the Bayar to 0
    updateBayar(0);
</script> --}}
{{-- /end --}}

{{-- Print Laporan --}}
<script>
    function printTable() {
        // Mengganti tombol "Print" dan dropdown filter dengan style "display:none"
        $('.card-header .btn').hide();
        $('.card-header .btn-group').hide();

        // Menghilangkan border dan padding pada tabel
        $('#table').css('border', 'none');
        $('#table').css('padding', '0');

        // Mencetak tabel
        window.print();

        // Mengembalikan tampilan semula setelah pencetakan selesai atau dibatalkan
        location.reload();
    }
</script>


<script>
    $(document).ready(function () {
        // Menambahkan event click ke tombol "star"
        $("#starButton").click(function () {
            // Melakukan refresh halaman
            location.reload();
        });
    });
</script>




{{-- Untuk menhitung --}}
{{-- <script>
    function updateSubtotalOutside(outerQuantityInput) {
        var id = outerQuantityInput.id.split('quantityOutside')[1];
        var innerQuantityInput = document.getElementById('quantity' + id);

        innerQuantityInput.value = outerQuantityInput.value;
        updateSubtotal(innerQuantityInput); // Panggil fungsi updateSubtotal untuk menghitung subtotal dan mengubah nilainya sesuai dengan nilai input quantity baru.
    }

    function updateSubtotal(innerQuantityInput) {
        // Di sini, Anda dapat menambahkan logika untuk menghitung subtotal berdasarkan nilai quantity yang baru diubah.
        // Misalnya, Anda dapat menggunakan harga dari class "menu-price" dan mengalikan dengan quantity yang baru.

        // Contoh:
        var price = innerQuantityInput.parentNode.previousSibling.dataset.price;
        var quantity = innerQuantityInput.value;
        var subtotal = price * quantity;

        // Ubah nilai subtotal di dalam elemen dengan class "subtotal"
        var subtotalElement = innerQuantityInput.parentNode.parentNode.querySelector('.subtotal');
        subtotalElement.textContent = subtotal;
    }
</script>


<script>
    $(document).ready(function() {
        // Function to calculate and update subtotal for a specific menu row
        function updateSubtotal(row) {
            var quantity = parseInt($(row).find('.quantity-input').val());
            var price = parseFloat($(row).find('.menu-price').data('price'));
            var subtotal = quantity * price;

            // Check if subtotal is a valid number
            if (!isNaN(subtotal)) {
                // Format the subtotal with comma as thousand separator and two decimal places
                $(row).find('.subtotal').text('Rp. ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 0 }));

                // Set the calculated subtotal value to the corresponding hidden input
                $(row).find('[name="sub_total"]').val(subtotal);
            } else {
                $(row).find('.subtotal').text('Rp. 0.00');
                $(row).find('[name="sub_total"]').val('');
            }
        }

        // Calculate initial subtotals on page load
        $('.menu-row').each(function() {
            updateSubtotal(this);
        });

        // Update subtotal on quantity change
        $(document).on('input', '.quantity-input', function() {
            updateSubtotal($(this).closest('.menu-row'));
        });
    });
</script> --}}
{{-- /untuk menghitung --}}


{{-- <script>
    function updateSubtotal(inputElement) {
        var row = $(inputElement).closest('.menu-row');
        var quantity = parseInt($(inputElement).val());
        var price = parseFloat(row.find('.menu-price').data('price'));
        var subtotal = quantity * price;

        if (!isNaN(subtotal)) {
            row.find('.subtotal').text('Rp. ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 0 }));
            row.find('input[name="sub_total"]').val(subtotal); // Set the subtotal value in the form
        } else {
            row.find('.subtotal').text('Rp. 0.00');
            row.find('input[name="sub_total"]').val(''); // Clear the subtotal value in the form if it's not a valid number
        }
    }

    function addToCart(menuId) {
        var row = $('.menu-row').filter(function() {
            return $(this).find('input[name="id_menu"]').val() == menuId;
        });
        var quantity = parseInt(row.find('.quantity-input').val());
        if (isNaN(quantity) || quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        var form = row.find('form#myForm' + menuId);

        $.ajax({
            url: '{{ route("tambahz") }}', // Replace with your actual route
            method: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                // The data is successfully inserted in the backend.
                // You can process the response data if needed.
                console.log(response);

                // Clear the quantity input and update the subtotal
                row.find('.quantity-input').val(1);
                updateSubtotal(row.find('.quantity-input'));

                // TODO: Update the display of the table with the new data
                // You can add the code here to display the updated data in the table without refreshing the page.
                // You can use response.data to access the inserted data and update the table rows accordingly.

                // Example of adding a new row to the table
                var newRow = $('<tr>');
                newRow.append('<td>' + response.data.id_pesanan + '</td>');
                newRow.append('<td>' + response.data.menu.nama_menu + '</td>');
                newRow.append('<td class="text-center">' + response.data.qty + '</td>');
                newRow.append('<td class="text-right">' + response.data.menu.harga + '</td>');
                newRow.append('<td class="text-right">' + response.data.subtotal + '</td>');
                // Append the new row to the table body
                $('table#detail-table').append(newRow);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    $(document).ready(function() {
        $('.menu-row').each(function() {
            updateSubtotal($(this).find('.quantity-input'));
        });

        $(document).on('input', '.quantity-input', function() {
            updateSubtotal(this);
        });
    });
</script> --}}


{{-- <script>
    function updateSubtotal(inputElement) {
        var row = $(inputElement).closest('.menu-row');
        var quantity = parseInt($(inputElement).val());
        var price = parseFloat(row.find('.menu-price').data('price'));
        var subtotal = quantity * price;

        if (!isNaN(subtotal)) {
            row.find('.subtotal').text('Rp. ' + subtotal.toLocaleString('en-US', { minimumFractionDigits: 0 }));
            row.find('input[name="sub_total"]').val(subtotal); // Set the subtotal value in the form
        } else {
            row.find('.subtotal').text('Rp. 0.00');
            row.find('input[name="sub_total"]').val(''); // Clear the subtotal value in the form if it's not a valid number
        }
    }

    function addToCart(menuId) {
        var row = $('.menu-row').filter(function() {
            return $(this).find('input[name="id_menu"]').val() == menuId;
        });
        var quantity = parseInt(row.find('.quantity-input').val());
        if (isNaN(quantity) || quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        // You can submit the form using AJAX here if needed or any other desired functionality
        row.find('form#myForm' + menuId).submit();
    }

    $(document).ready(function() {
        $('.menu-row').each(function() {
            updateSubtotal($(this).find('.quantity-input'));
        });

        $(document).on('input', '.quantity-input', function() {
            updateSubtotal(this);
        });
    });
</script>

<script>
    // ... Your existing JavaScript code ...

    function addToCart(menuId) {
        var row = $('.menu-row').filter(function() {
            return $(this).find('input[name="id_menu"]').val() == menuId;
        });
        var quantity = parseInt(row.find('.quantity-input').val());
        if (isNaN(quantity) || quantity <= 0) {
            alert('Please enter a valid quantity.');
            return;
        }

        var form = row.find('form#myForm' + menuId);

        $.ajax({
            url: '{{ route("tambahz") }}', // Replace with your actual route
            method: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                // The data is successfully inserted in the backend.
                // You can process the response data if needed.
                console.log(response);

                // Clear the quantity input and update the subtotal
                row.find('.quantity-input').val(1);
                updateSubtotal(row.find('.quantity-input'));

                // TODO: Update the display of the table with the new data
                // You can add the code here to display the updated data in the table without refreshing the page.
                // You can use response.data to access the inserted data and update the table rows accordingly.

                // Example of adding a new row to the table
                var newRow = $('<tr>');
                newRow.append('<td>' + response.data.id_pesanan + '</td>');
                newRow.append('<td>' + response.data.menu.nama_menu + '</td>');
                newRow.append('<td class="text-center">' + response.data.qty + '</td>');
                newRow.append('<td class="text-right">' + response.data.menu.harga + '</td>');
                newRow.append('<td class="text-right">' + response.data.subtotal + '</td>');
                // Append the new row to the table body
                $('table#detail-table').append(newRow);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    // ... Your other JavaScript code ...
</script> --}}





















