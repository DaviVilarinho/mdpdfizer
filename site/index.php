<html>
  <head>
    <title>mdpdfizer</title>
  </head>
  <form action="Converting.php" method="post">
    Source: <br> <textarea type="text" name="mdSource" cols="80" rows="30"></textarea>
    <br>
    Input File:
    <p>
      <input type="radio" name="mdType" value="md"> Markdown
      <input type="radio" name="mdType" value="Mediawiki"> Mediawiki
      <input type="radio" name="mdType" value="html"> HTML
    </p>
    Output File:
    <p>
      <input type="radio" name="outType" value="gfm"> Git Flavoured Markdown PDF
      <input type="radio" name="outType" value="beamer"> Presentation PDF
    </p>
    
    <input type="submit">
  </form>
</html>