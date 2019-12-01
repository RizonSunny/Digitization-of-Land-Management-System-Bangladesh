<div  style="margin-left:300px">
  <script>
  </script>

  <h3> Search from khatian</h3>
  <form method="POST" >
    @csrf
    <table>
    <tr>
      <th><label> District : </label></th>
      <th><label> Thana : </label></th>
      <th><label> Mouza : </label></th>
      <th><label> khatian no : </label></th>
    </tr>
    <tr>
      <th><input type="text" name="district" required autofocus value="<?php echo isset($_POST['district']) ? $_POST['district'] : '' ?>" /></th>
      <th><input type="text" name="thana" required autofocus value="<?php echo isset($_POST['thana']) ? $_POST['thana'] : '' ?>" /></th>
      <th><input type="text" name="mouza" required autofocus value="<?php echo isset($_POST['mouza']) ? $_POST['mouza'] : '' ?>" /></th>
      <th><input type="text" name="khatian-no" required autofocus value="<?php echo isset($_POST['khatian-no']) ? $_POST['khatian-no'] : '' ?>" /></th>
    </tr>
  </table>
    <button type="submit" formaction="khatianland" > land information </button>
    <button type="submit" formaction="khatiankhatian" > khatian information </button>
    <button type="submit" formaction="khatianowner" > owner information </button>
    <button type="submit" formaction="khatiandeed" > deed information </button>
    <button type="submit" formaction="khatiancase" > case information </button>
  </form>
</div>
