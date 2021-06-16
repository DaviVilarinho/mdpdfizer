import pypandoc
from flask import Flask, jsonify, request
from uuid import uuid4

pypandoc.ensure_pandoc_installed()

WORKDIR     = "/api/"
OUTPUT_DIR  = "out/"

DEFAULT_METHOD = 'POST'
DEFAULT_METHODS=[DEFAULT_METHOD]
converter = Flask(__name__)

@converter.route("/", methods=DEFAULT_METHODS)
def convertDoc():
    mdSource    = request.form.get('mdSource')
    mdType      = request.form.get('mdType')
    outType     = request.form.get('outType')

    UUID        = str(uuid4())
    filename    = UUID + ".pdf"
    outFilepath = WORKDIR + OUTPUT_DIR + filename
    pypandoc.convert_text(source=mdSource, format=mdType, to=outType, encoding='unicode', outputfile=outFilepath)

    return jsonify(
        uuid=UUID,
        mdType=mdType,
        outType=outType,
        outputPath=OUTPUT_DIR+filename
    )

if __name__ == "__main__":
    converter.run(host="0.0.0.0")