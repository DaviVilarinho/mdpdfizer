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
        shell_exec("echo \"$content\" > $this->DEFAULT_FILE_PATH$this->fileName.$this->fileType");
        return 1;
      }
    }
    
    class Converter {
      protected $DEFAULT_FILE_PATH = "/tmp/";
      protected $inputFile = null;
      protected $outputFile = null;
      public function __construct(FileStream $inputFile, FileStream $outputFile) {
        $this->inputFile   = $inputFile;
        $this->outputFile  = $outputFile; 
      }
    
      # function convert
      ## Pandoc convert it to ./tmp/ID.pdf
      public function convert() {
        $inputFileType = $this->inputFile->fileType;
        $inputFileName = $this->DEFAULT_FILE_PATH . $this->inputFile->name . "." . $this->inputFile->fileType;
        $outputFileType = $this->outputFile->fileType;
        $outputFileName = $this->DEFAULT_FILE_PATH . $this->outputFile->name . ".pdf";
        shell_exec("pandoc $inputFileName --from $inputFileType --to $outputFileType -o $outputFileName");
      }
    }

    # generating unique id for user output file
    $uniqueID = uniqid("user-", false);
    ## Generating input file
    $inputFile = new FileStream(
      $uniqueID,
      $mdType
    );
    $inputFile->writeFile("mdSource");

    ## output file creation
    $outputFile = new FileStream(
      $uniqueID,
      $outType
    );

    $converterHandler = new Converter($inputFile, $outputFile);
    $converterHandler->convert();
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