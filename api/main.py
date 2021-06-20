import pypandoc
from flask import Flask, jsonify, request
from uuid import uuid4

WORKDIR     = "/api/"
OUTPUT_DIR  = "out/"

DEFAULT_METHOD = 'POST'
DEFAULT_METHODS=[DEFAULT_METHOD]

api = Flask(__name__)

@api.route("/", methods=DEFAULT_METHODS)
def convertDoc():
    # TODO async tasks
    # TODO comment
    try:
        try:
            mdSource    = request.form['mdSource']
            mdType      = request.form['mdType']
            outType     = request.form['outType']
        except:
            return "wrong form data"

        # only one file per session
        # and extension handling
        UUID        = str(uuid4())
        extension  = ".pdf" if (outType == "beamer") else "." + outType
        filename    = UUID + extension

        outFilepath = WORKDIR + OUTPUT_DIR + filename
        pypandoc.convert_text(source=mdSource, format=mdType, to=outType, encoding='unicode', outputfile=outFilepath)

        # TODO error management
        # TODO removing temporary files
        return jsonify(
            uuid=UUID,
            mdType=mdType,
            outType=outType,
            outputPath=OUTPUT_DIR+filename
        )
    except:
        return "error"




if __name__ == "__main__":
    api.run(host="0.0.0.0")
