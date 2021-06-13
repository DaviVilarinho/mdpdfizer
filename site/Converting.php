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
      $file = fopen($this->DEFAULT_FILE_PATH . $this->fileName . $this->fileType, "w") or die("Can't create file");
      fwrite($file, $content);
      fclose($file);
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
      $inputFileName = $this->DEFAULT_FILE_PATH . $this->inputFile->fileName . "." . $this->inputFile->fileType;
      $outputFileType = $this->outputFile->fileType;
      $outputFileName = $this->DEFAULT_FILE_PATH . $this->outputFile->fileName . ".pdf";
      shell_exec("pandoc $inputFileName --from $inputFileType --to $outputFileType -o $outputFileName.pdf");
    }
  }

  # generating unique id for user output file
  $uniqueID = uniqid("user-", false);
  ## Generating input file
  $inputFile = new FileStream(
    $uniqueID,
    $_POST["mdType"]
  );
  $inputFile->writeFile($_POST["mdSource"]);

  ## output file creation
  $outputFile = new FileStream(
    $uniqueID,
    $_POST["outType"]
  );

  $converterHandler = new Converter($inputFile, $outputFile);
  $converterHandler->convert();

#  header("Location: ./tmp/" . $outputFile->fileName . ".pdf");
#  die();
?>