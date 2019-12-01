<div  style="margin-left:300px">
  <script>
  </script>

  <h3> My Land & Deed</h3>
  <form method="POST" >
    @csrf
    <!-- <table>
    <tr>
      <th><label> National ID : </label></th>
      <th><input type="text" name="nid" required autofocus value="<?php echo isset($_POST['nid']) ? $_POST['nid'] : '' ?>" /></th>
    </tr>
  </table> -->
    <button type="submit" formaction="nidland" > My Land(s) </button>
    <button type="submit" formaction="niddeed" > My deed(s) </button>
    <!-- <button type="submit" formaction="totalland" > My Total land area </button> -->

    <!-- <button type="submit" formaction="nidtotal" > My Total Land(s) </button> -->

  </form>
</div>
