<html>
  <head>
    <title>mdpdfizer</title>
  </head>
  <form>
    Source: <br> <textarea type="text" name="mdsource" cols="80" rows="30"></textarea>
    <br>
    <input type="submit">
  </form>

  <?php echo $_GET["mdsource"];?>
  <?php 
    $output=shell_exec("ls -la");
    printf("%s", $output);
  ?>
</html>