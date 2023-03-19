<?php include('userheader.php'); ?>
<?php
include_once('../controller/connect.php');
$dbs = new database();
$db = $dbs->connection();
?>

<div class="s-12 l-10">
  <div class="w3l-table-info">
    <h2>Memo View</h2>
    <br>

    <table id="table">
      <thead>
        <tr>
          <th style="text-transform: capitalize;">No</th>
          <th style="text-transform: capitalize;">Subject</th>
          <th style="text-transform: capitalize; text-align: center;">Content</th>
          <th style="text-transform: capitalize; text-align: center;">Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        //GET ALL MEMO
        $Memo = mysqli_query($db, "select * from memo order by Date desc");
        $i = 0;
        while ($MemoData = mysqli_fetch_array($Memo)) {
          $i++;
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $MemoData['Subject']; ?></td>
            <td style="text-align: left;"><?php echo $MemoData['Content']; ?></td>
            <td style="text-align: center;"><?php echo $MemoData['Date']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>


<?php include('userfooter.php'); ?>