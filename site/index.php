<html>
  <head>
    <title>mdpdfizer</title>
  </head>
  <form>
    Source: <br> <textarea type="text" name="mdsource" cols="80" rows="30"></textarea>
    <br>
    <input type="submit">
  </form>

  <?php 
    # class "FileStream"
    ## stores file metadata needed
    class FileStream {
      public $fileName;
      public $fileType;

      function __construct(String $name, String $type) {
        $this->fileName = $name;
        $this->fileName = $type;
      }
    }

    class Conversion {
      function __construct() {
        
      }
    }

    # generating unique id
    $uniqueID = uniqid("result", false);
    # save file
    shell_exec("echo \"$mdsource\" > $uniqueID.$inputType");
    $fileOut=shell_exec("pandoc ");

  ?>
</html>