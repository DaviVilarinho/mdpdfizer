<html>
  <head>
    <title>mdpdfizer</title>
  </head>
  <form action="Converting.php" method="post">
    Source: <br> <textarea type="text" name="mdSource" cols="80" rows="30"></textarea>
    <br>
    Input Filetype:
    <ul>
      <li><input type="radio" name="mdType" value="gfm"> Markdown</li>
      <li><input type="radio" name="mdType" value="mediawiki"> Mediawiki</li>
      <li><input type="radio" name="mdType" value="html"> html</li>
    </ul>
    <input type="submit">
  </form>
</html>