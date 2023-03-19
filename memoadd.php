<?php
 include('header.php'); 

?>

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
  <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Memo<i class="fa fa-angle-right"></i> Memo Add</li>
</ol>
<!--grid-->
<div class="validation-system" style="margin-top: 0;">

  <div class="validation-form">
    <!---->
    <form method="POST" action="controller/memo.php" enctype="multipart/form-data">
      <?php
      if (isset($_GET['success'])){
        $result = $_GET['success'];
        echo '<h4 style="color: green;">' . $result . '</h4>';
      }

      if (isset($_GET['error'])){
        $result = $_GET['error'];
        echo '<h4 style="color: red;">' . $result . '</h4>';
      }

      ?>
      <div class="vali-form-group">
        <div class="col-md-12 control-label">
          <label class="control-label">Subject*</label>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-info" aria-hidden="true"></i>
            </span>
            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
          </div>
        </div>

        <div class="col-md-12 control-label">
        <label class="control-label">Content*</label>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-info" aria-hidden="true"></i>
            </span>
            <textarea name="content" class="form-control" placeholder="Content" required></textarea>
          </div>
        </div>
        <div class="clearfix"> </div>
      </div>
      <div class="col-md-12 form-group">
        <button type="submit" name="addmemo" class="btn btn-primary">SEND MEMO</button>
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
      <div class="clearfix"> </div>
    </form>
    <!---->
  </div>
</div>
<script>
  function passwordeyes() {
    var x = document.getElementById("Psw").type;
    if (x == "password")
      document.getElementById("Psw").type = "text";
    else
      document.getElementById("Psw").type = "password";
  }
</script>
<script>
  var OneStepBack;

  function nmac(val, e) {
    if (e.keyCode != 8) {
      if (val.length == 2)
        document.getElementById("mac").value = val + "-";
      if (val.length == 5)
        document.getElementById("mac").value = val + "-";
      if (val.length == 8)
        document.getElementById("mac").value = val + "-";
      if (val.length == 11)
        document.getElementById("mac").value = val + "-";
      if (val.length == 14) {
        document.getElementById("mac").value = val + "-";
      }
    }
  }

  function nmac1(val, e) {
    if (e.keyCode == 32) {
      return false;
    }

    if (e.keyCode != 8) {

      if (val.length == 2)
        document.getElementById("mac").value = val + "-";
      if (val.length == 5)
        document.getElementById("mac").value = val + "-";
      if (val.length == 8)
        document.getElementById("mac").value = val + "-";
      if (val.length == 11)
        document.getElementById("mac").value = val + "-";
      if (val.length == 14) {
        document.getElementById("mac").value = val + "-";
      }

      if (val.length == 17) {
        return false;
      }
    }
  }
</script>
<script>
  contrychange();

  function contrychange() {
    var selectedstateid = "<?php echo $StateId; ?>";
    var selectedstateid = parseInt(selectedstateid);

    var selectedcountry = $('#contryid').val();
    $.get("controller/getstatecity.php?Type=s&ci=" + selectedcountry + "&ss=" + selectedstateid, function(data, status) {
      $("#stateid").html(data);
    });
    statechange(selectedstateid);
  }

  function statechange(si) {

    var selectedstate = $('#stateid').val();
    if (si != undefined)
      selectedstate = si;

    var selectedcityid = "<?php echo $CityId; ?>";
    selectedcityid = parseInt(selectedcityid);

    $.get("controller/getstatecity.php?Type=c&si=" + selectedstate + "&sc=" + selectedcityid, function(data, status) {
      $("#cityid").html(data);
    });
  }
</script>

<script>
  var birthdate = $('#Birthdate').val();
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1;
  var yy = today.getFullYear();
  var tdate = yy + "/" + mm + "/" + dd;

  $('#Birthdate').datetimepicker({
    yearOffset: 0,
    lang: 'ch',
    timepicker: false,
    format: 'Y/m/d',
    formatDate: 'Y/m/d',
    //minDate:'-1980/01/01', // yesterday is minimum date
    maxDate: tdate // and tommorow is maximum date calendar
  });

  $('#JoinDate').datetimepicker({
    yearOffset: 0,
    lang: 'ch',
    timepicker: false,
    format: 'Y/m/d',
    formatDate: 'Y/m/d',
    //minDate:'-1980/01/01', // yesterday is minimum date
    //maxDate: tdate // and tommorow is maximum date calendar
  });

  $('#LeaveDate').datetimepicker({
    yearOffset: 0,
    lang: 'ch',
    timepicker: false,
    format: 'Y/m/d',
    formatDate: 'Y/m/d',
    //minDate:'-1980/01/01', // yesterday is minimum date
    //maxDate: tdate // and tommorow is maximum date calendar
  });
</script>
<?php include('footer.php'); ?>