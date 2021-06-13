<html>
  <?php
    # class "FileStream"
    ## stores file metadata needed
    class FileStream {
      public $fileName;
      public $fileType;
    
      public function __construct(String $name, String $type) {
        $this->fileName = $name;
        $this->fileName = $type;
      }
    }
    
    class Converter {
      protected $inputFile = null;
      protected $outputFile = null;
      public function __construct(FileStream $inputFile, FileStream $outputFile) {
        $this->inputFile   = $inputFile;
        $this->outputFile  = $outputFile; 
      }
    
      # todo: convert()
    }
    
    # generating unique id for user output file
    $uniqueID = uniqid("result", false);
  ?>

  <head>
    <title>mdpdfizer Conversion Suceeded</title>
  </head>
  <body>
    <?php
      echo 'Suceeded';
    ?>
  </body>
</html>