
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <!-- <script>
    $(function(){
        $("#nama").autocomplete({
            source:"../load.php",
            minLength:2,
            select:function(event,data){
                $('input[name=nama]').val(data.item.nama);
                $('input[name=nik]').val(data.item.nik);
                $('input[name=no_kk]').val(data.item.no_kk);
                $('input[name=jk]').val(data.item.jk);
                $('input[name=lahir]').val(data.item.lahir);
                $('input[name=tgl_lahir]').val(data.item.tgl_lahir);
                $('input[name=alamat]').val(data.item.alamat);
                $('input[name=rt]').val(data.item.rt);
                $('input[name=rw]').val(data.item.rw);
            }
        });
    });
</script> -->

<script>
function otomatis(){
  var nama = $("#nama").val();
  $.ajax({
    url: 'load.php',
    data: "nama="+nama,
  }).success(function (data){
    var json = data,
    obj = JSON.parse(json);
    $('#nik').val(obj.nik);
    $('#no_kk').val(obj.no_kk);
    $('#jk').val(obj.jk);
    $('#lahir').val(obj.lahir);
    $('#tgl_lahir').val(obj.tgl_lahir);
    $('#alamat').val(obj.alamat);
    $('#rt').val(obj.rt);
    $('#rw').val(obj.rw);
  });
}
</script>

</body>

</html>