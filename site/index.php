<!DOCTYPE html>
<?php
if($_POST){ // if we have any POSTed variables...
    $_SESSION['postdata'] = $_POST; // set a browser session with all of the values
}?>
<html>
  <head>
    <title>mdpdfizer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="jumbotron text-center">
      <h1 class="display-4">PDFizer</h1>
      <p>Conversor para Slides ou PDF</p>
    </div>
    <div style="display: block; text-align: center;">
      <form style="display: inline-block; margin-left: auto; margin-right: auto; text-align: left;" action="index.php" method="post">
        <div class="form-group">
          <label>Código Fonte</label>
          <?php if (!isset($_SESSION['postdata']['mdSource'])) {
            echo "<textarea class=\"form-control\" type=\"text\" name=\"mdSource\"  cols=\"70\" rows=\"10\"></textarea>";
          } else {
            echo "<textarea class=\"form-control\" type=\"text\" name=\"mdSource\" cols=\"70\" rows=\"10\">" . $_SESSION['postdata']['mdSource'] . " </textarea>";
          }
          ?>
        </div>
        <div class="form-group">
        <label>Formato de Entrada</label>
        <div class="form">
          <div>
            <input type="radio" name="mdType" value="markdown"> Markdown
          </div>
          <div>
            <input type="radio" name="mdType" value="html"> HTML
          </div>
          <div>
            <input type="radio" name="mdType" value="mediawiki"> Mediawiki
          </div>
        </div>
        </div>
        <div class="form">
          <label>Formato de Saída</label>
          <div>
            <input type="radio" name="outType" value="docx"> Documento Docx
          </div>
          <div> 
            <input type="radio" name="outType" value="pptx"> Slides PPTX
          </div> 
          <div> 
            <input type="radio" name="outType" value="pdf"> Documento PDF
          </div>
          <div>
            <input type="radio" name="outType" value="beamer"> Slides PDF
          </div>
        </div>
        <div class="text-center">
          <input class="center btn btn-primary" type="submit">
        </div>
      </form>
    </div>
    <br>
    <div class="text-center">
      <?php include 'Converting.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $response = mkCall();
          if ($response != -1) {
            $json     = json_decode($response);
            echo "<a target=\"_blank\" href=\"" . $json->outputPath . "\">LINK DO SEU ARQUIVO</link>";
          } else {
            echo "<p>Preencha os campos para ter o seu arquivo</p>";
          }
        }
      ?>
    </div>
  </body>
</html>
