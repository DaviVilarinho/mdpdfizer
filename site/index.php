<html>
  <head>
    <title>mdpdfizer</title>
  </head>
  <form action="Converting.php" method="post">
    Source: <br> <textarea type="text" name="mdSource" cols="80" rows="30"></textarea>
    <br>
    Input:
    <p>
      <input type="radio" name="mdType" value="markdown"> Markdown
      <input type="radio" name="mdType" value="mediawiki"> Mediawiki
      <input type="radio" name="mdType" value="html"> HTML
    </p>
    Output:
    <p>
      <input type="radio" name="outType" value="pdf"> Latex PDF
      <input type="radio" name="outType" value="beamer"> Presentation PDF
    </p>
    
    <input type="submit">
  </form>
</html>