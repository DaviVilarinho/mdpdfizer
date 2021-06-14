<?php
  # class "FileStream"
  ## stores file metadata needed
  class FileStream {
    public $fileName;
    public $fileType;
  
    public function __construct(String $name, String $type) {
      $this->fileName = $name;
      $this->fileType = $type;
    }

    public function writeFile(String $content) {
      file_put_contents("./tmp/" . $this->fileName . "." . $this->fileType, $content);
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

  # function convert
  function convert(FileStream $in, FileStream $out) {
    $TMPDIR  = "./tmp/";
    $command = "pandoc " . $TMPDIR . $in->fileName . '.' . $in->fileType . 
      " -f " . $in->fileType . " -t " . $out->fileType . 
      " -o " . $TMPDIR . $out->fileName . ".pdf";
    shell_exec("$command 2>&1 > ./tmp/log");
  }

  convert($inputFile, $outputFile);

  header("Location: ./tmp/" . $outputFile->fileName . ".pdf");
  die();
?>