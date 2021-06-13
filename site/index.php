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
    class FileStream {
      protected $fileName;
      protected $fileType;

      function __construct(String $name, String $type) {
        $this->setName($name);
        $this->setType($type);
      }

      public function setName(String $file){
        $this->fileName = $file;
      }

      public function setType(String $type){
        $this->fileType = $type;
      }

      public function getName(){
        return $this->fileName;
      }

      public function getType(){
        return $this->fileType;
      }
    }

    # generating unique id
    $uniqueID = uniqid("result", false);
    # save file
    shell_exec("echo \"$mdsource\" > $uniqueID.$inputType");
    $fileOut=shell_exec("pandoc ");

  ?>
</html>