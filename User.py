from uuid import uuid4
from Doc import Doc

class User:
    def __init__(self):
        # set automatic username
        self.name       = str(uuid4())
        # set automatic 0 files owned
        self.file       = None
        self.converted  = None

    def newDoc(self, content, type):
        doc = Doc(  content,
                    type,
                    self
                )

        if self.file == None:
            self.file      = doc
        else:
            self.converted = doc

    def convert(self, outputType):
        self.file.convertTo(outputType)
