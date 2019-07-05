<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dina</title>

    
    <link rel="stylesheet" href="<?php echo e(URL::to('bootstrap/dist/css/bootstrap.min.css')); ?>" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">

        <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga satuan</th>
                        <th>Jumlah</th>
                        <th>Total harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tenda biru</td>
                        <td>Rp.25.000</td>
                        <td><span class="hari"></span> hari</td>
                        <td><sup>Rp</sup><span class="total1"></span></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td><b><sup>Rp</sup>.<span class="total1"></span></b></td>
                    </tr>
                </tfoot>
            </table>

            <select name="lama_hari" class="w-100">

                <?php for($i = 1; $i <= 20; $i++): ?>
                    
                    <option value="<?php echo e($i); ?>"><?php echo e($i." hari"); ?></option>
                <?php endfor; ?>

            </select>

            <div class="card bg-info mt-3 p-3 text-white">
                <div class="wrapper text-center">Total yang harus di bayar <sup>Rp</sup>.<span class="total2"></span></div> 
            </div>

    </div>

    
    <input type="hidden" name="harga" value="25000">

    
    <input type="hidden" name="total_harga">
    
    
    
    
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <script>
        $(document).ready(function(){

            // tentuin nilai awal untuk pertama kali halaman di akses

            // nilai default awal lama hari 1, akan ikut keubah kalau user pilih lama hari
            $("[name='lama_hari']").val(1);

            // nilai default awal total1 diambil dari nilai field harga, akan ikut keubah kalau user pilih lama hari
            $(".total1").text($("[name='harga']").val());

            // nilai default awal total2 diambil dari nilai field harga, akan ikut keubah kalau user pilih lama hari
            $(".total2").text(1 * $("[name='harga']").val());

            // nilai default awal hari 1, akan ikut keubah kalau user pilih lama hari
            $(".hari").text(1);

            // ketika user memilih lama hari, ke empat nilai default diatas ikut berubah
            $("[name='lama_hari']").on("change", function(){

                // untuk menimpa field total1 dengan nilai field lama_hari sesuai yang dipilih user
                $(".total1").text($(this).val() * $("[name='harga']").val());

                // untuk menimpa field total2 dengan nilai field lama_hari sesuai yang dipilih user di kali dengan nilai field harga
                $(".total2").text($(this).val() * $("[name='harga']").val());

                // untuk menimpa field hari dengan nilai field lama_hari sesuai yang dipilih user
                $(".hari").text($(this).val());

                // untuk menimpa field total_harga dengan nilai field lama_hari sesuai yang dipilih user untuk
                // ini sebagai penampun field untuk di teruskan ke controller, untuk di masukkin kedatabase
                $("[name='total_harga']").val($(this).val());

            }); 
        });
    </script>
</body>
</html><?php /**PATH C:\Users\wahyu\Desktop\mozart-learn\resources\views/student/dina.blade.php ENDPATH**/ ?>