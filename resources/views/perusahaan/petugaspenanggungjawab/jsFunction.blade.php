<script>
    $(document).on("input", ".hanyaangka", function(e) {
        this.value = this.value.replace(/[^0-9.,]/g, '');
        this.value = this.value.replace(/(\..*)\./g, '$1').replace(/(,.*)\,/g, '$1');
    });
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });
    });

    function simpanPj() {
        let myForm = document.getElementById('formPetugasPj');
        let formData = new FormData(myForm);
        // Swal.fire({
        //     title: 'Sedang diproses',
        //     html: 'Mohon ditunggu sampai selesai',
        //     allowOutsideClick: false,
        //     allowEscapeKey: false,
        //     timerProgressBar: true,
        //     didOpen: () => {
        //         Swal.showLoading()
        //     },
        // })
        $.ajax({
            type: 'POST',
            url: "{{ route('perusahaan.petugaspenanggungjawab.simpanPetugasPj') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 200) {
                    Swal.fire({
                        text: "Data sukses tersimpan pada ",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Selesai",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                    }).then(function(result) {
                        $("#formPetugasPj").trigger('reset');
                    });
                } else if (data.status == 400) {
                    Swal.fire({
                        text: data.msg,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Selesai",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                    })
                }
            },
            error: function(request, status, error) {
                errorMessage(request);
            }
        });
    }
</script>
