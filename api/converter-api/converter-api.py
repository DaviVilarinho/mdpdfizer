import pypandoc
from flask import Flask, jsonify, request
from uuid import uuid4

pypandoc.ensure_pandoc_installed()

WORKDIR     = "/api/"
OUTPUT_DIR  = "out/"

DEFAULT_METHOD = 'POST'
DEFAULT_METHODS=[DEFAULT_METHOD]
converter = Flask(__name__)

app = Flask(__name__)

@converter.route("/", methods=DEFAULT_METHODS)
def convertDoc():
    # TODO async tasks
    # TODO comment
    mdSource    = request.form.get('mdSource')
    mdType      = request.form.get('mdType')
    outType     = request.form.get('outType')

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


if __name__ == "__main__":
    app = run() 
    converter.run(host="0.0.0.0")
