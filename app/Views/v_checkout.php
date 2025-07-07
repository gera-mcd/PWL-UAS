<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-6">
        <?= form_open('buy', 'class="row g-3"') ?>
        <?= form_hidden('username', session()->get('username')) ?>
        <?= form_input(['type' => 'hidden', 'name' => 'total_harga', 'id' => 'total_harga', 'value' => '']) ?>

        <div class="col-12">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" value="<?= session()->get('username') ?>" readonly>
        </div>
        <div class="col-12">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div> 
        <div class="col-12">
            <label for="kelurahan" class="form-label">Kelurahan</label>
            <select class="form-control" id="kelurahan" name="kelurahan" required></select>
        </div>
        <div class="col-12">
            <label for="layanan" class="form-label">Layanan</label>
            <select class="form-control" id="layanan" name="layanan" required></select>
        </div>
        <div class="col-12">
            <label for="ongkir" class="form-label">Ongkir</label>
            <input type="text" class="form-control" id="ongkir" name="ongkir" readonly>
        </div>
    </div>
    <div class="col-lg-6">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                <?php $beratTotal = 0; ?>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= esc($item['name']) ?></td>
                        <td><?= number_to_currency($item['price'], 'IDR') ?></td>
                        <td><?= esc($item['qty']) ?></td>
                        <td><?= number_to_currency($item['price'] * $item['qty'], 'IDR') ?></td>
                        <td><?= esc($item['weight'] * $item['qty']) ?> gr</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"></td>
                    <td>Subtotal</td>
                    <td><?= number_to_currency($total, 'IDR') ?></td>
                    <td><?= $totalWeight ?> gr</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total</td>
                    <td><span id="total"><?= number_to_currency($total, 'IDR') ?></span></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </div>
        <?= form_close() ?>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>

<script>
let ongkir = 0;
let total = <?= $total ?>;
let totalWeight = <?= $totalWeight ?>;
let baseUrl = '<?= base_url() ?>';

$(document).ready(function () {
    function hitungTotal() {
        $("#ongkir").val(ongkir);
        $("#total").html("IDR " + (total + ongkir).toLocaleString('id-ID'));
        $("#total_harga").val(total + ongkir);
    }

    $('#kelurahan').select2({
        placeholder: 'Cari kelurahan...',
        ajax: {
            url: baseUrl + '/get-location',
            dataType: 'json',
            delay: 500,
            data: params => ({ search: params.term }),
            processResults: data => ({
                results: data.map(item => ({
                    id: item.id,
                    text: item.subdistrict_name + ", " + item.city_name
                }))
            }),
            cache: true
        },
        minimumInputLength: 3
    });

    $("#kelurahan").on('change', function () {
        let destination = $(this).val();
        $("#layanan").empty();

        $.ajax({
            url: "<?= site_url('get-cost') ?>",
            type: 'GET',
            data: {
                destination: destination,
                weight: totalWeight > 0 ? totalWeight : 1000
            },
            dataType: 'json',
            success: function (data) {
                data.forEach(item => {
                    let text = `${item.description} (${item.service}) - Estimasi ${item.etd}`;
                    $("#layanan").append(`<option value="${item.cost}">${text}</option>`);
                });

                $("#layanan").prop('selectedIndex', 0).trigger('change');
            }
        });
    });

    $("#layanan").on('change', function () {
        ongkir = parseInt($(this).val());
        hitungTotal();
    });
});
</script>
<?= $this->endSection() ?>