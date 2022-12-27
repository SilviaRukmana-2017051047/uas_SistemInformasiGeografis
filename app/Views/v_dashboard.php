<?= $this->extend('_Layouts/IndexView') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <th> <a href="<?= base_url('dashboard/index/') ?>">
                            <h5 class="m-0 font-weight-bold text-grey">Peta Potensial dan Aktivitas Manusia</h5>
                        </a>
                    <th>
                    <th><a href="<?= base_url('dashboard/map/') ?>">
                            <h5 class="m-0 font-weight-bold text-grey">Peta Sumber Daya Mineral</h5>
                        </a>
                    <th>
                </div>
                <div class="card-body">
                    <div id="mapid" style=" height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- Leaflet -->
<link rel="stylesheet" href="<?= base_url('js/leaflet/leaflet.css'); ?>" />
<script src="<?= base_url('js/leaflet/leaflet.js'); ?>"></script>
<script async='async' type='text/javascript'>
    var L = window.L;
    var mymap = L.map('mapid').setView([-3.657774, 102.299013], 8);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    <?php foreach ($data as $i) { ?>
        L.marker([<?= $i['latitude']; ?>, <?= $i['longitude']; ?>]).bindPopup(
            "<img src='<?= base_url('img/potensial') . "/" . $i['foto_lokasi']; ?>' class='img-fluid'>" +
            "<b>Kode Potensial : <?= $i['id_potensial']; ?></b>" +
            "<br>Kondisi Lahan : <?= $i['kondisi_lahan']; ?>" +
            "<br>Akses : <?= $i['akses']; ?>" +
            "<br>latitude : <?= $i['latitude']; ?>" +
            "<br>longitude : <?= $i['longitude']; ?>" +
            "<br>jenis aktivitas : <?= $i['jenis_aktivitas']; ?>" +
            "<br>Intensitas : <?= $i['intensitas']; ?>" +
            "<br>Dampak : <?= $i['dampak']; ?>"
        ).addTo(mymap);
    <?php } ?>
</script>
<?= $this->endSection(); ?>