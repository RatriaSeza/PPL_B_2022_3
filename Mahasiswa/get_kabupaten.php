<?php
    require_once('db/db_login.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $con->query("SELECT * FROM kabupaten WHERE id_provinsi='$id'");
        ?>
        <option value="0">Pilih Kabupaten/Kota</option>
        <?php while ($data = $result->fetch_object()): ?>
            <option value="<?php echo $data->id ?>"><?php echo $data->nama ?></option>
        <?php
        endwhile;
}