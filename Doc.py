import pypandoc

OUTPUT_DIR = "./static/tmp/"
class Doc:
    def __init__(self, content, type, owner):
        self.content   = content
        self.type      = type
        self.owner     = owner
        self.path      = ""
        self.filename  = str(self.generateFilename())
        self.writeToDisk()

    def writeToDisk(self):
        self.path = OUTPUT_DIR + self.filename,
        # write new file with content into temp folder
        with open(
            str(self.path),
            'w'
        ) as newFile:
            newFile.write(self.content)

    def convertTo(self, outputType):
        DEFAULT_ENCODING = 'unicode'

        self.owner.newDoc(
            "",             # empty, just need filepath
            outputType,
            self.owner
        )

        pypandoc.convert_file(
            self.filepath,
            format      = self.type,
            to          = self.owner.converted.type,
            encoding    = DEFAULT_ENCODING,
            outputfile  = self.owner.converted.path
        )

    def generateFilename(self):
        # name will be like UUID.type
        extension  = ".pdf" if (self.type == "beamer") else "." + self.type

        return self.owner.name + extension
