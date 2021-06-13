<html>
  <?php
    # class "FileStream"
    ## stores file metadata needed
    class FileStream {
      protected $DEFAULT_FILE_PATH = "/tmp/";
      public $fileName;
      public $fileType;
    
      public function __construct(String $name, String $type) {
        $this->fileName = $name;
        $this->fileType = $type;
      }

      public function writeFile(String $content) {
        shell_exec("echo \"$this->fileName.$this->fileType\" > $this->DEFAULT_FILE_PATH$this->fileName.$this->fileType");
        return 1;
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
    $uniqueID = uniqid("user-", false);
    ## Generating input file
    $inputFile = new FileStream(
      $mdSource,
      $mdType
    );

    
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